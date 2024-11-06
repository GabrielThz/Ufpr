<?php
include('Principal.php');
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dory</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Logo.png">
</head>

<body>
    <div class="bode">
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
        <img src="Backgroud.png" class="baqui">
        <img src="logo.png" class="logcent">
        <form class="sobrea">
            <h2>Sobre nós:</h2>
            <h4>Dory é um projeto colaborativo entre os estudantes da <br>
                UFPR e os estudantes do colegio Padre Carmelo Perrone <br>
                para facilitar a manutenção de reservatorios e açudes <br>
                quantificando os tipos de residuos produzidos dentro <br>
                do mesmo.
            </h4>
        </form>
    </div>
</body>

</html>