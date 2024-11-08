<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$nome = $_POST['nome'];
$numero_acude = $_POST['numero_acude'];
$nome_acude = $_POST['nome_acude'];
$data_coleta = $_POST['data_coleta'];
$especies = $_POST['especies'];
$quantidade = $_POST['quantidade'];
$tamanho_medio = $_POST['tamanho_medio'];
$observacoes = $_POST['observacoes'];

// Atualiza o registro no banco de dados
$sql = "UPDATE cadastro_reservatorio SET 
            nome='$nome', 
            numero_acude='$numero_acude', 
            nome_acude='$nome_acude', 
            data_coleta='$data_coleta', 
            especies='$especies', 
            quantidade='$quantidade', 
            tamanho_medio='$tamanho_medio', 
            observacoes='$observacoes'";

if ($conn->query($sql) === TRUE) {
    header('Location: ../Visualizar reservatório/Index.php');
    echo "Registro atualizado com sucesso!";
}else {
    echo "Erro ao atualizar registro: " . $conn->error;
}

$conn->close();
?>
