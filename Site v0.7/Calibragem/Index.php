<?php 

$host="localhost";
$user="root";
$password="";
$dbname="dory";

include('../protectadm.php');
try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para unir as tabelas e obter data, nome do proprietário e nome do reservatório
    $sql = "
        SELECT 
            calibragem.data_coleta,
            cadastro_usuario.nome,
            cadastro_reservatorio.nome_acude
        FROM 
            calibragem
        JOIN 
            cadastro_usuario ON calibragem.id_cadastro = cadastro_usuario.id_cadastro
        JOIN 
            cadastro_reservatorio ON cadastro_usuario.id_cadastro = cadastro_reservatorio.nome_acude
        WHERE 
            cadastro_usuario.nome = :nome
    ";

    // Preparar a consulta
    $stmt = $pdo->prepare($sql);

    // Definir o valor do parâmetro (substitua pelo nome do proprietário que deseja buscar)
    $nome_proprietario = 'Nome do Proprietário'; // Exemplo: "João da Silva"
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);

    // Executar a consulta
    $stmt->execute();

    // Obter os resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 catch (PDOException $e) {
    echo "Erro na conexão ou consulta: " . $e->getMessage();
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
                    <li><a href="../Principal/Index.html">Inicio</a></li>
                    <li><a href="../Cadastro reservatório/Index.php">Cadastro reservatório</a></li>
                    <li><a href="../Leitura reservatório//Index.html">Leitura do reservatório</a></li>
                    <li><a href="../Calibragem/Index.php">Calibragem</a></li>
                    <li><a href="../Configurações/Index.html">Configurações/ajuda</a></li>
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
                    <li><a href="../logout.php">Sair</a></li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <main>
        <section class="formulario2">
            <form action="#" method="post">
                <label for="data">Data:</label><br>
                <input type="date" id="data" name="data" required><br>
                <label for="nome">Nome do proprioetário</label>
                <select id="nome" name="nome" class="nome" required>
                    <option value="">Selecione...</option>
                </select>
                <label for="nome_reservatorio">Nome do reservatório</label>
                <select id="nome_reservatorio" name="nome_reservatorio" class="nome_reservatorio" required>
                    <option value="">Selecione...</option>
                </select>

            </form>
            <br><br><br><br>
        </section>
        <section class="formulario">
            <form action="./calibragem.php" method="post">
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
                            <tr>
                                <td>0.1</td>
                                <td><input type="text" name="leitura1_01" id="leitura1_01"></td>
                                <td><input type="text" name="leitura2_01" id="leitura2_01"></td>
                                <td><input type="text" name="leitura3_01" id="leitura3_01"></td>
                            </tr>
                            <tr>
                                <td>0.25</td>
                                <td><input type="text" name="leitura1_025" id="leitura1_025"></td>
                                <td><input type="text" name="leitura2_025" id="leitura2_025"></td>
                                <td><input type="text" name="leitura3_025" id="leitura3_025"></td>
                            </tr>
                            <tr>
                                <td>0.5</td>
                                <td><input type="text" name="leitura1_05" id="leitura1_05"></td>
                                <td><input type="text" name="leitura2_05" id="leitura2_05"></td>
                                <td><input type="text" name="leitura3_05" id="leitura3_05"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><input type="text" name="leitura1_1" id="leitura1_1"></td>
                                <td><input type="text" name="leitura2_1" id="leitura2_1"></td>
                                <td><input type="text" name="leitura3_1" id="leitura3_1"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><input type="text" name="leitura1_2" id="leitura1_2"></td>
                                <td><input type="text" name="leitura2_2" id="leitura2_2"></td>
                                <td><input type="text" name="leitura3_2" id="leitura3_2"></td>
                            </tr>
                            <tr>
                                <td>3.5</td>
                                <td><input type="text" name="leitura1_35" id="leitura1_35"></td>
                                <td><input type="text" name="leitura2_35" id="leitura2_35"></td>
                                <td><input type="text" name="leitura3_35" id="leitura3_35"></td>
                            </tr>
                            <tr>
                                <td>6.5</td>
                                <td><input type="text" name="leitura1_65" id="leitura1_65"></td>
                                <td><input type="text" name="leitura2_65" id="leitura2_65"></td>
                                <td><input type="text" name="leitura3_65" id="leitura3_65"></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td><input type="text" name="leitura1_10" id="leitura1_10"></td>
                                <td><input type="text" name="leitura2_10" id="leitura2_10"></td>
                                <td><input type="text" name="leitura3_10" id="leitura3_10"></td>
                            </tr>
                            <br>
                        </tbody>
                </center>
                </table>
                <input type="submit" value="Cadastrar">
                <div class="btnbk"> <input type="voltar" value="Voltar" onclick="history.back()"></button></div>
                <div class="btncln"> <button type="reset">Limpar</button></div>

        </section>
    </main>

    </form>
    </div>

    <footer>
        <p>&copy; 2024 Seu Nome. Todos os direitos reservados.</p>
    </footer>
    <script>
    // Obtém a data atual
    const dataAtual = new Date();
    
    // Converte para o formato de AAAA-MM-DD, necessário para o input type="date"
    const dia = String(dataAtual.getDate()).padStart(2, '0');
    const mes = String(dataAtual.getMonth() + 1).padStart(2, '0'); // Mês começa do 0
    const ano = dataAtual.getFullYear();

    // Define o valor do campo de data com a data atual
    document.getElementById('data').value = `${ano}-${mes}-${dia}`;
  </script>



</body>

</html>