<?php

include "../conn.php";

include "combos.php";

$combo_jornadas = obtenerCombo($conn, "codigo,nombre","Jornada", -1);
$combo_departamentos = obtenerCombo($conn, "codigo,nombre","Departamento", -1);


mysqli_close($conn);


?>


<html>
  <head>
     <title>
        Empleados - Insertar
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
     <form name="insertar" action="insertar.php" onsubmit="return validar()" method="post">
       <table>
           <tr>
               <td><b>Nombre:</b></td>
                <td><input type="text" name="nombre" size="20" required></td>
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
        <td colspan="2" ><input type="submit" name="submit" value="Insertar" class="btn btn-primary"></td>
    </tr>   
         
       </table> 
    </form>
   
         <a href="listado.php"><button type="button" class="btn btn-warning">Regresar</button></a>
    
  </body>
</html>