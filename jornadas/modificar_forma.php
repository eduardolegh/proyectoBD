<html>
  <head>
     <title>
        Jornadas - Modificar
     </title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <script type="text/javascript">
      function validar(){
        var horas_entrada = document.getElementById("horas_entrada").value;
        var minutos_entrada = document.getElementById("minutos_entrada").value;
        var horas_salida = document.getElementById("horas_salida").value;
        var minutos_salida = document.getElementById("minutos_salida").value;

        //alert(horas_entrada);
        if (horas_entrada < 0 || horas_entrada > 23){
                alert("Las horas de entrada no pueden ser menor a 0 y mayor a 23");
                return false;
        }
       
        if (minutos_entrada < 0 || minutos_entrada > 59){
                alert("Los minutos de entrada no pueden ser menor a 0 y mayor a 59");
                return false;
        }
        

        if (horas_salida < 0 || horas_salida > 23){
            alert("Las horas de salida no pueden ser menor a 0 y mayor a 23");
            return false;
        }
        
        if (minutos_salida < 0 || minutos_salida > 59){
            alert("Los minutos de salida no pueden ser menor a 0 y mayor a 59");
            return false;
        }
        

        return true;

      }
  </script>
  <body>
     <form action="modificar.php" onsubmit="return validar()" method="post">

<?php
    include "../conn.php";
	$codigo=$_GET["codigo"];
    $query = "select nombre,hora_entrada,hora_salida from Jornada where codigo=$codigo";
    $result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
    $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $horas_entrada = explode(":", $line["hora_entrada"]);
    $horas_salida = explode(":", $line["hora_salida"]);  

    //echo "<b>Codigo: </b>$codigo\n";
    echo "<input type=hidden name=codigo value=$codigo>\n";
    

    //echo "<input type=text name=nombre value=" . $line["nombre"] . " length=20><br>\n";
    echo "<table class=\"table\" border=1>
    <tr>
      <td><b>Codigo: </b></td>
      <td>$codigo</td>
    </tr>
    <tr>
        <td><b>Nombre:</b></td>
         <td><input type=\"text\" name=\"nombre\" value=\"" . $line["nombre"] . "\" size=\"20\" required></td>
     </tr>    
<tr>
    <td><b>Hora Entrada: </b></td>
     <td>
         <input type=\"number\" id=\"horas_entrada\" name=\"horas_entrada\" value=\"" . $horas_entrada[0] . "\" size=\"2\" maxlength=\"2\"> : 
         <input type=\"number\" id=\"minutos_entrada\" name=\"minutos_entrada\" value=\"" . $horas_entrada[1] . "\" maxlength=\"2\" size=\"2\">
     </td>    
</tr>
<tr>
 <td><b>Hora Salida: </b></td>
  <td>
      <input type=\"number\" id=\"horas_salida\" name=\"horas_salida\" value=\"" . $horas_salida[0] . "\" size=\"2\" maxlength=\"2\"> : 
      <input type=\"number\" id=\"minutos_salida\" name=\"minutos_salida\" value=\"" . $horas_salida[1] . "\"  maxlength=\"2\" size=\"2\">
  </td>    
</tr>
<tr>
 <td colspan=\"2\" ><input type=\"submit\" name=\"submit\" value=\"Modificar\" class=\"btn btn-primary\"></td>
</tr>   
  
</table>";
    mysqli_close($conn);

?>

            
     </form>
     <a href="listado.php"><button type="button" class="btn btn-warning">Regresar</button></a>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>