<html>
  <head>
     <title>
        Departamentos - Modificar
     </title>
  </head>
  <body>


<?php

$codigo=$_POST["codigo"];
$nombre=$_POST["nombre"];

include "../conn.php";

$query = "UPDATE Departamento SET nombre='$nombre' WHERE codigo=$codigo";

$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
echo '<script> alert("El departamento fue Modificado exitosamente")</script>'; 

mysqli_close($conn);


?>

    <script> 
        window.location.replace('listado.php'); 
    </script>
  </body>
</html>