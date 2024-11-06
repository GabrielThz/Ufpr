<?php
$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dory';

$conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Verifique se o ID é válido
    $id = mysqli_real_escape_string($conn, $id);

    // Exclua o registro do banco de dados
    $sql = "DELETE FROM calibragem WHERE id = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir o registro: " . mysqli_error($conn);
    }

    // Redirecionar de volta para a página original
    header("Location: Index.php");
    exit;
} else {
    echo "ID não especificado.";
}
?>