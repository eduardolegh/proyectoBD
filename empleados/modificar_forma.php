<?php

include "../conn.php";

include "combos.php";

$codigo=$_GET["codigo"];


$query = "select nombre,cod_jornada,cod_departamento from Empleado where codigo=$codigo";
$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
$line = mysqli_fetch_array($result, MYSQLI_ASSOC);

$jornada = $line["cod_jornada"];
$departamento = $line["cod_departamento"];
$nombre = $line["nombre"];

$combo_jornadas = obtenerCombo($conn, "codigo,nombre","Jornada", $jornada);
$combo_departamentos = obtenerCombo($conn, "codigo,nombre","Departamento", $departamento);


mysqli_close($conn);


?>

<html>
  <head>
     <title>
        Empleados - Modificar
     </title>
       <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <script type="text/javascript">
      function validar(){
       // var nombre = document.getElementById("nombre").value;
        var select_jornadas = document.getElementById("Jornada");
        var select_departamentos = document.getElementById("Departamento");
        var jornada = select_jornadas.options[select_jornadas.selectedIndex].value;
        var departamento = select_departamentos.options[select_departamentos.selectedIndex].value;
        //alert("jornada: " + jornada);
        if (jornada == 0){
            alert("Debe seleccionar una jornada.");
            return false;
        }
        if (departamento == 0){
            alert("Debe seleccionar un departamento.");
            return false;
        }

        

        //alert(horas_entrada);
       

        return true;

      }
  </script>
  <body>
     <form name="modificar" action="modificar.php" onsubmit="return validar()" method="post">
      <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" >
       <table>
           <tr>
               <td><b>Nombre:</b></td>
                <td><input type="text" name="nombre" value="<?php echo $nombre; ?>" size="20" required></td>
            </tr>    
       <tr>
           <td><b>Jornada: </b></td>
            <td>
                <?php echo $combo_jornadas; ?>
            </td>    
       </tr>
       <tr>
        <td><b>Departamento: </b></td>
             <td>
             <?php echo $combo_departamentos; ?>
            </td>   
    </tr>
    <tr>
        <td colspan="2" ><input type="submit" name="submit" value="Modificar" class="btn btn-primary"></td>
    </tr>   
         
       </table> 
    </form>
      <a href="listado.php"><button type="button" class="btn btn-warning">Regresar</button></a>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>