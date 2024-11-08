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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter valores do formulário (usando POST)
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $nome_acude = isset($_POST['nome_acude']) ? trim($_POST['nome_acude']) : '';
    $data = isset($_POST['data']) ? trim($_POST['data']) : '';

    $leitura1_01 = isset($_POST['leitura1_01']) ? trim($_POST['leitura1_01']) : '';
    $leitura2_01 = isset($_POST['leitura2_01']) ? trim($_POST['leitura2_01']) : '';
    $leitura3_01 = isset($_POST['leitura3_01']) ? trim($_POST['leitura3_01']) : '';

    $leitura1_025 = isset($_POST['leitura1_025']) ? trim($_POST['leitura1_025']) : '';
    $leitura2_025 = isset($_POST['leitura2_025']) ? trim($_POST['leitura2_025']) : '';
    $leitura3_025 = isset($_POST['leitura3_025']) ? trim($_POST['leitura3_025']) : '';

    $leitura1_05 = isset($_POST['leitura1_05']) ? trim($_POST['leitura1_05']) : '';
    $leitura2_05 = isset($_POST['leitura2_05']) ? trim($_POST['leitura2_05']) : '';
    $leitura3_05 = isset($_POST['leitura3_05']) ? trim($_POST['leitura3_05']) : '';

    $leitura1_1 = isset($_POST['leitura1_1']) ? trim($_POST['leitura1_1']) : '';
    $leitura2_1 = isset($_POST['leitura2_1']) ? trim($_POST['leitura2_1']) : '';
    $leitura3_1 = isset($_POST['leitura3_1']) ? trim($_POST['leitura3_1']) : '';

    $leitura1_2 = isset($_POST['leitura1_2']) ? trim($_POST['leitura1_2']) : '';
    $leitura2_2 = isset($_POST['leitura2_2']) ? trim($_POST['leitura2_2']) : '';
    $leitura3_2 = isset($_POST['leitura3_2']) ? trim($_POST['leitura3_2']) : '';

    $leitura1_35 = isset($_POST['leitura1_35']) ? trim($_POST['leitura1_35']) : '';
    $leitura2_35 = isset($_POST['leitura2_35']) ? trim($_POST['leitura2_35']) : '';
    $leitura3_35 = isset($_POST['leitura3_35']) ? trim($_POST['leitura3_35']) : '';

    $leitura1_65 = isset($_POST['leitura1_65']) ? trim($_POST['leitura1_65']) : '';
    $leitura2_65 = isset($_POST['leitura2_65']) ? trim($_POST['leitura2_65']) : '';
    $leitura3_65 = isset($_POST['leitura3_65']) ? trim($_POST['leitura3_65']) : '';

    $leitura1_10 = isset($_POST['leitura1_10']) ? trim($_POST['leitura1_10']) : '';
    $leitura2_10 = isset($_POST['leitura2_10']) ? trim($_POST['leitura2_10']) : '';
    $leitura3_10 = isset($_POST['leitura3_10']) ? trim($_POST['leitura3_10']) : '';
    

    $sql = $conn->prepare('UPDATE calibragem SET
    nome = ?, nome_acude = ?, data = ?,
    leitura1_01 = ?, leitura2_01 = ?, leitura3_01 = ?, 
    leitura1_025 = ?, leitura2_025 = ?, leitura3_025 = ?, 
    leitura1_05 = ?, leitura2_05 = ?, leitura3_05 = ?, 
    leitura1_1 = ?, leitura2_1 = ?, leitura3_1 = ?,
    leitura1_2 = ?, leitura2_2 = ?, leitura3_2 = ?, 
    leitura1_35 = ?, leitura2_35 = ?, leitura3_35 = ?, 
    leitura1_65 = ?, leitura2_65 = ?, leitura3_65 = ?, 
    leitura1_10 = ?, leitura2_10 = ?, leitura3_10 = ?');

if ($sql === false) {
die('Erro ao preparar a consulta: ' . $conn->error);
}


$sql->bind_param('sssssssssssssssssssssssssss', 
$nome, $nome_acude, $data, 
$leitura1_01, $leitura2_01, $leitura3_01, 
$leitura1_025, $leitura2_025, $leitura3_025, 
$leitura1_05, $leitura2_05, $leitura3_05, 
$leitura1_1, $leitura2_1, $leitura3_1,
$leitura1_2, $leitura2_2, $leitura3_2, 
$leitura1_35, $leitura2_35, $leitura3_35, 
$leitura1_65, $leitura2_65, $leitura3_65, 
$leitura1_10, $leitura2_10, $leitura3_10
);

    
    if ($sql->execute()) {
        header('Location: ../Visualizar calibragem/Index.php');
        exit();
    } else {
        echo 'Erro ao inserir dados: ' . $sql->error;
    }

    $sql->close();
    $conn->close();
}


?>