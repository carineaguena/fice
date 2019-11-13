<?php include_once("../header.php"); ?>



<h4>Adicionar usuários</h4>

<form name="buscar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Login" aria-label="Nome do Usuário" required>
        
    </div>

    <div class="input-group mb-3" required>
        <select class="custom-select" id="status" name="status">
            <option selected>Status</option>
            <option value="A">Administrador</option>
            <option value="S">Supervisor</option>
            <option value="V">Avaliador</option>
        </select>

    </div>

    <div class="input-group mb-3">
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" aria-label="Senha" required>
        
    </div>

    <div class="input-group mb-3">
        <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Confirma Senha" aria-label="Confirma Senha" required>
        
    </div>



    <div class="input-group mb-3">
            <input type="submit" class="btn btn-outline-secondary" id="inserirusuario"></input>
        </div>
</form>

<?php 

    if(isset($_POST)){
        $temnome = isset($_POST['nome']) ? $_POST['nome'] : false;
        $temstatus = isset($_POST['status']) ? $_POST['status'] : false;
        $temsenha1 = isset($_POST['senha']) ? $_POST['senha'] : false;
        $temsenha2 = isset($_POST['senha2']) ? $_POST['senha2'] : false;

       
       // echo "<script>alert('As senhas não correspondem!);</script>";

        if($temsenha1){
            if(strcasecmp($_POST['senha'], $_POST['senha2'])){
                echo "<script type=\"text/javascript\">alert('As senhas não conferem!');</script>";
            }

            else{
                if($temnome){
                    if(strcasecmp($temstatus, 'Status')){


                        $nome = $_POST['nome'];
                        $status = $_POST['status'];
                        $senha = $_POST['senha'];


                        require '../conexao.php';
                        $conn = new Conexao();

                        $stmt = $conn->pdo2->prepare("insert into usuarios values (NULL, '$nome', md5('$senha'), '$status')");
                        $stmt->execute();

                        if($stmt){
                            echo "<script type=\"text/javascript\">alert('Usuário cadastrado com sucesso!');</script>";

                            echo $nome;
                        }else{
                            echo "<script type=\"text/javascript\">alert('Usuário não cadastrado!');</script>";
                        }

                    }else{
                        echo "<script type=\"text/javascript\">alert('Escolha um status!');</script>";
                    }
                }else{
                    echo "<script type=\"text/javascript\">alert('Escolha um nome!');</script>";
                }


            }
        }




    }
?>


<?php include_once("../footer.php"); ?>