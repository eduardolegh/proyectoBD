<html>
  <head>
     <title>
        Empleados - Insertar
     </title>
  </head>
  <body>


<?php


$nombre=$_POST["nombre"];
$jornada = $_POST["Jornada"];
$departamento = $_POST["Departamento"];

include "../conn.php";

$query = "INSERT INTO Empleado (nombre,cod_jornada,cod_departamento) VALUES ('$nombre',$jornada,$departamento)";

$result = mysqli_query($conn,$query) or die('Hubo un error: ' . mysqli_error($conn));
 echo '<script> alert("El Empleado fue insertado exitosamente")</script>'; 
mysqli_close($conn);


?>
<script> 
    window.location.replace('listado.php'); 
</script>

  </body>
</html>