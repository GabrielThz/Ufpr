<?php
include('../protectadm.php');
include('cadastro_reservatorio.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de reservatório</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Logo.png">
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <img src="Logo.png">
            <div class="menu1">
                <ul>
                    <?php
                    // Código PHP para gerar o menu
                    if ($_SESSION['id'] != 1) {
                        echo '<li><a href="../Principal/Index.php">Inicio</a></li>
                        <li><a href="../Visualizar calibragem/Index.php">Visualizar Calibragem</a></li>
                        <li><a href="../Visualizar reservatório/Index.php">Visualizar Reservatórios</a></li>';
                    } else {
                        echo ' <li><a href="../Principal/Index.php">Inicio</a></li>
                    <li><a href="../Cadastro reservatório/Index.php">Cadastro reservatório.</a></li>
                    <li><a href="../Leitura reservatório/Index.php">Leitura do reservatório</a></li>
                    <li><a href="../Calibragem/Index.php">Calibragem</a></li>
                    <li><a href="../Visualizar calibragem/Index.php">Visualizar Calibragem</a></li>
                    <li><a href="../Visualizar reservatório/Index.php">Visualizar Reservatórios</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="profile">
            <img src="imguser.png" alt="Profile Picture">
            <div class="options">
                <ul>
                    <?php if (!isset($_SESSION['nome'])): ?>
                        <li><a href="../Cadastro/Index.php">Cadastrar</a></li>
                        <li><a href="../Login/Index.php">Entrar</a></li>
                    <?php else: ?>
                        <li style="width: max-content; color: white;">
                            <?php echo "Olá, {$_SESSION['nome']}"; ?></li>
                        <li><a href="../logout.php">Sair</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    </nav>

    <div>
        <h2>Cadastro do Reservátorio de Peixes</h2>
        <form action="./cadastro_reservatorio.php" method="POST">
                <h3>Identificação do Reservatório</h3>
                <label for="nome">Nome do proprietário:</label>
            <select id="nome" name="nome" class="nome" required style="
                width: 100%;
                padding: 0.625rem;
                margin-top: 0.313rem;
                margin-bottom: 0.625rem;
                border: 0.063rem solid #1D77a0;
                border-radius: 0.313rem;
                box-sizing: border-box;">
                <br>
                <?php
                include('./usuario.php');
                ?>
                </select>
                <br>
                <label for="numero_acude">Numero do Açude:</label>
                <input type="number" id="numero_acude" name="numero_acude" min="1" placeholder="1" required><br>
                <label for="nome_acude">Nome do Açude:</label>
                <input type="text" id="nome_acude" name="nome_acude" required>
                <label for="data_coleta">Data de Coleta:</label>
                <input type="date" id="data_coleta" name="data_coleta" required>
                <h3>População de Peixes</h3>
                <label for="especies">Espécies de Peixes:</label>
                <input type="text" id="especies" name="especies" required>
                <label for="quantidade">Quantidade de Peixes:</label>
                <br>
                <input type="number" id="quantidade" name="quantidade" min="0" placeholder="0" required>
                <br>
                <label for="tamanho_medio">Tamanho Médio de Peixes (cm):</label>
                <br>
                <input type="number" id="tamanho_medio" name="tamanho_medio" min="0" placeholder="0" required>
                <br>
                <label for="img">Escolha uma imagem:</label>
                <br>
                <input type="file" name="img" id="img">
                <br>
                <label for="observacoes">Observações:</label>
                <br>
                <textarea id="observacoes" name="observacoes" placeholder="Digite sua observações"
                    style="    width: 100%;
            padding: 0.625rem;
            margin-top: 0.313rem;
            margin-bottom: 0.625rem;
            border: 0.063rem solid #1D77a0;
            border-radius: 0.313rem;
            box-sizing: border-box;">
            </textarea>
                <br>
                <input type="submit" value="Cadastrar">
                <div class="btnbk"> <input type="voltar" value="Voltar" onclick="history.back()"></button></div>
                <div class="btncln"> <button type="reset">Limpar</button></div>

        </form>
    </div>
    <script>
        // Obtém a data atual
        const dataAtual = new Date();

        // Converte para o formato de AAAA-MM-DD, necessário para o input type="date"
        const dia = String(dataAtual.getDate()).padStart(2, '0');
        const mes = String(dataAtual.getMonth() + 1).padStart(2, '0'); // Mês começa do 0
        const ano = dataAtual.getFullYear();

        // Define o valor do campo de data com a data atual
        document.getElementById('data_coleta').value = `${ano}-${mes}-${dia}`;
    </script>
</body>

</html>