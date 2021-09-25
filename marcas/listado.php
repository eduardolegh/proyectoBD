<html>
  <head>
     <title>
        Listado de Marcas 
     </title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
    Ultimas Marcas
    <table class="table" border=1>
    <?php
        include '../conn.php';
        $query = "SELECT e.nombre as empleado,t.nombre as tipo_marca, m.fecha as fecha,m.hora as hora 
                  FROM Marca m,TipoMarca t,Empleado e 
                  WHERE e.codigo = m.cod_empleado and t.codigo = m.tipo_marca 
                  order by fecha desc,hora desc";

        $result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));

        $codigo=0;
        $nombre="";
        $tipomarca = "";
        $fecha = "";
        $hora = "";

        echo "\t<tr>\n";
        echo "\t\t<th>Nombre</th>\n";
        echo "\t\t<th>Tipo Marca</th>\n";
        echo "\t\t<th>Fecha</th>\n";
        echo "\t\t<th>Hora</th>\n";
        echo "\t</tr>\n";

        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

           
            $nombre=$line["empleado"];
            $tipomarca=$line["tipo_marca"];
            $fecha=$line["fecha"];
            $hora=$line["hora"];

            echo "\t<tr>\n";
          
            echo "\t\t<td>$nombre</td>\n";
            echo "\t\t<td>$tipomarca</td>\n";
            echo "\t\t<td>$fecha</td>\n";
            echo "\t\t<td>$hora</td>\n";
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
  <a href="insertaMarca.php"><button type="button" class="btn btn-primary">Marcar</button></a>
  <a href="../index.php"><button type="button" class="btn btn-warning">Regresar</button></a>
</div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>  