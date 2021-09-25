<html>
  <head>
     <title>
        Dapartamentos - Eliminar
     </title>
  </head>
  <body>


<?php

$codigo=$_GET["codigo"];

include "../conn.php";

$query = "DELETE FROM Departamento WHERE codigo=$codigo";

if(mysqli_query($conn,$query)){
    echo '<script> alert("Registro Eliminado Exitosamente")</script>';    
   }else{
      echo '<script> alert("No se puede eliminar este registro debido a que aun contiene dependencias")</script>';  
   }

mysqli_close($conn);


?>


     <script> 
        window.location.replace('listado.php'); 
    </script>
  </body>
</html>