<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dory";

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter valores do formulário (usando POST)
    $numero_acude = isset($_POST['numero_acude']) ? trim($_POST['numero_acude']) : '';
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $nome_acude = isset($_POST['nome_acude']) ? trim($_POST['nome_acude']) : '';
    $data_coleta = isset($_POST['data_coleta']) ? trim($_POST['data_coleta']) : '';
    $especies = isset($_POST['especies']) ? trim($_POST['especies']) : '';
    $quantidade = isset($_POST['quantidade']) ? trim($_POST['quantidade']) : '';
    $tamanho_medio = isset($_POST['tamanho_medio']) ? trim($_POST['tamanho_medio']) : '';
    $img = isset($_POST['img']) ? trim($_POST['img']) : '';
    $observacoes = isset($_POST['observacoes']) ? trim($_POST['observacoes']) : '';

    // Preparar a consulta
$stmt = $conn->prepare("INSERT INTO cadastro_reservatorio (numero_acude, nome, nome_acude, data_coleta, especies, quantidade, tamanho_medio, img, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Verificar a preparação
if (!$stmt) {
    echo "Erro na preparação da consulta: " . $conn->error;
    exit;
}

// Bind dos parâmetros (usar "b" para a imagem)
$stmt->bind_param("sssssssbs", $numero_acude, $nome, $nome_acude, $data_coleta, $especies, $quantidade, $tamanho_medio, $img, $observacoes);

// Enviar dados binários da imagem
$stmt->send_long_data(6, $img); // "6" é o índice do parâmetro correspondente a "img" (começa de 0)
    // Executar a inserção
    if ($stmt->execute()) {
        header('Location: ../Visualizar reservatório/Index.php');
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
}


// Fechar a conexão
$conn->close();
?>