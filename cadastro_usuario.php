<?php
include('proteger.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="processa_cadastro.php" method="POST">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="nivel_permissao">Nível de Permissão:</label>
        <select id="nivel_permissao" name="nivel_permissao">
            <option value="usuario">Usuário</option>
            <option value="admin">Administrador</option>
        </select><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>