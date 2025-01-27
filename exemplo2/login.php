<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>

<?php
    $session = fopen('session.txt',"w");
    fclose($session);
    $validUser = array("Jefferson"=>"4321","Luiz"=>"123","Miguel"=>"1111");
    if (key_exists("nome",$_POST)) {
        if (key_exists($_POST["nome"],$validUser)) {
            if ($_POST['senha'] == $validUser[$_POST['nome']]) {
                $session = fopen("session.txt","w");
                fwrite($session,$_POST["nome"]);
                fwrite($session,"\n");
                fwrite($session,$_POST["senha"]);
                header('Location: write.php');
            }
        }
    }
?>

<body>
    <Main>
        <div id="formholder">
            <form method="post">
                <input type="text" name="nome" placeholder="Nome de Usuario" required>
                <input type="number" name="senha" placeholder="Senha" required>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </Main>
</body>

</html>