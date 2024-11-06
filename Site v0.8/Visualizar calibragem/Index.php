<?php 
include('Principal.php');
include('../protectadm.php');

// Establish your database connection here
// Example:
// $conn = new mysqli("hostname", "username", "password", "database");
$sql = "SELECT id, nome, nome_acude, data, leitura1_01, leitura2_01, leitura3_01, 
leitura1_025, leitura2_025, leitura3_025, 
leitura1_05, leitura2_05 ,leitura3_05, 
leitura1_1, leitura2_1 ,leitura3_1, 
leitura1_2, leitura2_2, leitura3_2,
leitura1_35, leitura2_35, leitura3_35, 
leitura1_65, leitura2_65, leitura3_65, 
leitura1_10, leitura2_10, leitura3_10 FROM calibragem";


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <li style="width: max-content; color: white;"> 
                            <?php echo "Olá, {$_SESSION['nome']}"; ?></li>
                        <li><a href="../logout.php">Sair</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

<?php
echo "<center><h1>CALIBRAGEM</h1></center>";
?>

<br>


<div class="m-5">
    <table class="table text-white table-bg">
        <thead>
            <tr>
                    <th scope="col">PROPRIETARIO</th>
                    <th scope="col">RESERVATÓRIO</th>
                    <th scope="col">DATA</th>
                    <th scope="col">L1_1</th>
                    <th scope="col">L1_2</th>
                    <th scope="col">L1_3</th>
                    <th scope="col">L2_1</th>
                    <th scope="col">L2_2</th>
                    <th scope="col">L2_3</th>
                    <th scope="col">L3_1</th>
                    <th scope="col">L3_2</th>
                    <th scope="col">L3_3</th>
                    <th scope="col">L4_1</th>
                    <th scope="col">L4_2</th>
                    <th scope="col">L4_3</th>
                    <th scope="col">L5_1</th>
                    <th scope="col">L5_2</th>
                    <th scope="col">L5_3</th>
                    <th scope="col">L6_1</th>
                    <th scope="col">L6_2</th>
                    <th scope="col">L6_3</th>
                    <th scope="col">L7_1</th>
                    <th scope="col">L7_2</th>
                    <th scope="col">L7_3</th>
                    <th scope="col">L8_1</th>
                    <th scope="col">L8_2</th>
                    <th scope="col">L8_3</th>
                    <th scope="col">...</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$user_data['nome']."</td>";
                    echo "<td>".$user_data['nome_acude']."</td>";
                    echo "<td>".$user_data['data']."</td>";
                    echo "<td>".$user_data['leitura1_01']."</td>";
                    echo "<td>".$user_data['leitura2_01']."</td>";
                    echo "<td>".$user_data['leitura3_01']."</td>";
                    echo "<td>".$user_data['leitura1_025']."</td>";
                    echo "<td>".$user_data['leitura2_025']."</td>";
                    echo "<td>".$user_data['leitura3_025']."</td>";
                    echo "<td>".$user_data['leitura1_05']."</td>";
                    echo "<td>".$user_data['leitura2_05']."</td>";
                    echo "<td>".$user_data['leitura3_05']."</td>";
                    echo "<td>".$user_data['leitura1_1']."</td>";
                    echo "<td>".$user_data['leitura2_1']."</td>";
                    echo "<td>".$user_data['leitura3_1']."</td>";
                    echo "<td>".$user_data['leitura1_2']."</td>";
                    echo "<td>".$user_data['leitura2_2']."</td>";
                    echo "<td>".$user_data['leitura3_2']."</td>";
                    echo "<td>".$user_data['leitura1_35']."</td>";
                    echo "<td>".$user_data['leitura2_35']."</td>";
                    echo "<td>".$user_data['leitura3_35']."</td>";
                    echo "<td>".$user_data['leitura1_65']."</td>";
                    echo "<td>".$user_data['leitura2_65']."</td>";
                    echo "<td>".$user_data['leitura3_65']."</td>";
                    echo "<td>".$user_data['leitura1_10']."</td>";
                    echo "<td>".$user_data['leitura2_10']."</td>";
                    echo "<td>".$user_data['leitura3_10']."</td>";
                    echo '<td>
                    <a href="../Editar calibragem/Index.php?id='.$user_data['nome'].'">
                        <img src="edit.png" alt="edit" style="width: 10%; height: 10%;">
                    </a>
 <a href="delete.php?id='.$user_data['id'].'" onclick="return confirm(\'Tem certeza que deseja excluir este registro?\')">
                <img src="delete.png" alt="delete" style="width: 10%; height: 10%;">
            </a>
                  </td>';
            echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

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
</body>
</html>
