<html>
  <head>
     <title>
        Permisos
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
    <?php
        include '../conn.php';
        $query = "Select p.codigo,e.nombre as empleado,p.fecha,f.nombre as permiso from Permiso p, Falta f, Empleado e
                    where e.codigo = p.cod_empleado
                    and f.codigo = p.cod_falta";
        $result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));

        $codigo=0;
        $nombre="";
        $fecha = "";
        $permiso = "";
?>
Listado de  Permisos Agregados
<table class="table" border=1>
<?php
       
        echo "\t<tr>\n";
        echo "\t\t<th><b>Codigo</b></th>\n";
        echo "\t\t<th>Nombre</th>\n";
        echo "\t\t<th>Fecha</th>\n";
        echo "\t\t<th>Permiso</th>\n";
        echo "\t\t<th colspan=2>Acciones</th>\n";
        echo "\t</tr>\n";

        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $codigo=$line["codigo"];
            $nombre=$line["empleado"];
            $fecha=$line["fecha"];
            $permiso=$line["permiso"];

            echo "\t<tr>\n";
            echo "\t\t<td>$codigo</td>\n";
            echo "\t\t<td>$nombre</td>\n";
            echo "\t\t<td>$fecha</td>\n";
            echo "\t\t<td>$permiso</td>\n";
            echo "\t\t<td><a href=\"javascript:eliminar($codigo);\"><img src=../images/icon-remove.png></a></td>\n";
            echo "\t\t<td><a href=modificar_forma.php?codigo=$codigo><img src=../images/icon-edit.jpg></a></td>\n";
            echo "\t</tr>\n";
        }
        echo "</table>\n";
        echo "<br>";
        echo "<table style=\"border-collapse: collapse; border: none;\">\n";
        echo "\t<tr>\n";
        echo "\t\t<td>\n";
        
        echo "</td>\n";
        echo "\t</tr>\n";
        echo "</table>";

        mysqli_close($conn);


    ?>
    <div class="btn-group" role="group" aria-label="Basic example">
  <a href="insertaPermisos.php"><button type="button" class="btn btn-primary">Nuevo</button></a>
  <a href="../index.php"><button type="button" class="btn btn-warning">Regresar</button></a>
</div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>  