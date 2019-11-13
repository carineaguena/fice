<?php include_once("../header.php"); ?>



<h4>Busca de usuários</h4>

<form name="buscar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do usuário" aria-label="Nome do Usuário" aria-describedby="buscar">
        <div class="input-group-append">
            <input type="submit" class="btn btn-outline-secondary" id="buscarusuario"></input>
        </div>
    </div>
</form>


<?php 

    if(isset($_POST)){

        $temnome = isset($_POST['nome']) ? $_POST['nome'] : false;

        if($temnome){
            $nome = $_POST['nome'];
            

            require '../conexao.php';
            $conn = new Conexao();
            $stmt = $conn->pdo2->query("select * from usuarios where login like '%$nome%'");

            echo "<table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Login</th>
                                <th scope='col'>Status</th>
                                <th scope='col'>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        ";
                        
            while($row = $stmt->fetch()){ 
                    echo "
                            <tr>
                                <th scope='row'>" . $row['id'] . "</th>
                                <td>" . $row['login'] . "</td>
                                <td>" . $row['status'] . "</td>
                                <td><a href='editarUsuarios.php?id=".$row['id']."' class='btn btn-outline-secondary' id='editar'>Editar</a></td>
                            </tr>
                        "; 
                    }
                    
            echo "
                    </tbody>
                </table>";
            

        }


    }
    
?>




<?php include_once("../footer.php"); ?>