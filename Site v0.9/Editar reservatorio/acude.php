<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dory";

$conn = new mysqli($host, $user, $password, $dbname);

// Verifique se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultas para buscar os dados
$sql_usuario = "SELECT nome FROM cadastro_usuario";

$result_usuario = $conn->query($sql_usuario);

// Fechar a conexão
$conn->close();

// Verifique se há resultados
if ($result_usuario->num_rows > 0) {
    // Iterar sobre os resultados de cadastro_usuario
    while($row_usuario = $result_usuario->fetch_assoc()) {
                echo "
                <label for='nome'>Nome do proprietário</label>
                <select id='nome' name='nome' class='nome' required>
                <option value='" . htmlspecialchars($row_usuario['nome']) . "'>" . htmlspecialchars($row_usuario['nome']) . "</option>
                </select>
                ";
            }
        }else {
    echo "<p>Nenhum dado encontrado.</p>";
}
?>
