<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "landing_page";

$conn = new mysqli($servername, $username, $password, $dbname);

if (key_exists("form",$_POST)) {
    $form = $_POST["form"];
    $insert = "( ";
    foreach ($form as  $k => $v) {
        $val = $v['value'];
        $insert = $insert . "'$val'";
        if ($k != array_key_last($form)) {
            $insert = $insert . ", ";
        }
    }
    var_dump($insert);
    $sql = "INSERT INTO produto (produto_codigo, produto_nome, produto_codigo_barras, produto_valor, produto_status)
    VALUES $insert)";

    if ($conn->query($sql) === TRUE) {
        $array = array("msg"=>"Enviado com Sucesso","status"=>200);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}   

?>