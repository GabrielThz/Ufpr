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
                <label for="data">Data:</label><br>
                <input type="date" id="data" name="data" class="data" required><br>
                <label for="nome">Nome do proprietário</label>
                <select id="nome" name="nome" class="nome" required>
                <?php 
                    include('./usuario.php');
                ?> 
                <option value="">Selecione...</option>\
                </select>
                <label for="nome_acude">Nome do reservatório</label>
                <select id="nome_acude" name="nome_acude" class="nome_acude" required>
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
    </fieldset>
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