<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="read.css">
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
$edit = null;
if (key_exists('del', $_POST)) {
    $file = file("user.txt");
    $n = $_POST['del'];
    unset($file[$n]);
    file_put_contents("user.txt", $file);
} else if (key_exists('edit', $_POST)) {
    $edit = (int) $_POST["edit"];
} else if (key_exists("confirm", $_POST)) {
    $file = file("user.txt");
    $n = (int) $_POST["confirm"];
    $line = $_POST['nome'] . ";" . $_POST['idade'] . ";" . $_POST['email'] . ";" . $_POST['fone'] . "\n";
    $file[$n] = $line;
    file_put_contents("user.txt", $file);
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
    <main>
        <table>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
            <?php
            $file = file("user.txt");
            $size = sizeof($file);
            $n = 0;
            while ($n != $size) {
                echo "<tr>";
                if ($n === $edit) {
                    echo "<form method='post'>";
                    $line = $file[$n];
                    $values = explode(";", $line);
                    echo "<td><input type='text' name='nome' value='$values[0]' required></td>
                        <td><input type='number' name='idade' value='$values[1]' required></td>
                        <td><input type='email' name='email' value='$values[2]' required></td>
                        <td><input type='tel' name='fone' class='fone' value='$values[3]' required> </td>
                        <td>
                            <button type='submit' name='confirm' value='$n'>Confirmar</button>
                            <button type='submit' name='deny' value='x'>x</button>
                        </td>
                        </form>";
                } else {
                    $line = $file[$n];
                    $values = explode(";", $line);
                    foreach ($values as $i) {
                        echo "<td>$i</td>";
                    }
                    echo "<td>
                            <form method='post'>
                                <button type='submit' name='edit' value='$n'>Editar</button>
                                <button type='submit' name='del' value='$n' onclick='return confirm(\"deseja deletar esse usuario?\")' >Deletar</button>
                            </form>         
                        </td>";
                }
                echo "</tr>";
                $n++;
            }
            ?>
        </table>
    </main>
</body>

</html>