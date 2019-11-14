<?php include_once("../header.php");?>


<script type="text/javascript">

function atribuir(valor){
    var id_trabalho = valor;
    var h = document.getElementById("id_trab");

    var html = "<h4>ID do trabalho: " + id_trabalho +"</h4>";

    h.insertAdjacentHTML("afterbegin", html);

}


</script>


<h4>Adiciona avaliação</h4>



<form name="buscar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="input-group mb-3">

    <?php
    require '../conexao.php';
    $conn = new Conexao();

    $stmt = $conn->pdo->prepare("select * from areas");
    $stmt->execute();

    echo "<select class='custom-select' id='areas' name='areas'>
            <option selected>Área de Pesquisa</option>";
    
    while($row = $stmt->fetch()){
        echo "<option value=". $row['id'] . ">" . utf8_encode($row['nome']) . "</option>";

    }

    
    echo "</select>";

?>

        <div class="input-group-append">
            <input type="submit" class="btn btn-outline-primary" id="buscararea"></input>
        </div>
    </div>
</form>


<?php
if(isset($_POST['areas'])){


        $temarea = isset($_POST['areas']) ? $_POST['areas'] : false;

        if($temarea){
            $id_area = $_POST['areas'];
            $stmt2 = $conn->pdo->prepare("select T.id as id_trabalho, A.nome as nome, T.titulo as titulo from trabalhos T inner join areas AS A ON T.id_area = A.id where T.id_area=$id_area");
            $stmt2->execute();


            echo "<form name='buscar' method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                    <div class='input-group mb-3'>
                        <select class='custom-select' id='trabalhos' name='trabalhos'>
                            <option selected>Trabalhos</option>";

                    while($row = $stmt2->fetch()){
                        echo "<option value='". $row['id_trabalho'] ."'>" . utf8_encode($row['nome']) ." - " . utf8_encode($row['titulo']) . "</option>";
                        
                    }

            echo "</select>
                    <div class='input-group-append'>
                    <input type='submit' class='btn btn-outline-primary' id='buscartrabalho'></input>
                </div>
            </div>
        </form>";


        }

}

if(isset($_POST['trabalhos'])){

    $temtrabalho = isset($_POST['trabalhos']) ? $_POST['trabalhos'] : false;

    if($temtrabalho){
        $id_trabalho = $_POST['trabalhos'];
        $stmt3 = $conn->pdo->prepare("select * from trabalhos T inner join areas AS A ON T.id_area = A.id where T.id=$id_trabalho");
        $stmt3->execute();

        $stmt4 = $conn->pdo->prepare("select * from avaliadores order by nome");
        $stmt4->execute();

        $stmt5 = $conn->pdo->prepare("select * from arquivos_trabalho where id_trabalho=$id_trabalho");
        $stmt5->execute();



        while($row = $stmt3->fetch()){
            echo "<h4> Área de Conhecimento: ". utf8_encode($row['nome']) ."</h4>
                    <p>Título do trabalho: ". utf8_encode($row['titulo']) ."</p>
                    ";

                    while($row3 = $stmt5->fetch()){

                        echo "<p>Arquivo do trabalho: <a href='../trabalhos/" .$row3['nome_arquivo'] ."'>" . $row3['nome_arquivo'] . "</a></p>";
                    }



                    echo "<form name='buscar3' method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                    <div class='input-group mb-3'>
                        <select class='custom-select' id='avaliadores' name='avaliadores'>
                            <option selected>Avaliadores</option>";

                    while($row2 = $stmt4->fetch()){
                        echo "<option value='". $row2['id'] ."'>" . utf8_encode($row2['nome']) . "</option>";                       
                    }

                    echo "</select>
                            <input type='hidden' id='areaconhecimento' name='areaconhecimento' value='". utf8_encode($row['nome']) ."'>
                            <input type='hidden' id='titulo' name='titulo' value='". utf8_encode($row['titulo']) ."'>
                            <input type='hidden' id='id_trabalho' name='id_trabalho' value='". $id_trabalho ."'>

                            <div class='input-group-append'>
                            <input type='submit' class='btn btn-outline-primary' id='buscaravaliador'></input>
                        </div>
                    </div>
                </form>";


        }




    }




}

if(isset($_POST['avaliadores'])){

    $temavaliador = isset($_POST['avaliadores']) ? $_POST['avaliadores'] : false;
    $temareaconhecimento = isset($_POST['areaconhecimento']) ? $_POST['areaconhecimento'] : false;
    $temtitulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
    $id_trabalho = isset($_POST['id_trabalho']) ? $_POST['id_trabalho'] : false;

    $idavaliador = $_POST['avaliadores'];

    echo "<h4> Área de Conhecimento: ". $temareaconhecimento ."</h4>
            <p>Título do trabalho: ". $temtitulo ."</p>";

    $stmt5 = $conn->pdo->prepare("select * from avaliadores where id=$idavaliador");
    $stmt5->execute();

    echo "<form name='buscar3' method='post' action='" . $_SERVER['PHP_SELF'] . "'>
    <div class='input-group mb-3'>";


            while($row2 = $stmt5->fetch()){
                echo "
                <input class='form-control' type='text' placeholder='".utf8_encode($row2['nome']) ."' readonly>
                <input type='hidden' id='idavaliador' name='idavaliador' value='". $row2['id'] ."'>
                "; 
                                      
            }

            echo "
            <input type='hidden' id='areaconhecimento' name='areaconhecimento' value='". $temareaconhecimento ."'>
            <input type='hidden' id='titulo' name='titulo' value='". $temtitulo ."'>
            <input type='hidden' id='id_trabalho' name='id_trabalho' value='". $id_trabalho ."'>


            <div class='input-group-append'>
            <input type='submit' class='btn btn-outline-primary' id='adcionaravaliador' value='Gravar Avaliação'></input>
        </div>
    </div>
</form>";


}

if(isset($_POST['idavaliador'])){
    $temavaliador = isset($_POST['idavaliador']) ? $_POST['idavaliador'] : false;
    $temareaconhecimento = isset($_POST['areaconhecimento']) ? $_POST['areaconhecimento'] : false;
    $temtitulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
    $id_trabalho = isset($_POST['id_trabalho']) ? $_POST['id_trabalho'] : false;

    $stmt5 = $conn->pdo->prepare("select * from avaliadores where id=$temavaliador");
    $stmt5->execute();

    while($row2 = $stmt5->fetch()){
        $nomeavaliador = utf8_encode($row2['nome']);
                              
    }

    $comentarios = 'Sem cometários';
    $avaliacoes = 'Em avaliação';


    $stmt6 = $conn->pdo2->prepare("insert into avaliacao values (null,". $id_trabalho. ",". $temavaliador.", '". $temareaconhecimento ."', '". $temtitulo ."', '" . $nomeavaliador . "','" . $comentarios . "', '" . $avaliacoes. "')");
    $stmt6->execute();

    echo "
    <h4>Avaliação Cadastrada!</h4>
    <p> Área de Conhecimento: ". $temareaconhecimento ."</>
    <p>Título do trabalho: ". $temtitulo ."</p>
    <p>Nome do avaliador: ". $nomeavaliador ."</p>
    <p>Cometários: Sem comentários </p>
    <p>Status: Em avaliação </p>
    ";



}


?>


 
<?php include_once("../footer.php"); ?>
