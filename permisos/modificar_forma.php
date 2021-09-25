<?php

include "../conn.php";

$codigo=$_GET["codigo"];


$query = "SELECT nombre,cod_falta,fecha FROM Permiso p,Empleado e WHERE p.codigo =$codigo";
$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
$line = mysqli_fetch_array($result, MYSQLI_ASSOC);

$nombre = $line["nombre"];
$cod_falta = $line["cod_falta"];
$fecha = $line["fecha"];

mysqli_close($conn);


?>

<html>
  <head>
     <title>
        Modificacion de Permisos
     </title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
     <form action="modificar.php" method="post">
       <b>Empleado:</b>
       <br>
        <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" >
       <input type="text" name="nombre" value="<?php echo $nombre; ?>" size="20" disabled><br>
       <b>Falta:</b>
       <br>
       <select name="falta" id="falta" class="form-control" value = "<?php echo $cod_falta; ?>">
      <?php
         include "../conn.php";
         $getEmpleadosSql = "select * from Falta order by codigo ";
         $getEmpleadosRs = mysqli_query($conn,$getEmpleadosSql);

         while($row = mysqli_fetch_array($getEmpleadosRs)){
            $codigoFalta = $row['codigo'];
            $nombreFalta = $row['nombre'];

            if($codigoFalta == $cod_falta){
            ?> 
            <option selected="select" value="<?php echo $codigoFalta ?>"> <?php echo $nombreFalta ?></option>
            <?php
         }
            else{
               ?> 
             <option value="<?php echo $codigoFalta ?>"> <?php echo $nombreFalta ?></option>

         <?php
            }
         }


       ?> 
       </select><br>
       <b>Fecha Permiso:</b>
       <br>
       <input type="date" id="fecha" name="fecha" value="<?php echo $fecha;?>" required>
       <br>
       <input type="submit" name="submit" value="Actualizar" class="btn btn-primary">     
     </form>
 
         <a href="listado.php"><button type="button" class="btn btn-warning">Regresar</button></a>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>