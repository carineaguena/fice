<?php include_once("../header.php"); ?>

<?php
require '../conexao.php';
$conn = new Conexao();
$id_avaliador = $_SESSION['id_avaliador'];
$stmt = $conn->pdo2->query("select * from avaliacao where id_avaliador=$id_avaliador");

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
                                <th colspan='2'>Ações </th>
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
                               <!-- <td><a href='avaliarTrabalhos.php?id_delete=".$row['id']."' class='btn btn-outline-primary' id='remover' onClick='return confirm(\"Deseja mesmo deletar?\")'>Remover</a></td>-->
                            </tr>
                        "; 
                    }
                    
            echo "
                    </tbody>
                </table>
        </div>";



if(isset($_GET["id_delete"])){
        $id = $_GET["id_delete"];
      
        $stmt = $conn->pdo2->query("delete from avaliacao where id=$id");
        $stmt->execute();
        echo ("<script> alert(\"Avaliação deletada com sucesso.\"); location.href=\"avaliarTrabalhos.php\"; </script>");


    
    
    
    }
?>
<?php include_once("../footer.php"); ?>