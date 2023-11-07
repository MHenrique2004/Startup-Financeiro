<?php

session_start();
include('../php/conn.php');

$id_user = $_SESSION['id'];
    

    $busca_data_atual = "SELECT MAX(dia) FROM dados WHERE id_usuario = $id_user";
    $busca_data_atual_sql = mysqli_query($conn, $busca_data_atual);

    $busca_data_atual = "SELECT MAX(dia) AS data_maxima FROM dados WHERE id_usuario = $id_user";
    $busca_data_atual_sql = mysqli_query($conn, $busca_data_atual);
    $data_maxima = mysqli_fetch_assoc($busca_data_atual_sql)['data_maxima'];

    $condicaoData = date('Y-m-d', strtotime("-30 days"));

    $sql_dia1 = "SELECT * FROM dados WHERE dia = '$data_mes_anterior'";
    $busca2 = mysqli_query($conn, $sql_dia1);

    $_SESSION['dia_mes'] = $sql_dia1;
    

    header('Location: ../Pages/meus_dados2.php');

?>