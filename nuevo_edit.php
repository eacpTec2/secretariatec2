<?php 
    session_start();
    require "../inc/dbh.inc.php";
    require "../inc/check.inc.php";
    error_reporting(ALL);
?>

<html lang="es">
    <head>
        <title>Modificar Alumno</title>
        <link rel="shortcut icon" type="image/png" href="../img/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../inc/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="../inc/jquery.min.js"></script>
        <script src="../inc/popper.min.js"></script>
        <script src="../inc/bootstrap.min.js"></script>     
    </head>       
<body>
    
   <?php
        $nro_ing = $_GET['id'];  
        $rec = mysqli_query($conn,"SELECT * FROM `alumnos` WHERE `id` = '$nro_ing'");
        while($row = mysqli_fetch_object($rec)) 
        {
                          
            ?> <!-- Script php para conectar con la base de datos -->
    
    
    
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow">
            <a class="btn btn-danger col-1" href="../main.php"><i class="fas fa-angle-left"></i> Volver</a> 
            <div class="container-fluid col-3" align="center">
            <h2 class="form-header text-center" align="center"><font color="white">Modificar alumno</font></h2>  
            </div>
        </nav>
    
        <form name="final" action="editalufinal.php" method="POST"> <!-- inicio del formulario -->
        
            
            <br>
            <div class="container-fluid col-11">
            <span class="input-group-text">Datos del alumno</span>
            </div>
            <br>
            
        <div class="container-fluid col-10">

            <div class="row">
            
                <!--- Formulario Alumno --->
                
                <div class="container-fluid row"> 
                    
                    <div class="col-3">
                        <label>Apellido</label>
                        <input type="text" class="form-control shadow-sm rounded" name="apellido" data-toggle="tooltip" title="Apellido del alumno" value="<?php echo $row->apellido;?>">
                        
                        <div class="row">
                            <div class="col-6">
                        <label>Turno</label>
                       <select name="turno" style="margin-bottom:25px;" class="custom-select shadow-sm rounded">
                            <option selected value="<?php echo $row->turno;?>"><?php echo $row->turno;?></option>
                            <option value="Mañana">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche">Noche</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                                </div>
                            <div class="col-6">
                            <label>Tipo doc.</label>
                        <select name="tipo_doc" class="custom-select shadow-sm rounded">
                            <option selected value="<?php echo $row->tipo_doc;?>"><?php echo $row->tipo_doc;?></option>
                            <option value="DNI">DNI</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Otro">Otro</option>
                        </select>
                            </div>
                        </div>
                        <div>
                            <label>Lugar de nacimiento</label>
                            <input type="text" class="form-control shadow-sm rounded" value="Buenos Aires, Tandil" name="lugar_nac" data-toggle="tooltip" title="Lugar de nacimiento del alumno" value="<?php echo $row->lugar_nac;?>">
                        </div>
                    </div>
                    
                    <div class="col-3 border-right border-dark">
                        <label>Nombre</label>
                        <input type="text" class="form-control shadow-sm rounded" name="nombres" data-toggle="tooltip" title="Nombre del alumno" value="<?php echo $row->nombres;?>"> 
                        <label>Número</label>
                        <input type="text" class="form-control shadow-sm rounded" name="dni" data-toggle="tooltip" title="Numero de documento/pasaporte/etc..." value="<?php echo $row->dni;?>">
                        <div class="pt-4">
                            <label>Fecha de nacimiento</label>
                            <input class="form-control shadow-sm rounded" type="date" name="fecha_nac" step="1" min="1940-01-01" data-toggle="tooltip" title="Fecha de nacimiento del alumno" <?php echo date("Y-m-d");?> value="<?php echo $row->fecha_nac;?>"> 
                        </div>
                    </div>
            
                    <!-- Div 2 -->

                    <div class="col-6 row"> 
                        <div class="col-6">
                            <label>Carrera</label>     
                                <?php
                                    $sql="SELECT carrera FROM carreras";
                                    $resultado = mysqli_query($conn,$sql);
                                    echo "<select class='custom-select shadow-sm rounded' name='carrera'>";
                            echo "<option selected value='$row->carrera'>$row->carrera</option>";
                                        while($fila = mysqli_fetch_array($resultado)) {    
                                            echo "<option value='".$fila['carrera'] ."'> ".$fila[0] ."</option>";
                                        }
                                            echo "</select>";
                                ?>
                        </div>
                        <div class="col-2">
                            <label>Finestec</label>
                            <select name="finestec" class="custom-select shadow-sm rounded">
                                <option selected value="<?php echo $row->finestec;?>"><?php echo $row->finestec;?></option>
                                <option value="No">No</option>
                                <option value="Si">Si</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Otro Nº Resolución</label>
                            <input type="text" class="form-control shadow-sm rounded" name="snro_resolucion" data-toggle="tooltip" title="Numero de resolucion en caso del alumno cambie de turno" value="<?php echo $row->snro_resolucion;?>">
                        </div>
                        <div class="col row pl-4">
                            <div class="col-2">
                                <label>Libro</label>
                                <input type="text" class="form-control shadow-sm rounded" name="libro" value="<?php echo $row->libro;?>">
                            </div>
                            <div class="col-2">
                                <label>Folio</label>
                                <input type="text" class="form-control shadow-sm rounded" name="folio" value="<?php echo $row->folio;?>">
                            </div>
                            <div class="col-4">
                                <label>Año egreso</label>
                                <input type="text" class="form-control shadow-sm rounded" name="ano_egreso" value="<?php echo $row->ano_egreso;?>">
                            </div>
                            <div class="col-4">
                                 <label>Año de pase</label>
                                 <input type="text" class="form-control shadow-sm rounded" name="fecha_pasaje" value="<?php echo $row->fecha_pasaje;?>">
                            </div>
                        </div> 
                        
                        <div class="col-12 row pt-4 pl-4">
                            <div class="col-5">
                                <label>Pasa a</label>
                                    <?php
                                            $sql="SELECT nombre FROM escuelas";
                                            $resultado = mysqli_query($conn,$sql);
                                            echo "<select class='custom-select shadow-sm rounded' name='pasa_a'>";
                                echo "<option selected value='$row->pasa_a'>$row->pasa_a</option>";               
                                while($fila = mysqli_fetch_array($resultado)) {   
                                                    echo "<option value='".$fila['nombre'] ."'> ".$fila[0] ."</option>";
                                                }
                                                    echo "</select>";
                                    ?>
                            </div>
                            <div class="col-5">
                                <label>Viene de</label>
                                    <?php
                                    $sql="SELECT nombre FROM escuelas";
                                    $resultado = mysqli_query($conn,$sql);
                                    echo "<select class='custom-select shadow-sm rounded' name='viene_de'>";
                                echo "<option selected value='$row->viene_de'>$row->viene_de</option>";                              
                        while($fila = mysqli_fetch_array($resultado)) {   
                                            echo "<option value='".$fila['nombre'] ."'> ".$fila[0] ."</option>";
                                        }
                                            echo "</select>";
                                    ?>
                            </div>
                            
                        </div>
                     </div>                 
                   </div>
                </div>
            </div>
  
        <div class="container-fluid col-10">
    
                <div class="row">
                    
                    <div class="col-3" style="margin-bottom:20px; margin-top:10px;">   
                        
                    </div>
                    <div class="col-3" style="margin-top:10px;">
                        
                    </div>
                    <div class="col-2" style="margin-top:10px;">
                       
                    </div>
                    <div class="col-2" style="margin-top:10px;">
                        
                    </div>
                  
            </div>
            
            <div class="container-fluid border-top border-dark" align="center">
                <label style="margin-top:20px;">Observaciones</label>
                <textarea class="form-control shadow-sm rounded" rows="6" name="observaciones" placeholder="<?php echo $row->observaciones;?>"></textarea>
            </div>
        </div>
            <br>
                <div class="container" align="right">
                    <a class="btn btn-danger btn-lg col-2 text-white">Eliminar</a>
                    
                    <input class="btn btn-primary btn-lg col-2" type="submit" value="Modificar"> <!-- Boton "submit" para aceptar cambios -->
                    
                </div>
            
            
        </form>
        
    </body>
</html>
<?php
        }
?>  
