<html>
  <head>
     <title>
        Inserta Permisos
     </title>
  </head>
  <body>
<?php

$codigo=$_POST["empleado"];
$falta=$_POST["falta"];
$fecha=$_POST['fecha'];

include "../conn.php";

$query = "INSERT INTO Permiso(cod_empleado,fecha,cod_falta) VALUES ('$codigo','$fecha','$falta')";

$result = mysqli_query($conn,$query) or die('Hubo un error: ' . mysqli_error($conn));
echo '<script> alert("Registro Insertado Exitosamente")</script>';

mysqli_close($conn);

?>

<script> 
    window.location.replace('listado.php'); 
</script>
     
  </body>
</html>