<?php

    
    function obtenerCombo($conn, $campos, $tabla, $valor_default){
        $query = "select $campos from $tabla order by 1";
        $result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));

        $codigo=0;
        $nombre="";
        $selected = "";

        $html =  "<select id=$tabla name=$tabla>
                        <option value=0 " . (($valor_default != -1)?"selected":"") . ">Seleccionar---</option>\n";

        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $codigo=$line["codigo"];
            $nombre=$line["nombre"];
            if ($valor_default != -1){
                //echo "Valor default no es null!!";
                if ($valor_default != $codigo)
                    $selected = "";
                else
                    $selected = "selected";
            }
            $html = $html . "<option value=" . strval($codigo) ." " . $selected . ">$nombre</option>\n";
        }

        $html = $html . "</select>\n";
        return $html;

    }
?>