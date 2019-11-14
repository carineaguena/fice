<?php include_once("../header.php"); ?>



<h4>Editar Avaliações</h4>

<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];

    require '../conexao.php';
    $conn = new Conexao();
    $stmt = $conn->pdo2->query("select * from avaliacao where id=$id");

    //$stmt4 = $conn->pdo->query("select * from avaliadores order by nome");


    

     
?>
    <form name="alterar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
        <?php while($row = $stmt->fetch()){

                $id_trab = $row['id_trabalho'];

                $stmt5 = $conn->pdo->query("select * from arquivos_trabalho A inner join trabalhos AS T ON T.id = A.id_trabalho where T.id=$id_trab");
            

                while($row3 = $stmt5->fetch()){

                    $nome_arquivo = $row3['nome_arquivo'];
                    echo "<p>Arquivo do trabalho: <a href='../trabalhos/" .$row3['nome_arquivo'] ."'>" . $row3['nome_arquivo'] . "</a></p>";
                }

                $arquivo = "../trabalhos/".$nome_arquivo;

            ?>


        <input type="hidden" id="id_avaliacao" name="id_avaliacao" value="<?php echo $id ?>">

        <div class="input-group mb-3">
            <input type="text" class="form-control" id="trabalho" name="trabalho" placeholder="<?php echo $row["trabalho"]?>" value="<?php echo $row["trabalho"]?>" aria-label="Título do Trabalho" readonly>
            
        </div>


        <div class="input-group mb-3" required>
            <select class="custom-select" id="status" name="status">
                <option value="<?php echo $row["status"]?>"><?php echo $row["status"]?></option>
                <option value="Aprovado">Aprovado</option>
                <option value="Aprovado com restrição">Aprovado com restrição</option>
                <option value="Reprovado">Reprovado</option>
                <option value="Em análise">Em análise</option>
            </select>

        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" id="area" name="area" placeholder="<?php echo $row["area"]?>" value="<?php echo $row["area"]?>" aria-label="Título do Trabalho" readonly>
            
        </div>



        <div class="row justify-content-md-center">
            
                <div class="col-md-auto">
                    <div class="input-group">
                        <iframe src="<?php echo $arquivo?>" width="718px" height="700px" style="border: none;"></iframe>
                    </div>
                </div>
            
        </div>

       
        <textarea id="comentarios" name="comentarios" width="718px" height="700px"><?php echo $row["comentarios"]?></textarea>
        <script>
                CKEDITOR.replace( 'comentarios' );
        </script>


        <div class="input-group mb-3">
            <input type="submit" class="btn btn-outline-primary" id="editaravaliacao" value="Editar"></input>
    
            <input type="button" class="btn btn-outline-primary" id="cancelar" value="Cancelar" onclick="location.href='avaliarTrabalhos.php';"></input>
        </div>
            

                <?php } ?>
    </form>

<?php

}

if(isset($_POST)){
  
    
    $temavaliacao = isset($_POST['id_avaliacao']) ? $_POST['id_avaliacao'] : false;
    $temstatus = isset($_POST['status']) ? $_POST['status'] : false;
    $temtrabalho = isset($_POST['trabalho']) ? $_POST['trabalho'] : false;
    $temarea = isset($_POST['area']) ? $_POST['area'] : false;
    //$idavaliador = isset($_POST['avaliador']) ? $_POST['avaliador'] : false;
    $temcomentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : false;

   
   // echo "<script>alert('As senhas não correspondem!);</script>";

    if($temavaliacao){

                    require '../conexao.php';
                    $conn = new Conexao();

                    
                    $stmt = $conn->pdo2->prepare("update avaliacao set status='$temstatus',  comentarios='$temcomentarios' where id=$temavaliacao");
                    $stmt->execute();
                    

                    if($stmt){           

            
                        echo "<script type=\"text/javascript\">alert('Avaliação atualizada!');</script>";
                        header('location:../home.php');
                        
                    }else{
                        echo "<script type=\"text/javascript\">alert('Avaliação não pode ser atualizada!');</script>";
                        header('location:../editarAvaliacoes.php?'.$id);
                    }

        }


    
}



?>




<?php include_once("../footer.php"); ?>