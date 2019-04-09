<?php
    session_start();
        if (isset($_SESSION['userId'])){
                header("Location: main.php");
                exit();
            }
?>    
<html lang="es">   
        <head>
                <title>Inciar Sesión</title>
                    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
                    <!link rel="stylesheet" type="text/css" href="assets/login_style.css">           
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" href="inc/bootstrap.min.css">
                    <script src="inc/jquery.min.js"></script>
                    <script src="inc/popper.min.js"></script>
                    <script src="inc/bootstrap.min.js"></script>               
        </head>         
    <body>           
        <div class="container col-sm-3 jumbotron" style="margin-top:100px;">
            
          <img src="img/logo.png" class="mx-auto d-block" style="max-width:150px;">
            
            <form action="inc/login.inc.php" method="post">
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" class="form-control" name="userid">
               
                    <label>Contraseña:</label>
                    <input type="password" class="form-control" name="pwd">
                    
                </div>
                    <button type="submit" class="btn btn-primary" name="login-submit">Iniciar Sesión</button>
            </form>
        </div>   
    </body>      
</html>