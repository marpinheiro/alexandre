<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "recibo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Query para verificar o usuário e senha no banco de dados
$sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Verifica se o usuário foi encontrado
if ($result->num_rows > 0) {
    // Obtém os dados do usuário
    $row = $result->fetch_assoc();
    $nivel_permissao = $row['nivel_permissao'];

    // Verifica o nível de permissão
    if ($nivel_permissao == 'admin') {
        // Usuário administrador autenticado, redireciona para o painel de administração
        header("Location: painel_admin.php");
    } elseif ($nivel_permissao == 'usuario') {
        // Usuário comum autenticado, redireciona para a página de usuário
        header("Location: painel_usuario.php");
    } else {
        // Nível de permissão desconhecido, redireciona de volta para a página de login
        header("Location: index.html");
    }
} else {
    // Usuário não autenticado, redireciona de volta para a página de login
    header("Location: index.html");
}

$conn->close();
?>
