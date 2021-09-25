<html>
  <head>
     <title>
        Jornadas - Insertar
     </title>
  </head>
  <body>


<?php


$nombre=$_POST["nombre"];
$horas_entrada = $_POST["horas_entrada"] . ":" . $_POST["minutos_entrada"];
$horas_salida = $_POST["horas_salida"] . ":" . $_POST["minutos_salida"];

include "../conn.php";

$query = "INSERT INTO Jornada (nombre,hora_entrada,hora_salida) VALUES ('$nombre','$horas_entrada','$horas_salida')";

$result = mysqli_query($conn,$query) or die('Hubo un error: ' . mysqli_error($conn));
echo '<script> alert("Registro Insertado Exitosamente")</script>'; 

mysqli_close($conn);


?>


     <script> 
        window.location.replace('listado.php'); 
    </script>
  </body>
</html>