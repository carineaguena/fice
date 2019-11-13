<?php include_once("../header.php"); ?>


<h4>Remover usuários</h4>

<?php

    require '../conexao.php';
    $conn = new Conexao();
    $stmt = $conn->pdo2->query("select * from usuarios");

            echo "<table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Login</th>
                                <th scope='col'>Status</th>
                                <th scope='col'>Remover</th>
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
                                <td><a href='removerUsuarios.php?id=".$row['id']."' class='btn btn-outline-secondary' id='remover' onClick='return confirm(\"Deseja mesmo deletar?\")'>Remover</a></td>
                            </tr>
                        "; 
                    }
                    
            echo "
                    </tbody>
                </table>";
            

        

        if(isset($_GET["id"])){
            $id = $_GET["id"];
        
            $stmt = $conn->pdo2->query("delete from usuarios where id=$id");
            $stmt->execute();

        }
?>


<?php include_once("../footer.php"); ?>