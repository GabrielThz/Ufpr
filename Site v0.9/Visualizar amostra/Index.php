<?php
// Include configuration file (assuming it contains database details)
include_once('Vamostra.php');
include('../protect.php');
$sql = "SELECT id, nome FROM cadastro_usuario";
$sql = "SELECT data_amostra, id_reservatorio, nome_reservatorio, leitura1, leitura2, leitura3, padrao, concentracao, desvio FROM amostras";

// Execute the query and check for success
$result = $conn->query($sql);
if (!$result) {
    die("Failed to execute query: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Logo.png">
    <title>Amostras</title>
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
echo "<center><h3>Amostras</h3></center>";
?>
<br>

<br>

    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    
                    <th scope="col">DATA</th>
                    <th scope="col">ID RESERVATÓRIO</th>
                    <th scope="col">NOME RESERVATÓRIO</th>
                    <th scope="col">LEITURA1</th>
                    <th scope="col">LEITURA2</th>
                    <th scope="col">LEITURA3</th>
                    <th scope="col">PADRAO</th>
                    <th scope="col">CONCENTRAÇÃO</th>
                    <th scope="col">DESVIO PADRÃO</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
if ($_SESSION['id'] != 1) {
    while($user_data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$user_data['data_amostra']."</td>";
        echo "<td>".$user_data['id_reservatorio']."</td>";
        echo "<td>".$user_data['nome_reservatorio']."</td>";
        echo "<td>".$user_data['leitura1']."</td>";
        echo "<td>".$user_data['leitura2']."</td>";
        echo "<td>".$user_data['leitura3']."</td>";
        echo "<td>".$user_data['padrao']."</td>";
        echo "<td>".$user_data['concentracao']."</td>";
        echo "<td>".$user_data['desvio']."</td>";
        echo "</tr>";
    }
} else {
    while($user_data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$user_data['data_amostra']."</td>";
        echo "<td>".$user_data['id_reservatorio']."</td>";
        echo "<td>".$user_data['nome_reservatorio']."</td>";
        echo "<td>".$user_data['leitura1']."</td>";
        echo "<td>".$user_data['leitura2']."</td>";
        echo "<td>".$user_data['leitura3']."</td>";
        echo "<td>".$user_data['padrao']."</td>";
        echo "<td>".$user_data['concentracao']."</td>";
        echo "<td>".$user_data['desvio']."</td>";
        echo '<td>
            <a href="../Editar calibragem/Index.php?id='.$user_data['nome_reservatorio'].'">
                <img src="edit.png" alt="edit" style="width: 10%; height: 10%;">
            </a>
            <a href="delete.php?id='.$user_data['id_reservatorio'].'" onclick="return confirm(\'Tem certeza que deseja excluir este registro?\')">
                <img src="delete.png" alt="delete" style="width: 10%; height: 10%;">
            </a>
        </td>';
        echo "</tr>";
    }
}

            ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'visualizaramostra.php?search='+search.value;
    }
</script>
</html>