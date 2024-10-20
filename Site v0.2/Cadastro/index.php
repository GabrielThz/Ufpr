

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
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
                    <li><a href="Index.html">Cadastrar</a></li>
                    <li><a href="../Login/Index.html">Entrar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="formulario">


        <h2>Cadastro de Cliente</h2>
        <form action="./cadastro.php" method="POST">

            <label for="nome">Nome de Usuário:</label><br>
            <input type="text" id="nome" name="nome" required><br>

            <label for="data_nascimento">Data de Nascimento:</label><br>
            <input type="date" id="data_nascimento" name="data_nascimento" required><br>

            <label for="nome_propriedade">Nome da Propriedade:</label><br>
            <input type="text" id="nome_propriedade" name="nome_propriedade" required><br>

            <label for="endereco">Endereço:</label><br>
            <input type="text" id="endereco" name="endereco" required>

            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required><br>

            <label for="confirmar_senha">Confirmar Senha:</label><br>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required><br>

            <label for="usuario">Tipo de usuário:</label>
            <select id="usuario" name="usuario" class="usuario">
                <option value="">Selecione...</option>
                <option value="administrador">Administrador</option>
                <option value="usuario">Usuário normal</option>
            </select>

            <br>
            <input type="submit" value="Cadastrar">
            <div class="btnbk"> <input type="voltar" value="Voltar" onclick="history.back()"></button></div>
            <div class="btncln"> <button type="reset">Limpar</button></div>

        </form>
    </div>
    <footer>
        <p>&copy; 2024 Seu Nome. Todos os direitos reservados.</p>
    </footer>

</body>

</html>