<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dory";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT img FROM cadastro_reservatorio";

// Executar consulta
$result = $conn->query($sql);

Header("Content-type: image/gif");

// If $row["img"] contains the file path
$image_path = $row["img"];
readfile($image_path);
            echo $row["img"];
// Fechar conexão
$conn->close();
?>