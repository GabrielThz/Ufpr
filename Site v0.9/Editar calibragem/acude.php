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
$sql_reservatorio = "SELECT nome_acude FROM cadastro_reservatorio";
$sql_usuario = "SELECT nome FROM cadastro_usuario";
$sql_calibragem = "SELECT data FROM calibragem"; // A consulta para pegar a data de calibragem
$result_reservatorio = $conn->query($sql_reservatorio);
$result_usuario = $conn->query($sql_usuario);
$result_calibragem = $conn->query($sql_calibragem);

// Fechar a conexão
$conn->close();

// Verifique se há resultados
if ($result_usuario->num_rows > 0 && $result_reservatorio->num_rows > 0 && $result_calibragem->num_rows > 0) {
    // Iterar sobre os resultados de cadastro_usuario
    while($row_usuario = $result_usuario->fetch_assoc()) {
        // Iterar sobre os resultados de calibragem
        while($row_calibragem = $result_calibragem->fetch_assoc()) {
            // Iterar sobre os resultados de cadastro_reservatorio
            while($row_reservatorio = $result_reservatorio->fetch_assoc()) {
                echo "
                <label for='data'>Data:</label><br>
                <input type='date' id='data' name='data' class='data' value='" . htmlspecialchars($row_calibragem['data']) . "' required><br>

                <label for='nome'>Nome do proprietário</label>
                <select id='nome' name='nome' class='nome' required>
                <option value='" . htmlspecialchars($row_usuario['nome']) . "'>" . htmlspecialchars($row_usuario['nome']) . "</option>
                </select>

                <label for='nome_acude'>Nome do reservatório</label>
                <select id='nome_acude' name='nome_acude' class='nome_acude' required>
                <option value='" . htmlspecialchars($row_reservatorio['nome_acude']) . "'>" . htmlspecialchars($row_reservatorio['nome_acude']) . "</option>
                </select>
                ";
            }
        }
    }
} else {
    echo "<p>Nenhum dado encontrado.</p>";
}
?>
