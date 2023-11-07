<?php
session_start();
include('../php/conn.php');


//Cadastro Usuário
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$contato = $_POST["numero"];

//Adicionando variaveis na session
if (isset($_SESSION['nome']) && ($_SESSION['email'])) {
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
}

//Inserindo dados no Banco

if (isset($nome) && isset($email) && isset($senha) && isset($contato))  {

    $sql = "INSERT INTO cadastros (nome, email, senha, numero) VALUES ('$nome','$email','$senha','$contato')";

    $_SESSION['id'] = "SELECT id_cadastro FROM cadastros WHERE ($nome, $email)";

    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro na inserção de dados: " . mysqli_error($conn);
    }

    header('LOCATION: ../Pages/landing page.html');

}

        $sql_code = "SELECT * FROM cadastros WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id_cadastro'];
            $_SESSION['nome'] = $usuario['nome'];
        }
?>