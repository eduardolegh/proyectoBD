<html>
  <head>
     <title>
        Empleados - Modificar
     </title>
  </head>
  <body>


<?php

$codigo=$_POST["codigo"];
$falta=$_POST["falta"];
$fecha=$_POST['fecha'];

include "../conn.php";

$query = "UPDATE Permiso SET fecha='$fecha', cod_falta='$falta' WHERE codigo=$codigo";

$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
echo '<script> alert("Registro Actualizado Exitosamente")</script>';

mysqli_close($conn);


?>

    <script> 
        window.location.replace('listado.php'); 
    </script>
  </body>
</html>