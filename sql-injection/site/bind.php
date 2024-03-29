<?php

$host = 'mysql';
$username = 'kali';
$password = 'k@l!';
$database = 'lab_vulneravel';

$conn = new mysqli($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "O sistema retornou: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $GET['nome'];
    $senha = $GET['senha'];

    if ($resposta = $conn->query("SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'")) {
        $linha = $resposta->fetch_row();
        if ($linha != null) {
            echo "<br>Seja bem-vindo a nossa Área secreta.";
        } else {
            echo "Senha inválida";
        }
        $resposta->close();
    } else {
        //echo $conn->error;
        echo "Erro";
    }
}
?>
