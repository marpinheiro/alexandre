<?php
// Incluir a biblioteca TCPDF
require_once('tcpdf/tcpdf.php');

// Função para gerar o recibo em PDF
function gerarReciboPDF($nome_cliente, $servico_prestado, $valor) {
    // Criar novo objeto TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Definir informações do documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Seu Nome');
    $pdf->SetTitle('Recibo de Serviço Prestado');
    $pdf->SetSubject('Recibo');
    $pdf->SetKeywords('Recibo, Serviço, Prestado');

    // Definir margens
    $pdf->SetMargins(10, 10, 10);

    // Adicionar uma página
    $pdf->AddPage();

    // Definir o estilo do texto
    $pdf->SetFont('helvetica', 'B', 16);

    // Título
    $pdf->Cell(0, 10, 'Recibo de Serviço Prestado', 0, 1, 'C');

    // Adicionar espaço
    $pdf->Ln(10);

    // Definir estilo regular para o texto
    $pdf->SetFont('helvetica', '', 12);

    // Informações do recibo
    $pdf->Cell(0, 10, 'Nome do Cliente: ' . $nome_cliente, 0, 1);
    $pdf->Cell(0, 10, 'Descrição do Serviço: ' . $servico_prestado, 0, 1);
    $pdf->Cell(0, 10, 'Valor do Serviço: R$ ' . $valor, 0, 1);

    // Salvar o PDF em um arquivo
    $pdf->Output('recibo.pdf', 'I');
}

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "recibo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processamento dos dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_cliente = $_POST["nome_cliente"];
    $servico_prestado = $_POST["servico_prestado"];
    $valor = $_POST["valor"];

    // Inserção dos dados no banco de dados
    $sql = "INSERT INTO recibos (nome_cliente, servico_prestado, valor) VALUES ('$nome_cliente', '$servico_prestado', '$valor')";

    if ($conn->query($sql) === TRUE) {
        // Gerar recibo em PDF
        gerarReciboPDF($nome_cliente, $servico_prestado, $valor);
    } else {
        echo "Erro ao inserir os dados no banco de dados: " . $conn->error;
    }
}

$conn->close();
?>