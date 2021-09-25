<html>
  <head>
     <title>
        Faltas - Modificar
     </title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
  <form name="modificar" action="modificar.php" method="post">

<?php
    include "../conn.php";
	$codigo=$_GET["codigo"];
    $query = "select nombre from Falta where codigo=$codigo";
    $result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error($conn));
    $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
	

    echo "<b>Codigo: </b>$codigo<br>\n";
    echo "<input type=hidden name=codigo value=$codigo>\n";
    echo "<b>Nombre:</b>\n";

    echo "<input type=text name=nombre value=\"" . $line["nombre"] . "\" length=20><br>\n";
    mysqli_close($conn);

?>

       <input type="submit" name="submit" value="Modificar" class="btn btn-primary">     
     </form>
      <a href="listado.php"><button type="button" class="btn btn-warning">Regresar</button></a>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>