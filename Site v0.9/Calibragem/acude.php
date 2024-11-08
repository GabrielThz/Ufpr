<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dory";

$conn = new mysqli($host, $user, $password, $dbname);
 $sql = "SELECT * FROM cadastro_reservatorio";
 $result = $conn->query($sql);

 $conn->close();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option id='nome_acude'>" . $row["nome_acude"] . "</option>";
    }
}else{
    echo "<option id= 'nome_acude'> nenhum reservatorio encontrado </option>";
}
?>
