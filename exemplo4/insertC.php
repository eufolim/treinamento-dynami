<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "landing_page";

$conn = new mysqli($servername, $username, $password, $dbname);

if (key_exists("form",$_POST)) {
    $form = $_POST["form"];
    $temp1 = array_splice($form,1,1);
    $temp2 = array_splice($form,0,3);
    $form = array_merge($temp2,$temp1,$form);
    $insert = "( ";
    foreach ($form as  $k => $v) {
        $val = $v['value'];
        $insert = $insert . "'$val'";
        if ($k != array_key_last($form)) {
            $insert = $insert . ", ";
        }
    }
    var_dump($insert);
    $sql = "INSERT INTO cliente (cliente_nome, cliente_tipo, cliente_cpf_cnpj, cliente_data_nascimento_fundacao, cliente_celular, cliente_rua, cliente_numero, cliente_bairro, cliente_cidade, cliente_estado, cliente_status)
    VALUES $insert)";

    if ($conn->query($sql) === TRUE) {
        $array = array("msg"=>"Enviado com Sucesso","status"=>200);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}   

?>