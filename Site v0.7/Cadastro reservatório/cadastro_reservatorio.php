<?php
$host="localhost";
$user="root";
$password="";
$dbname="dory";

$conn = new mysqli($host, $user, $password, $dbname);

$numero_acude = isset($_POST['numero_acude']) ? $_POST['numero_acude'] : '';
$nome_acude = isset($_POST['nome_acude']) ? $_POST['nome_acude'] : '';
$data_coleta = isset($_POST['data_coleta']) ? $_POST['data_coleta'] : '';
$especies = isset($_POST['especies']) ? $_POST['especies'] : '';
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : '';
$tamanho_medio = isset($_POST['tamanho_medio']) ? $_POST['tamanho_medio'] : '';
$observacoes = isset($_POST['observacoes']) ? $_POST['observacoes'] : '';

$stmt = $conn->prepare("INSERT INTO cadastro_reservatorio (numero_acude, nome_acude, data_coleta, especies, quantidade, tamanho_medio, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $numero_acude, $nome_acude, $data_coleta, $especies, $quantidade, $tamanho_medio, $observacoes);


$stmt->close();
$conn->close();

?>