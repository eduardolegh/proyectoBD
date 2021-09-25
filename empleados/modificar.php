<html>
  <head>
     <title>
        Empleados - Modificar
     </title>
  </head>
  <body>


<?php

$codigo=$_POST["codigo"];
$nombre=$_POST["nombre"];
$departamento = $_POST["Departamento"];
$jornada = $_POST["Jornada"];

include "../conn.php";

$query = "UPDATE Empleado SET nombre='$nombre', cod_jornada=$jornada, cod_departamento=$departamento WHERE codigo=$codigo";

$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
 echo '<script> alert("Registro Modificado Exitosamente")</script>';  

mysqli_close($conn);


?>

     <script> 
        window.location.replace('listado.php'); 
    </script>
  </body>
</html>