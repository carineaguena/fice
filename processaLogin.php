<?php


require 'conexao.php';

session_start();

$conn = new Conexao();


if($_POST){
    //echo "<script>alert('Entrei);</script>";
    $nome = $_POST['usuario'];
    $senha = preg_replace('/[^[:alnum:]_]/', '',md5($_POST['senha']));
    $status = $_POST['status'];
    if ($status == 'A'){
        $select = $conn->select_admin($nome, $senha, $status);

        if($select){
            $_SESSION["usuario"] = $nome;
            $_SESSION["senha"] = $senha;
            $_SESSION["status"] = $status;
            header("location:home.php");
        }else{
            unset ($_SESSION['usuario']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['status']);
            echo "erro";
            echo ("<script> alert(\"Senha, usuário ou status não conferem.\"); location.href=\"inicio.php\"; </script>");

        }
    }elseif($status == 'Z'){
        $select = $conn->select($nome, $senha);
        if($select){
            $_SESSION["usuario"] = $nome;
            $_SESSION["senha"] = $senha;
            $_SESSION["status"] = $status;
            header("location:home.php");
        }else{
            unset ($_SESSION['usuario']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['status']);
            echo ("<script> alert(\"Senha ou usuário não conferem.\"); location.href=\"inicio.php\"; </script>");
            //header("location:page-login.html");
        }
        
    }elseif($status=='S'){
        $select = $conn->select_supervisor($nome, $senha, $status);
        if($select){
            $_SESSION["usuario"] = $nome;
            $_SESSION["senha"] = $senha;
            $_SESSION["status"] = $status;
            header("location:home.php");
        }else{
            unset ($_SESSION['usuario']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['status']);
            echo ("<script> alert(\"Senha, usuário ou status não conferem.\"); location.href=\"inicio.php\"; </script>");
            //header("location:page-login.html");
        }

        }
    //if(print_r($select)){
    //  header("location:index.html");
    //}
}