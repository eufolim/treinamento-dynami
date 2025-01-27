<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="write.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <title>Document</title>
</head>

<script>
    $(document).ready(function() {
        $('.fone').mask("(99) 9999?99999");
    });
</script>
<?php
$user = file("session.txt");
if ($user[0] == "") {
    header("location: login.php");
}
if (key_exists('nome', $_POST)) {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];
    $fone = $_POST["fone"];

    $file = fopen("user.txt", "a");

    fwrite($file, "$nome;");
    fwrite($file, "$idade;");
    fwrite($file, "$email;");
    fwrite($file, "$fone\n");
    fclose($file);
}
?>

<header>
    <a href="menu.php" id="menu">Logo</a>
    <a href="write.php">Cadastrar</a>
    <a href="read.php">Listar</a>
    <?php
        echo "<a href='login.php' id=\"var\" onclick='return confirm(\"deseja sair da conta?\")'>$user[0]</a>"
    ?>
    <p id="user">user</p>
    
</header>
<body>
    <Main>
        <div id="formholder">
            <form action="./write.php" method="post" id="write">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="number" name="idade" placeholder="Idade" required>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="tel" name="fone" class="fone" placeholder="(__) ________" required>
                <button type="submit" form="write" id="bwrite">Enviar</button>
            </form>
        </div>
    </Main>
</body>


</html>