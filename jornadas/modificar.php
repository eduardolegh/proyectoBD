<html>
  <head>
     <title>
        Jornadas - Modificar
     </title>
  </head>
  <body>


<?php

$codigo=$_POST["codigo"];
$nombre=$_POST["nombre"];
$horas_entrada = $_POST["horas_entrada"] . ":" . $_POST["minutos_entrada"];
$horas_salida = $_POST["horas_salida"] . ":" . $_POST["minutos_salida"];

include "../conn.php";

$query = "UPDATE Jornada SET nombre='$nombre', hora_entrada='$horas_entrada', hora_salida='$horas_salida' WHERE codigo=$codigo";

$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
echo '<script> alert("Registro fue Modificado Exitosamente")</script>'; 

mysqli_close($conn);


?>

   <script> 
        window.location.replace('listado.php'); 
    </script>
  </body>
</html>