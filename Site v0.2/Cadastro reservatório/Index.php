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
                    <li><a href="../Principal/Index.html">Inicio</a></li>
                    <li><a href="../Cadastro reservatório/Index.html">Cadastro reservatório</a></li>
                    <li><a href="../Leitura reservatório//Index.html">Leitura do reservatório</a></li>
                    <li><a href="../Calibragem/Index.html">Calibragem</a></li>
                    <li><a href="../Configurações/Index.html">Configurações/ajuda</a></li>
                </ul>
            </div>
        </div>
        <div class="profile">
            <img src="imguser.png" alt="Profile Picture">
            <div class="options">
                <ul>
                    <li><a href="../Cadastro/Index.html">Cadastrar</a></li>
                    <li><a href="../Login/Index.html">Entrar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div>

        <h2>Cadastro do Reservátorio de Peixes</h2>
        <form action="./cadastro_reservatorio.php" method="POST">
            <h3>Identificação do Reservatório</h3>
            <label for="numero_acude">Numero do Açude:</label>
            <input type="text" id="numero_acude" name="numero_acude" required>
            <label for="nome_acude">Nome do Açude:</label>
            <input type="text" id="nome_acude" name="nome_acude" required>
            <label for="localizacao">Localização:</label>
            <input type="text" id="localizacao" name="localizacao" required>
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
            <input type="submit" value="Cadastrar">
            <div class="btnbk"> <input type="voltar" value="Voltar" onclick="history.back()"></button></div>
            <div class="btncln"> <button type="reset">Limpar</button></div>

        </form>
    </div>

    <footer>
        <p>&copy; 2024 Seu Nome. Todos os direitos reservados.</p>
    </footer>


    <script>
        const usuarioSelect = document.querySelector('#usuario');

        usuarioSelect.addEventListener('change', () => {
        });

    </script>


</body>

</html>