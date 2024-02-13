<?php
include('proteger.php');

?>
<!DOCTYPEhtml>
<html lang="pt">
<cabeça>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="largura=largura do dispositivo, escala inicial=1,0">
    <title>Painel</title>
</head>
<corpo>
    Bem vindo ao Painel, <?php echo $_SESSION['username']; ?>.

    <p>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>