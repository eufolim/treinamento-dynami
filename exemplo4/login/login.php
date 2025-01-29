<?php
    session_start();

    $_SESSION["logged"] = false;

    $content = file_get_contents("login.html");

    $validUser = array("Jefferson"=>"4321","Luiz"=>"123","Miguel"=>"1111");
    if (key_exists("nome",$_POST)) {
        if (key_exists($_POST["nome"],$validUser)) {
            if ($_POST['senha'] == $validUser[$_POST['nome']]) {
                $_SESSION["user"] = $_POST["nome"];
                $_SESSION["pass"] = $_POST["senha"];
                $_SESSION["logged"] = true;
                header('Location: ../cadastro/user.php');
            }
        }
    }

    echo $content;
?>