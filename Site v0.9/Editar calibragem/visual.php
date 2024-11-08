<?php
// Passo 1: Conectar ao Banco de Dados
$servername = "localhost"; // Seu servidor de banco de dados
$username = "root"; // Seu nome de usuário
$password = ""; // Sua senha
$dbname = "dory"; // Nome do seu banco de dados

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Passo 2: Realizar a consulta SQL
$sql = "SELECT * FROM calibragem"; // Substitua `sua_tabela` pelo nome da sua tabela
$result = $conn->query($sql);

// Passo 3: Recuperar os dados
if ($result->num_rows > 0) {
    // Pega a primeira linha de dados (assumindo que há pelo menos uma linha)
    $row = $result->fetch_assoc();
} else {
    echo "Nenhum dado encontrado!";
}

// Passo 4: Exibir os dados no formulário
echo "
    <table>
        <tr>
            <td>0.1</td>
            <td><input type='text' name='leitura1_01' value='" . htmlspecialchars($row['leitura1_01']) . "'></td>
            <td><input type='text' name='leitura2_01' value='" . htmlspecialchars($row['leitura2_01']) . "'></td>
            <td><input type='text' name='leitura3_01' value='" . htmlspecialchars($row['leitura3_01']) . "'></td>
        </tr>
        <tr>
            <td>0.25</td>
            <td><input type='text' name='leitura1_025' value='" . htmlspecialchars($row['leitura1_025']) . "'></td>
            <td><input type='text' name='leitura2_025' value='" . htmlspecialchars($row['leitura2_025']) . "'></td>
            <td><input type='text' name='leitura3_025' value='" . htmlspecialchars($row['leitura3_025']) . "'></td>
        </tr>
        <tr>
            <td>0.5</td>
            <td><input type='text' name='leitura1_05' value='" . htmlspecialchars($row['leitura1_05']) . "'></td>
            <td><input type='text' name='leitura2_05' value='" . htmlspecialchars($row['leitura2_05']) . "'></td>
            <td><input type='text' name='leitura3_05' value='" . htmlspecialchars($row['leitura3_05']) . "'></td>
        </tr>
        <tr>
            <td>1</td>
            <td><input type='text' name='leitura1_1' value='" . htmlspecialchars($row['leitura1_1']) . "'></td>
            <td><input type='text' name='leitura2_1' value='" . htmlspecialchars($row['leitura2_1']) . "'></td>
            <td><input type='text' name='leitura3_1' value='" . htmlspecialchars($row['leitura3_1']) . "'></td>
        </tr>
        <tr>
            <td>2</td>
            <td><input type='text' name='leitura1_2' value='" . htmlspecialchars($row['leitura1_2']) . "'></td>
            <td><input type='text' name='leitura2_2' value='" . htmlspecialchars($row['leitura2_2']) . "'></td>
            <td><input type='text' name='leitura3_2' value='" . htmlspecialchars($row['leitura3_2']) . "'></td>
        </tr>
        <tr>
            <td>3.5</td>
            <td><input type='text' name='leitura1_35' value='" . htmlspecialchars($row['leitura1_35']) . "'></td>
            <td><input type='text' name='leitura2_35' value='" . htmlspecialchars($row['leitura2_35']) . "'></td>
            <td><input type='text' name='leitura3_35' value='" . htmlspecialchars($row['leitura3_35']) . "'></td>
        </tr>
        <tr>
            <td>6.5</td>
            <td><input type='text' name='leitura1_65' value='" . htmlspecialchars($row['leitura1_65']) . "'></td>
            <td><input type='text' name='leitura2_65' value='" . htmlspecialchars($row['leitura2_65']) . "'></td>
            <td><input type='text' name='leitura3_65' value='" . htmlspecialchars($row['leitura3_65']) . "'></td>
        </tr>
        <tr>
            <td>10</td>
            <td><input type='text' name='leitura1_10' value='" . htmlspecialchars($row['leitura1_10']) . "'></td>
            <td><input type='text' name='leitura2_10' value='" . htmlspecialchars($row['leitura2_10']) . "'></td>
            <td><input type='text' name='leitura3_10' value='" . htmlspecialchars($row['leitura3_10']) . "'></td>
        </tr>
    </table>
";

// Fechar a conexão com o banco de dados
$conn->close();
?>
