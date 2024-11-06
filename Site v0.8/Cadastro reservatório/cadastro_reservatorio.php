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
    $nome_acude = isset($_POST['nome_acude']) ? trim($_POST['nome_acude']) : '';
    $data_coleta = isset($_POST['data_coleta']) ? trim($_POST['data_coleta']) : '';
    $especies = isset($_POST['especies']) ? trim($_POST['especies']) : '';
    $quantidade = isset($_POST['quantidade']) ? trim($_POST['quantidade']) : '';
    $tamanho_medio = isset($_POST['tamanho_medio']) ? trim($_POST['tamanho_medio']) : '';
    $observacoes = isset($_POST['observacoes']) ? trim($_POST['observacoes']) : '';

    // Validação dos dados (exemplo básico)
    if (empty($numero_acude) || empty($nome_acude) || empty($data_coleta)) {
        die("Por favor, preencha todos os campos obrigatórios.");
    }

    // Preparar a instrução de inserção
    $stmt = $conn->prepare("INSERT INTO cadastro_reservatorio (numero_acude, nome_acude, data_coleta, especies, quantidade, tamanho_medio, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Verificar preparação
    if (!$stmt) {
        echo "Erro na preparação da consulta: " . $conn->error;
        exit;
    }

    // Bind dos parâmetros
    $stmt->bind_param("sssssss", $numero_acude, $nome_acude, $data_coleta, $especies, $quantidade, $tamanho_medio, $observacoes);

    // Executar a inserção
    if ($stmt->execute()) {
        header('Location: Index.php');
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
}


// Fechar a conexão
$conn->close();
?>