<html>
  <head>
     <title>
        Departamentos - Insertar
     </title>
  </head>
  <body>


<?php


$nombre=$_POST["nombre"];

include "../conn.php";

$query = "INSERT INTO Falta (nombre) VALUES ('$nombre')";

$result = mysqli_query($conn,$query) or die('Hubo un error: ' . mysqli_error($conn));
echo '<script> alert("Registro Insertado Exitosamente")</script>';  

mysqli_close($conn);


?>


<script> 
    window.location.replace('listado.php'); 
</script>
  </body>
</html>