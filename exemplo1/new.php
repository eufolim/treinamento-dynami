<?php
    $n1 = $_GET["valor1"];
    $n2 = $_GET["valor2"];
    $op = $_GET["op"];

    
    switch ($op) {
        case "soma":
            $res = $n1 + $n2;
            break;
        case "sub":
            $res = $n1 - $n2;
            break;
        case "div":
            if ($n2 != 0) {
                $res = $n1 / $n2;
            } else {
                $res = "não é possivel dividir por 0!";
            }
            break;
        case "mult":
            $res = $n1 * $n2;
            break;
        case "pot":
            $res = $n1 ^ $n2;
            break;
    }
    
    echo $res


?>