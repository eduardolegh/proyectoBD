<?php

include "../conn.php";

$codigo=$_POST["empleado"];
$fechaini=$_POST["fechaini"];
$fechafin=$_POST["fechafin"];


$query = "select e.codigo ,e.nombre ,e.cod_departamento, d.nombre as ndepartamento,e.cod_jornada,j.nombre as njornada,j.hora_entrada,j.hora_salida
            from Empleado e, Departamento d,Jornada j
            where e.cod_departamento = d.codigo
            and e.cod_jornada = j.codigo
            and e.codigo  =$codigo";


$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
$lineCn = mysqli_fetch_array($result, MYSQLI_ASSOC);

$nombre = $lineCn["nombre"];
$cod_departamento = $lineCn["cod_departamento"];
$ndepartamento = $lineCn["ndepartamento"];
$cod_jornada = $lineCn["cod_jornada"];
$njornada = $lineCn["njornada"];
$hora_entrada = $lineCn["hora_entrada"];
$hora_salida = $lineCn["hora_salida"];

$strnombre = $codigo.' - '.$nombre;
$strDepartamento = $cod_departamento.' - '.$ndepartamento;
$strJornada = $njornada.' de '.$hora_entrada.' a '.$hora_salida;

$queryRepo = "SELECT sub.cod_empleado,sub.fecha ,
            (SELECT m2.hora from Marca m2 where m2.cod_empleado=sub.cod_empleado and m2.tipo_marca=1 and m2.fecha=sub.fecha) as hora_entrada,
            (SELECT m2.hora from Marca m2 where m2.cod_empleado=sub.cod_empleado and m2.tipo_marca=2 and m2.fecha=sub.fecha) as hora_salida,
            (SELECT f.nombre from Falta f where f.codigo= sub.cod_falta) as faltaObs
            from(
            SELECT m.cod_empleado,m.fecha,p.cod_falta
            from Marca m
            LEFT JOIN Permiso p
            on m.cod_empleado = p.cod_empleado
            AND m.fecha = p.fecha
            UNION
            SELECT p.cod_empleado,p.fecha,p.cod_falta
            from Marca m
            RIGHT JOIN Permiso p
            on m.cod_empleado = p.cod_empleado
            AND m.fecha = p.fecha) as sub
            where sub.cod_empleado = $codigo
            and sub.fecha BETWEEN '$fechaini' and '$fechafin'
            order by sub.fecha ASC";

$resultReporte = mysqli_query($conn,$queryRepo) or die('Query failed: ' . mysqli_error($conn));

 ?>
<html>
  <head>
     <title>
        Reporte de Empleados
     </title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
    <label for="Name">Reporte de entrada y salidas del <?php echo "$fechaini" ?> al <?php echo "$fechafin"?> </label> <br>
    <br>
    <label for="Name">Empleado: </label> <label for="Name"><?php echo "$strnombre" ?> </label> <br>
    <label for="Name">Deparamento: </label> <label for="Name"><?php echo "$strDepartamento" ?></label> <br>
    <label for="Name">Jornada: </label> <label for="Name"><?php echo "$strJornada" ?></label> <br><br>


    <table class="table" border=1>

    <?php
       
        $cod_empleado=0;
        $fecha="";
        $hora_entrada_marca = "";
        $hora_salida_marca = "";
        $entrada_tarde = "";
        $salida_temprano = "";
        $horas_trabajadas = "";
        $faltaObs = "";

        echo "\t<tr>\n";
        echo "\t\t<th>Fecha</th>\n";
        echo "\t\t<th>Entrada</th>\n";
        echo "\t\t<th>Salida</th>\n";
        echo "\t\t<th>Entrada Tarde Minutos</th>\n";
        echo "\t\t<th>Salida Temprano Minutos</th>\n";
        echo "\t\t<th>Horas Trabajadas</th>\n";
        echo "\t\t<th>Observaciones/Permisos</th>\n";
        echo "\t</tr>\n";

        while ($line = mysqli_fetch_array($resultReporte, MYSQLI_ASSOC)) {

            $fecha= $line["fecha"];;
            $hora_entrada_marca = $line["hora_entrada"];;
            $hora_salida_marca = $line["hora_salida"];;
            $faltaObs = $line["faltaObs"];;
           
            $hora_entrada_dt = new DateTime($hora_entrada);
            $hora_salida_dt = new DateTime($hora_salida);

            $hora_entrada_marca_dt = new DateTime($hora_entrada_marca);
            $hora_salida_marca_dt = new DateTime($hora_salida_marca);

            if(is_null($hora_entrada_marca) or is_null($hora_salida_marca)){
                $horas_trabajadas = '0';
            } else {
                $seg_trabajadas = abs($hora_entrada_marca_dt->getTimestamp() - $hora_salida_marca_dt->getTimestamp());
                $horas_trabajadas = bcdiv($seg_trabajadas / 3600, '1', 3);
            }
            
            if(is_null($hora_entrada_marca)){
                $entrada_tarde = '0';
            } else {
                if($hora_entrada_marca_dt<$hora_entrada_dt){
                    $entrada_tarde = '0';
                }else {
                    $seg_entrada_tarde = abs($hora_entrada_dt->getTimestamp() - $hora_entrada_marca_dt->getTimestamp());
                    $entrada_tarde = bcdiv($seg_entrada_tarde /60, '1', 0);
                }
                
            }

             if(is_null($hora_salida_marca)){
                $salida_temprano = '0';
            } else {
                if($hora_salida_dt<$hora_salida_marca_dt){
                    $salida_temprano = '0';
                } else {
                     $seg_salida_temprano = abs($hora_salida_dt->getTimestamp() - $hora_salida_marca_dt->getTimestamp());
                     $salida_temprano = bcdiv($seg_salida_temprano /60, '1', 0);
                }
            }


            echo "\t<tr>\n";
          
            echo "\t\t<td>$fecha</td>\n";
            echo "\t\t<td>$hora_entrada_marca</td>\n";
            echo "\t\t<td>$hora_salida_marca</td>\n";
            echo "\t\t<td>$entrada_tarde</td>\n";
            echo "\t\t<td>$salida_temprano</td>\n";
            echo "\t\t<td>$horas_trabajadas</td>\n";
            echo "\t\t<td>$faltaObs</td>\n";
            echo "\t</tr>\n";
        }
        echo "</table>\n";
        echo "<br>";
        echo "<table style=\"border-collapse: collapse; border: none;\">\n";
        echo "\t<tr>\n";
        echo "\t\t<td>\n";
        echo "</td>";
        echo "\t\t<td>";

        echo "</td>\n";
        echo "\t</tr>\n";
        echo "</table>";

        mysqli_close($conn);


    ?>
    <a href="seleccionreporte.php"><button type="button" class="btn btn-warning">Regresar</button></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>  