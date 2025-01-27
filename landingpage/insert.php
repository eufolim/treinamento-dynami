<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "landing_page";

    if (!key_exists("nome",$_POST)) {
        exit("POST não encontrado");
    }

    $nome = $_POST['nome'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];
    $sis = $_POST['sis'];
    $obs = $_POST['obs'];

    if (empty($nome) || empty($fone) || empty($email) || empty($sis)){
        $array = array("msg"=>"Campo vazio","status"=>400);
        echo json_encode($array);
        exit(400);
    }

    if (preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",$email) == 0){
        $array = array("msg"=>"Email invalido","status"=>400);
        echo json_encode($array);
        exit(400);
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        exit("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO dados (dados_nome,dados_telefone,dados_email,dados_sistema,dados_obs)
    VALUES ('$nome','$fone','$email','$sis','$obs')";

    if ($conn->query($sql) === TRUE) {
        $array = array("msg"=>"Enviado com Sucesso","status"=>200);
        echo json_encode($array);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    /* header('location: example.php') */
?>