<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "landing_page";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        exit("Connection failed: " . $conn->connect_error);
    }

    $fones = $_POST["fones"];
    var_dump($fones);
    foreach ($fones as $i){

        $sql = "INSERT INTO telefones (telefones_numero)
        VALUES ('$i')";

        if ($conn->query($sql) === TRUE) {
            $array = array("msg"=>"Enviado com Sucesso","status"=>200);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();

    /* header('location: example.php') */
?>