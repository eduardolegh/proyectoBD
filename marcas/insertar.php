<html>
  <head>
     <title>
        Inserta Marcas
     </title>
  </head>
  <body>
<?php

$codigoEmpl=$_POST["empleado"];
$tipoMarca=$_POST["marca"];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];

include "../conn.php";

$query = "INSERT INTO Marca(cod_empleado,fecha,hora,tipo_marca) VALUES ('$codigoEmpl','$fecha','$hora','$tipoMarca')";

if(mysqli_query($conn,$query)){
                    echo '<script> alert("Registro Insertado Exitosamente")</script>';               
                }else{
                   if(mysqli_errno($conn) == 1062)   
                     echo '<script> alert("No se puede Marcar dos veces el mismo Tipo de Marca en el mismo Dia")</script>'; 
                   else
                    echo "Error al insertar en base de datos:".$query."<br>";

                }



mysqli_close($conn);

?>

<script> 
    window.location.replace('listado.php'); 
</script>
     
  </body>
</html>