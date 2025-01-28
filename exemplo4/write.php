<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "landing_page";

/* $user = file("session.txt");
if ($user[0] == "") {
    header("location: login.php");
} */
if (key_exists('nome', $_POST)) {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];
    $fone = $_POST["fone"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        exit("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user (user_nome,user_telefone,user_email,user_idade)
    VALUES ('$nome','$fone','$email','$idade')";

    if ($conn->query($sql) === TRUE) {
        $array = array("msg"=>"Enviado com Sucesso","status"=>200);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>