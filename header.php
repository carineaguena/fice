<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <link rel="shortcut icon" href="../images/favicon.png" />
    <title>Sistema de Avaliação de Trabalhos da FICE</title>


</head>
<body>

    <div class="container-fuid">

    <?php require_once("verifica.php"); ?>

      <ul class="nav">
      <li class="nav-item">
          <a class="nav-link disabled" href="#">Bem-Vindo(a) <?php echo $_SESSION["usuario"]?> </a>
      </li>
        <li class="nav-item">
          <a class="nav-link active" href="../home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://www.camboriu.ifc.edu.br/emas">Sistema de Inscrição - FICE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      
      </ul>