<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="images/favicon.png" />
    <title>Sistema de Avaliação de Trabalhos da FICE</title>


</head>

<body>



    <div class="container">

    

        <div class="row justify-content-md-center" style="margin-top:12rem">
        
            <div class="card text-center" style="width: 25rem;">

                <img class="card-img-top" src="images/logo_IFC.png">

                <div class="card-body">
                    <h5 class="card-title">Sistema de Avaliação de Trabalhos da FICE</h5>

                    <form id="form" name="loginForm" method="post" action="processaLogin.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuário</label>
                            <input type="text" class="form-control"  name="usuario" id="usuario"  placeholder="Seu usuario">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                        </div>

                        <input type="hidden" id="status" name="status" value="A">


                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>    
                </div>

            </div>
        
        
        
        </div>
        
        
        
    </div>


</body>
</html>