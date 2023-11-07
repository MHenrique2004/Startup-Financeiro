<?php


if (!isset($_SESSION['id'])){
    header('Location: login.html?erro = true');
    session_destroy();
}

?>