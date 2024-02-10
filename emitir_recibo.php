<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "recibo";

$conn = mysqli_connect($servidor,$usuario,$senha,$banco);

if(!$conn){

    echo " deu ruim";
} else{

    echo " deu tudo certo na conexao";
}


?>

?>