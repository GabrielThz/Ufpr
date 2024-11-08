<?php
include('../protectadm.php');
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dory";

$mysqli = new mysqli($host, $user, $password, $dbname);

if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados");
}
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
    </header>

            <div>
                    <h2>Cadastro do Reservatório de Peixes</h2>
                    <?php include('./visual.php'); ?>
            </div>
            <br>
            </tbody>

        </table>

    </main>
    </fieldset>
    </form>
    </div>

    <footer>
        <p>&copy; 2024 Seu Nome. Todos os direitos reservados.</p>
    </footer>



</body>

</html>