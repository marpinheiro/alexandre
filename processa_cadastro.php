<?php

include('conexao.php');

// Verifica se o formulário de cadastro foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nivel_permissao = $_POST['nivel_permissao'];

    // Processamento dos dados (exemplo: inserção em banco de dados)
    // Substitua esta parte com o código real para inserir os dados no banco de dados

    // Exemplo de conexão com MySQL
    #$conn = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco');

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Exemplo de inserção de dados na tabela usuarios
    $sql = "INSERT INTO usuarios (email, usuario, senha, nivel_permissao) VALUES ('$email', '$usuario', '$senha', '$nivel_permissao')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }

    $conn->close();
}
?>
