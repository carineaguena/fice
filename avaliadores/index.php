<?php

if(isset($_SESSION["usuario"]))
{       
        // Usuário não logado! Redireciona para a página de login
        header("Location: inicio.php");
}
else{
    header("Location: ../home.php");
}
//echo $_SESSION["usuario"];
//session_start();
?>