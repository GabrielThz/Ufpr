<?php 
include('Principal.php');
include('../protect.php');

$sql = "SELECT id_reservatorio, numero_acude, nome, nome_acude, data_coleta, especies, quantidade, tamanho_medio, observacoes, img FROM cadastro_reservatorio";
$result = $conn->query($sql);
if (!$result) {
    die("Failed to execute query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Visualizar Calibragem</title>
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

<?php
echo "<center><h3>Reservatórios</h3></center>";
?>
<div>
    <?php
if (!isset($_SESSION['id'])) {
    // Redirect to a login page or show an error
    echo "Access Denied. Please log in.";
} else {
    if ($result->num_rows > 0) {
        // Loop through each record
        while ($row = $result->fetch_assoc()) {
            echo '<form>';
            echo '<p class="card-title"><strong>Açude Nº:</strong> ' . $row['numero_acude'] . '</p>';
            echo '<p class="card-title"><strong>Nome do proprietário:</strong> ' . $row['nome'] . '</p>';
            echo '<p class="card-subtitle mb-2"><strong>Nome reservatório:</strong> ' . $row['nome_acude'] . '</p>';
            echo '<p class="card-text"><strong>Data de Coleta:</strong> ' . $row['data_coleta'] . '</p>';
            echo '<p class="card-text"><strong>Espécies:</strong> ' . $row['especies'] . '</p>';
            echo '<p class="card-text"><strong>Quantidade:</strong> ' . $row['quantidade'] . '</p>';
            echo '<p class="card-text"><strong>Tamanho Médio:</strong> ' . $row['tamanho_medio'] . '</p>';
            echo '<p class="card-text"><strong>Observações:</strong> ' . $row['observacoes'] . '</p>';
            echo '<p class="card-text"><strong>Imagem:</strong></p><br>';
            echo $row["img"];
            echo '<br>';

            // Display edit and delete buttons only for certain users
            if ($_SESSION['id'] == 1) {
                echo '
                <a href="../Editar reservatorio/Index.php?id=' . $row['nome_acude'] . '">
                <img src="edit.png" alt="edit" style="width: 10%; height: 10%;"></a>
                <a href="delete.php?id_reservatorio=' . $row['id_reservatorio'] . '" onclick="return confirm(\'Tem certeza que deseja excluir este registro?\')">
                <img src="delete.png" alt="delete" style="width: 10%; height: 10%;"></a>';
            }
            echo '</form><br>';
        }
    } else {
        echo "No records found.";
    }
}
            echo '</div>';
            echo '</form>';
            echo '<br>';
    ?>
</div>

</body>
</html>
