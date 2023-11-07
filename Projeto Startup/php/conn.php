<?php

$hostname = "localhost";
$usuario = "root";
$senha = "";
$banco = "gs_startup";

// Create connection
$conn = new mysqli($hostname, $usuario, $senha, $banco);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>