<?php
    session_start();

    if (!$_SESSION["logged"]) {
        header('Location: ../login/login.php');
    }

    $content = file_get_contents("user.html");

    $menu = file_get_contents("../menu/menu.html");

    $page = str_replace('{menu}', $menu, $content);

    $page = str_replace('{user}', $_SESSION["user"], $page);

    echo $page
?>