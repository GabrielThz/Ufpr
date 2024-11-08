<?php
$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dory';

$conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);


if (isset($_GET['id_reservatorio'])) {
    $id_reservatorio = $_GET['id_reservatorio'];
    
    // Verifique se o ID é válido
    $id_reservatorio = mysqli_real_escape_string($conn, $id_reservatorio);

    // Exclua o registro do banco de dados
$sql = "DELETE FROM cadastro_reservatorio WHERE id_reservatorio = '$id_reservatorio'";
    
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