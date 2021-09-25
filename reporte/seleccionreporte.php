<?php 
   date_default_timezone_get();
   $time = date_default_timezone_set("America/Guatemala");
   $time = 
   $time=date("H:i:s");
?>   
</script>
<html>
  <head>
     <title>
        Reporte de Empleados
     </title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
     <form action="reporte.php" method="post">
       <b>Empleado:</b>
       <br>
       <select name="empleado" id = "empleado" class="form-control">
      <?php
         include "../conn.php";
         $getEmpleadosSql = "select * from Empleado order by codigo ";
         $getEmpleadosRs = mysqli_query($conn,$getEmpleadosSql);

         while($row = mysqli_fetch_array($getEmpleadosRs)){
            $codigoEmp = $row['codigo'];
            $nombreEmp = $row['nombre'];

            ?> 
               <option value="<?php echo $codigoEmp ?>"> <?php echo $nombreEmp ?></option>
         <?php
         }


       ?> 
       </select><br>
       <b>Falta:</b>
       <br>
       <b>Fecha de Inicio:</b>
       <br>
       <input type="date" id="fechaini" name="fechaini" value="<?php echo date("Y-m-d");?>" >
       <br>
       <br>
       <b>Fecha de Inicio:</b>
       <br>
       <input type="date" id="fechaini" name="fechafin" value="<?php echo date("Y-m-d");?>" >
       <br>
       <input type="submit" name="submit" value="Mostrar" class="btn btn-lg btn-primary">     
     </form>
         <a href="../index.php"><button type="button" class="btn btn-warning">Regresar</button></a>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>