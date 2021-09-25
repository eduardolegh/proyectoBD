<html>
  <head>
     <title>
        Empleados
     </title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <script type="text/javascript">
    function eliminar(codigo){
      if (confirm("Esta seguro de eliminar el registro?")){
        location.href="eliminar.php?codigo="+codigo;
      }
    }
  
  </script>
  <body>
    <table class="table" border=1>
    <?php
        include '../conn.php';
        $query = "select e.codigo, e.nombre as empleado, j.nombre as jornada, d.nombre as departamento 
                    from Empleado e, Jornada j, Departamento d
                    where e.cod_jornada = j.codigo
                    and e.cod_departamento = d.codigo";
        $result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));

        $codigo=0;
        $nombre="";
        $jornada = "";
        $departamento = "";

        echo "\t<tr>\n";
        echo "\t\t<th><b>Codigo</b></th>\n";
        echo "\t\t<th>Nombre</th>\n";
        echo "\t\t<th>Jornada</th>\n";
        echo "\t\t<th>Departamento</th>\n";
        echo "\t\t<th colspan=2>Acciones</th>\n";
        echo "\t</tr>\n";

        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $codigo=$line["codigo"];
            $nombre=$line["empleado"];
            $jornada=$line["jornada"];
            $departamento=$line["departamento"];

            echo "\t<tr>\n";
            echo "\t\t<td>$codigo</td>\n";
            echo "\t\t<td>$nombre</td>\n";
            echo "\t\t<td>$jornada</td>\n";
            echo "\t\t<td>$departamento</td>\n";
            echo "\t\t<td><a href=\"javascript:eliminar($codigo);\"><img src=../images/icon-remove.png></a></td>\n";
            echo "\t\t<td><a href=modificar_forma.php?codigo=$codigo><img src=../images/icon-edit.jpg></a></td>\n";
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

     <div class="btn-group" role="group" aria-label="Basic example">
      <a href="insertar_forma.php"><button type="button" class="btn btn-primary">Nuevo</button></a>
      <a href="../index.php"><button type="button" class="btn btn-warning">Regresar</button></a>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>  