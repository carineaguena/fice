<?php include_once("../header.php");?>

<h4>Busca de Avaliações</h4>

<form name="buscar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Título do trabalho" aria-label="Título do trabalho" aria-describedby="buscar">
        <div class="input-group-append">
            <input type="submit" class="btn btn-outline-primary" id="buscaravaliacao"></input>
        </div>
    </div>
</form>


<?php 


    if(isset($_POST['nome'])){

        $temnome = isset($_POST['nome']) ? $_POST['nome'] : false;

        if($temnome && strcasecmp($temnome, '')){
            $nome = $_POST['nome'];
            

            require '../conexao.php';
            $conn = new Conexao();
            $stmt = $conn->pdo2->query("select * from avaliacao where trabalho like '%$nome%'");

            echo "<div class='table-responsive-sm'>
                    <table class='table table-hover'>
                        <thead>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Area</th>
                                <th scope='col'>Título do trabalho</th>
                                <th scope='col'>Avaliador</th>
                                <th scope='col'>Comentários</th>
                                <th scope='col'>Status</th>
                                <th colspan='2'>Ações <a href='atribuirAvaliacao.php'><span class='badge badge-pill badge-success'>Adicionar</span></a></th>
                            </tr>
                        </thead>
                        <tbody>
                        ";
                        
            while($row = $stmt->fetch()){ 
                    echo "
                            <tr>
                                <th scope='row'>" . $row['id'] . "</th>
                                <td>" . $row['area'] . "</td>
                                <td>" . $row['trabalho'] . "</td>
                                <td>" . $row['avaliador'] . "</td>
                                <td>" . $row['comentarios'] . "</td>
                                <td>" . $row['status'] . "</td>

                                <td><a href='editarAvaliacoes.php?id=".$row['id']."' class='btn btn-outline-primary' id='editar'>Editar</a></td>
                                <td><a href='buscarAvaliacao.php?id_delete=".$row['id']."' class='btn btn-outline-primary' id='remover' onClick='return confirm(\"Deseja mesmo deletar?\")'>Remover</a></td>
                            </tr>
                        "; 
                    }
                    
            echo "
                    </tbody>
                </table>
                </div>";
            

        }else{

            require '../conexao.php';
            $conn = new Conexao();
             $stmt2 = $conn->pdo2->query("select * from avaliacao");
    
                echo "
                <div class='table-responsive-sm'>
                    <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>#</th>
                                    <th scope='col'>Area</th>
                                    <th scope='col'>Título do trabalho</th>
                                    <th scope='col'>Avaliador</th>
                                    <th scope='col'>Comentários</th>
                                    <th scope='col'>Status</th>
                                    <th colspan='2'>Ações <a href='atribuirAvaliacao.php'><span class='badge badge-pill badge-success'>Adicionar</span></a></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            ";
                            
                while($row2 = $stmt2->fetch()){ 
                        echo "
                                <tr>
                                    <th scope='row'>" . $row2['id'] . "</th>
                                    <td>" . $row2['area'] . "</td>
                                    <td>" . $row2['trabalho'] . "</td>
                                    <td>" . $row2['avaliador'] . "</td>
                                    <td>" . $row2['comentarios'] . "</td>
                                    <td>" . $row2['status'] . "</td>
    
                                    <td><a href='editarAvaliacoes.php?id=".$row2['id']."' class='btn btn-outline-primary' id='editar'>Editar</a></td>
                                    <td><a href='buscarAvaliacao.php?id_delete=".$row2['id']."' class='btn btn-outline-primary' id='remover' onClick='return confirm(\"Deseja mesmo deletar?\")'>Remover</a></td>
                                </tr>
                            "; 
                        }
                        
                echo "
                        </tbody>
                    </table>
                </div>";
    
    
                }


    }else{

        require '../conexao.php';
            $conn = new Conexao();
             $stmt2 = $conn->pdo2->query("select * from avaliacao");
    
                echo "
                <div class='table-responsive-sm'>
                    <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>#</th>
                                    <th scope='col'>Area</th>
                                    <th scope='col'>Título do trabalho</th>
                                    <th scope='col'>Avaliador</th>
                                    <th scope='col'>Comentários</th>
                                    <th scope='col'>Status</th>
                                    <th colspan='2'>Ações <a href='atribuirAvaliacao.php'><span class='badge badge-pill badge-success'>Adicionar</span></a></th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                            
                while($row2 = $stmt2->fetch()){ 
                        echo "
                                <tr>
                                    <th scope='row'>" . $row2['id'] . "</th>
                                    <td>" . $row2['area'] . "</td>
                                    <td>" . $row2['trabalho'] . "</td>
                                    <td>" . $row2['avaliador'] . "</td>
                                    <td>" . $row2['comentarios'] . "</td>
                                    <td>" . $row2['status'] . "</td>
    
                                    <td><a href='editarAvaliacoes.php?id=".$row2['id']."' class='btn btn-outline-primary' id='editar'>Editar</a></td>
                                    <td><a href='buscarAvaliacao.php?id_delete=".$row2['id']."' class='btn btn-outline-primary' id='remover' onClick='return confirm(\"Deseja mesmo deletar?\")'>Remover</a></td>
                                </tr>
                            "; 
                        }
                        
                echo "
                        </tbody>
                    </table>
                    </div>";
            
    
    }

    if(isset($_GET["id_delete"])){
        $id = $_GET["id_delete"];
      
        $stmt = $conn->pdo2->query("delete from avaliacao where id=$id");
        $stmt->execute();
        echo ("<script> alert(\"Avaliação deletada com sucesso.\"); location.href=\"buscarAvaliacao.php\"; </script>");


    
    
    
    }

    
?>



<?php include_once("../footer.php"); ?>