<?php 
    session_start();
        require"inc/check.inc.php";
?>

<html lang="es">
    <head>
        <title>Sistema Secretaria y Titulos</title>
        <meta charset="utf-8"> 
        <link rel="shortcut icon" type="image/png" href="img/favicon.png">
        <link rel="stylesheet" href="inc/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="inc/jquery.min.js"></script>
        <script src="inc/popper.min.js"></script>
        <script src="inc/bootstrap.min.js"></script>  
    </head>
    
<!--Search Script-->
    <script>
        $(document).ready(function(){
            $("#srchinput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#mytable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
<body>
    
    <!-- Nav bar -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
           <div class="container col-sm-8">
               
                <ul class="nav nav-pills">
                    <li class="nav-item">
                    <a style="margin-right:5px;" class="active btn btn-info" data-toggle="pill" href="#alumnos">Alumnos</a></li>
                    <li class="nav-item">
                    <a style="margin-right:5px;" class="btn btn-info" data-toggle="pill" href="#escuelas">Escuelas</a></li>
                    <li class="nav-item">
                    <a style="margin-right:15px;" class="btn btn-info" data-toggle="pill" href="#carreras">Carreras</a></li>
                </ul>
               
            </div>
            
            <div class="container">
                    <input class="form-control mr-sm-2" id="srchinput" type="text" placeholder="Buscar...">
                    <a class="btn btn-danger" href="inc/logout.inc.php" method="post">Cerrar Sesión</a>     
            </div>    
        </nav>

    
    <!-- Page selection -->
    <div class="tab-content">
        <div id="alumnos" class="container-fluid tab-pane active"><br>
            <?php
                require"tables/alumnos.php";
            ?>
        </div>
        <div id="escuelas" class="container-fluid tab-pane"><br>
            <?php
                require"tables/escuelas.php"; 
            ?>
        </div>
        <div id="carreras" class="container-fluid tab-pane"><br>
            <?php
                require"tables/carreras.php";
            ?>
        </div>
    </div>
</body>
</html>