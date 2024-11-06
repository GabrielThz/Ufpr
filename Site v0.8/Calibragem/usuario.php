<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dory";

$conn = new mysqli($host, $user, $password, $dbname);
 $sql = "SELECT * FROM cadastro_usuario";
 $result = $conn->query($sql);

 $conn->close();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option class='nome'>" . $row["nome"] . "</option>";
    }
}else{
    echo "<option class= 'nome'> nenhum usuario encontrado </option>";
}
?>