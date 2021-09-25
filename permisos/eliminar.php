<html>
  <head>
     <title>
        Permisos - Eliminar
     </title>
  </head>
  <body>


<?php

$codigo=$_GET["codigo"];

include "../conn.php";

$query = "DELETE FROM Permiso WHERE codigo=$codigo";

$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));

echo '<script> alert("Registro Eliminado Exitosamente")</script>';

mysqli_close($conn);

?>


    <script> 
        window.location.replace('listado.php'); 
    </script>
  </body>
</html>