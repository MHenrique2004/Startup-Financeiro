<?php
session_start();
include('../php/conn.php');

// Informações para o banco

$id_usuario = $_SESSION['id'];
$data = date('Y-m-d');

$renda = $_POST["renda"];
$aluguel = $_POST["aluguel"];
$gas = $_POST["gas"];
$guardar = $_POST["guardar"];
$cartao = $_POST["cartao"];
$objt_pessoal = $_POST["objt_pessoal"];
$pessoas = $_POST["pessoas"];
$meses = $_POST["meses"];
$saude = $_POST["saude"];
$alimentacao = $_POST["alimentacao"];
$energia = $_POST["energia"];
$agua = $_POST["agua"];

// Calculando Gasto
if (isset($objt_pessoal, $meses)) {
    $gasto_objt = $objt_pessoal / $meses;
}
if (isset($renda, $aluguel, $gas, $guardar, $cartao, $saude, $alimentacao, $energia, $agua)) {
    $gasto = $renda - $aluguel - $gas - $guardar - $cartao - $gasto_objt - $saude - $alimentacao - $energia - $agua;
}

// Criando SESSION

$_SESSION['total'] = $renda;
$_SESSION['gasto'] = $gasto;
$_SESSION['objetivo'] = $objt_pessoal;

// Enviando dados para o banco 

if (isset($renda)){

    $sql = "INSERT INTO dados (id_usuario, dia, renda, aluguel, gas, guardar, cartao, objtv, pessoas, meses, saude, alimentacao, energia, agua, gastos) VALUES ('$id_usuario','$data','$renda','$aluguel','$gas','$guardar','$cartao','$objt_pessoal','$pessoas','$meses','$saude','$alimentacao','$energia','$agua','$gasto')";

    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro na inserção de dados: " . mysqli_error($conn);
    }

    header('Location: ../Pages/meus_dados.php');
}





    // Enviando outros para o banco

    //$contador = 1;
    //while (isset($_POST["item" . $contador]) && isset($_POST["quant" . $contador]) && isset($_POST["material-servico" . $contador]) && isset($_POST["preco-unitario" . $contador])) {
    //    if ($_POST["material-servico" . $contador] !== "") {
    //        $item = $_POST["item" . $contador];
    //        $quant = $_POST["quant" . $contador];
    //        $material_servico = $_POST["material-servico" . $contador];
    //        $preco_unitario = str_replace('R$', '', $_POST["preco-unitario" . $contador]);
    //        $preco_final = str_replace('R$', '', $_POST["preco-final" . $contador]);
    //        
    //        $insere = "INSERT INTO servicos (id_orcamento, itens, quant, material_servico, preco_unitario, preco_final) VALUES //('$id_orcamento', '$item', '$quant', '$material_servico', '$preco_unitario', '$preco_final')";
    //        
    //        mysqli_query($conn, $insere) or die("Não foi possível executar a inserção");
    //   }
    //    $contador++;
    //}



?>