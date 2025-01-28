<?php
session_start();

if (!$_SESSION["logged"]) {
    header('Location: ../login/login.php');
}

$content = file_get_contents("listar.html");
$menu = file_get_contents("../menu.html");
$page = str_replace('{menu}', $menu, $content);
$page = str_replace('{user}', $_SESSION["user"], $page);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "landing_page";

$conn = new mysqli($servername, $username, $password, $dbname);

$edit = null;

if (key_exists('edit', $_POST)) {
    $edit = (int) $_POST["edit"];
} else if (key_exists('del', $_POST)) {
    $id = $_POST['del'];
    $sqlDel = "DELETE FROM user WHERE user_id = '$id'";
    $conn->query($sqlDel);
} else if (key_exists("confirm", $_POST)) {
    $id = $_POST["confirm"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];
    $fone = $_POST["fone"];
    $sqlEdit = "UPDATE user SET user_nome = '$nome', user_idade = '$idade' , user_email = '$email', user_telefone = '$fone' WHERE user_id = '$id'";
    $conn->query($sqlEdit);
}

$p = 0;
if (key_exists('value',$_POST)) {
    $p = (int) $_POST['value'];
    $_SESSION['value'] = $p;
} else if (key_exists('value',$_SESSION)) {
    $p = $_SESSION['value'];
}

$sqlSelect = "SELECT * FROM user";
$tabela = $conn->query($sqlSelect);
$allRows = $tabela->fetch_all();
$len = 10;
$rows = array_slice($allRows, ($p * $len), $len);
$n = 0;
$lista = "";

foreach ($rows as $row) {
    $lista = $lista . "<tr>";
    if ($n === $edit) {
        $lista = $lista . "<form method='post'>
            <td><input type='text' name='nome' value='$row[1]' required></td>
            <td><input type='tel' name='fone' class='fone' value='$row[2]' required></td>
            <td><input type='email' name='email' value='$row[3]' required></td>
            <td><input type='number' name='idade' value='$row[4]' required> </td>
            <td>
                <button type='submit' name='confirm' value='$row[0]'>Confirmar</button>
                <button type='submit' name='deny' value='x'>x</button>
            </td>
            </form>";
    } else {
        $id = array_shift($row);
        foreach ($row as $i) {
            $lista = $lista . "<td>$i</td>";
        }
        $lista = $lista . "<td>
            <form method='post'>
                <button type='submit' name='edit' value='$n'>Editar</button>
                <button type='submit' name='del' value='$id' onclick='return confirm(\"deseja deletar esse usuario?\")' >Deletar</button>
            </form>         
        </td>";
    }
    $lista = $lista . "</tr>";
    $n++;
}
if (count($allRows) > $len) {
    $np = (ceil(count($allRows) / $len));
    $pg = "<form method='post' id='p'><div class='dp'>";
    if ($p > 0) {
        $n = $p-1;
        $pg = $pg . "<button class='p' type='submit' name='value' value='$n'>Anterior</button>";
    }
    $n = $p + 1; 
    $pg = $pg . "</div>
        <div class='dp'>
            <p>$n/$np</p>
        </div>
    <div class='dp'>";
    if ($p < $np) {
        $n = $p+1;
        $pg = $pg . "<button class='p' type='submit' name='value' value='$n'>Proximo</button></div>";
    }
    $pg = $pg . "</form>";
    $page = str_replace('{page}', $pg, $page);
} else {
    $page = str_replace('{page}', "", $page);
}

$page = str_replace('{itens}', $lista, $page);

echo $page;
