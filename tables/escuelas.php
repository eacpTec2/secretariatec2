<!--Options Navbar-->
<div class="container-fluid">
    <ul class="navbar">
        <div>
            <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Agregar Escuela</button>
        </div>
        <!--
        <div>
            <form class="form-inline" action="">
            <input class="form-control mr-sm-2" id="srchinput" type="text" placeholder="Buscar...">
            </form>
        </div>   
        -->
    </ul>
</div>



<!--Table-->
<div id="tables" style="margin-top:15px" class="table-striped table-hover table-bordered table-sm"> 
 <table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Nombre</th> 
            <th>Direccion</th> 
            <th>Telefono</th>
        </tr>
    </thead>
     
     <tbody id="mytable">
     
 <?php //Request info from database.
     
     require"inc/dbh.inc.php";
     
  $sql = "SELECT nombre, direccion, telefono FROM escuelas";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>".    
        $row["nombre"].
        
        "</td><td>".
        $row["direccion"].
       
        "</td><td>".
        $row["telefono"].
             
        "</td></tr>";
    }
  }
     else { echo "Sin resultados"; }
$conn->close();
?>
     </tbody>
</table>
</div>