<?php
include('Login.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    $email = $_POST['email']; // Sem necessidade de escapar, pois será verificado com password_verify
    $senha = $_POST['senha'];
    $id = $_POST['id'];

    // Busca o usuário no banco para obter o hash do e-mail e da senha armazenados
    $sql_code = "SELECT * FROM cadastro_usuario";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $usuario_encontrado = false;

    // Verifica cada usuário no banco para comparar o e-mail e senha
    while ($cadastro_usuario = $sql_query->fetch_assoc()) {
        // Verifica o e-mail e senha fornecidos com os hashes armazenados
        if (password_verify($email, $cadastro_usuario['email']) && password_verify($senha, $cadastro_usuario['senha'])) {
            $usuario_encontrado = true;

            // Inicia a sessão, se não estiver iniciada
            if (!isset($_SESSION)) {
                session_start();
            }

            // Define as informações de sessão
            $_SESSION['nome'] = $cadastro_usuario["nome"];
            $_SESSION['usuario'] = $cadastro_usuario["usuario"];
            $_SESSION['id'] = $cadastro_usuario["id"];

            // Redireciona para a página inicial
            header("Location: Index.php");
            exit;
        }
    }

    // Caso nenhum usuário seja encontrado
    if (!$usuario_encontrado) {
        echo "Falha ao logar! E-mail ou senha incorretos";
    }
}
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                        echo '<li><a href="../Principal/Index.php">Inicio</a></li>';
                    } else {
                        echo ' <li><a href="../Principal/Index.php">Inicio</a></li>
                    <li><a href="../Cadastro reservatório/Index.php">Cadastro reservatório.</a></li>
                    <li><a href="../Leitura reservatório/Index.php">Leitura do reservatório</a></li>
                    <li><a href="../Calibragem/Index.php">Calibragem</a></li>
                    <li><a href="../Visualizar calibragem/Index.php">Visualizar Calibragem</a></li>';
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
                        <li><a href="#">Entrar</a></li>
                    <?php else: ?>
                        <li style="
    width: max-content;"> <?php echo "Olá, {$_SESSION['nome']}"; ?></li>
                        <li><a href="../logout.php">Sair</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="formulario">

        <h2>Entrar</h2>
        <form action="Index.php" method="POST">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <br>
            <input type="submit" value="Entrar">
            <div class="btnbk"> <input type="voltar" value="Voltar" onclick="history.back()"></button></div>
            <div class="btncln"> <button type="reset">Limpar</button></div>
            <br>
            <div class="forgot">
                <center>
                    <a href="../Cadastro/Index.php">Ainda não possui uma conta? Cadastrar-se.</a>
                    <br>
                    <a href="#">Esqueceu a senha?</a>
                </center>
            </div>
        </form>
    </div>
    </div>

    <footer>
        <p>&copy; 2024 Seu Nome. Todos os direitos reservados.</p>
    </footer>
</body>

</html>