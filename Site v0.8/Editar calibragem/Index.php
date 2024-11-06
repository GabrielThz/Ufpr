<?php 
include('./calibragem.php');
include('../protectadm.php');

?>


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
    </header>
    <main>
        <section class="formulario2">
            <form action="./calibragem.php" method="post">
                <fieldset>
               <?php
                include('./acude.php');
                ?>                



                </select>

                </fieldset>
            <br><br><br><br>
        </section>
        <section class="formulario">
            <fieldset>
                <center>
                    <table>
                        <thead>
                            <tr>
                                <th>Parâmetros (mg/L)</th>
                                <th>Leitura 1</th>
                                <th>Leitura 2</th>
                                <th>Leitura 3</th>
                            </tr>
                        </thead>
                        <tbody>
<?php include('./visual.php'); ?>
                            <br>
                        </tbody>
                </center>
                </table>
                <input type="submit" value="Cadastrar">
                <div class="btnbk"> <input type="voltar" value="Voltar" onclick="history.back()"></button></div>
                <div class="btncln"> <button type="reset">Limpar</button></div>

        </section>
    </main>
    </fieldset>
    </form>
    </div>

    <footer>
        <p>&copy; 2024 Seu Nome. Todos os direitos reservados.</p>
    </footer>
    


</body>

</html>