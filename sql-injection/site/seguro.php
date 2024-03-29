<?php

$host = 'mysql';
$username = 'kali';
$password = 'k@l!';
$database = 'lab_vulneravel';

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Falha na conexão: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Preparar a declaração
    $statement = $connection->prepare("SELECT * FROM usuarios WHERE nome = ? AND senha = ?");
    
    // Vincular parâmetros
    $statement->bind_param("ss", $nome, $senha);
    
    // Executar a declaração
    $statement->execute();
    
    // Obter o resultado
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        // Usuário autenticado com sucesso
        $row = $result->fetch_assoc();
        echo $row['nome'] . " " . $row['senha'] . "<br>Seja bem-vindo a nossa Área secreta.";
    } else {
        // Senha inválida
        echo "Senha inválida";
    }

    // Fechar a declaração e a conexão
    $statement->close();
    $connection->close();
}

?>

