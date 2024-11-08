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
$sql_usuario = "SELECT nome FROM cadastro_reservatorio";
// Passo 2: Realizar a consulta SQL
$sql = "SELECT * FROM cadastro_reservatorio"; // Substitua `cadastro_reservatorio` pelo nome da sua tabela
$result = $conn->query($sql);

// Passo 3: Recuperar os dados
if ($result->num_rows > 0) {
    // Pega a primeira linha de dados
    $row = $result->fetch_assoc();
} else {
    echo "Nenhum dado encontrado!";
    exit;
}

echo '<form action="./update.php" method="POST">
        <h3>Identificação do Reservatório</h3>';
        
        echo '<label for="nome">Nome do proprietário:</label>
        <select id="nome" name="nome" class="nome" required style="
            width: 100%;
            padding: 0.625rem;
            margin-top: 0.313rem;
            margin-bottom: 0.625rem;
            border: 0.063rem solid #1D77a0;
            border-radius: 0.313rem;
            box-sizing: border-box;">
            ';
            echo "<option class='nome'>" . $row["nome"] . "</option>";
        echo'</select>';
echo '    
        <label for="numero_acude">Numero do Açude:</label>
        <input type="number" id="numero_acude" name="numero_acude" min="1" value="' . $row['numero_acude'] . '" required><br>

        <label for="nome_acude">Nome do Açude:</label>
        <input type="text" id="nome_acude" name="nome_acude" value="' . $row['nome_acude'] . '" required>

        <label for="data_coleta">Data de Coleta:</label>
        <input type="date" id="data_coleta" name="data_coleta" value="' . $row['data_coleta'] . '" required>

        <h3>População de Peixes</h3>

        <label for="especies">Espécies de Peixes:</label>
        <input type="text" id="especies" name="especies" value="' . $row['especies'] . '" required>

        <label for="quantidade">Quantidade de Peixes:</label><br>
        <input type="number" id="quantidade" name="quantidade" min="0" value="' . $row['quantidade'] . '" required><br>

        <label for="tamanho_medio">Tamanho Médio de Peixes (cm):</label><br>
        <input type="number" id="tamanho_medio" name="tamanho_medio" min="0" value="' . $row['tamanho_medio'] . '" required><br>

        <label for="img">Escolha uma imagem:</label><br>
        <input type="file" name="img" id="img"><br>

        <label for="observacoes">Observações:</label><br>
        <textarea id="observacoes" name="observacoes" style="
            width: 100%;
            padding: 0.625rem;
            margin-top: 0.313rem;
            margin-bottom: 0.625rem;
            border: 0.063rem solid #1D77a0;
            border-radius: 0.313rem;
            box-sizing: border-box;">' . $row['observacoes'] . '</textarea><br>
            <input type="submit" value="Editar">
        <div class="btnbk"> <input type="voltar" value="Voltar" onclick="history.back()"></button></div>
        <div class="btncln"> <button type="reset">Limpar</button></div>

            </form>';
        
$conn->close();
?>
