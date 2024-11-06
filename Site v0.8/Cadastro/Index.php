

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Logo.png">
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LcyUVYqAAAAAApi7zRShidZs83kcJt5PSmzDlwN"></script>
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


        <h2>Cadastro de Cliente</h2>
        <form action="./cadastro.php" method="POST">

            <label for="nome">Nome de Usuário:</label><br>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="email">E-mail:</label><br>
            <input type="text" id="email" name="email" required><br><br>

            <div id="switcherCPF" style="
    background-color: #025373;
    width: 6%;
    height: 1.7rem;
    text-align: center;
    top: 32.6%;
    border-radius: 0.313rem;
    color: #fff;
    display:grid;
    align-content:space-around;
    left: 63.5%;
    position: absolute;
    z-index: 1;
">
               <div>
               <input class="switch" id="switcherButton" type="hidden">CPF:</input>
                <br><br>
               </div>
            </div>
            <div id="cpfText" style="margin-top: -8%;">
            </div>
            <br>
            <div id="dynamic-group">
                <label for="CPF">CPF:</label><br>
                <input type="text" name="cpf" class="form-control cpf" id="document" placeholder="xxx.xxx.xxx-xx" data-id="cpf" oninput="this.value = mascaraCPF(this.value)" maxlength="14">
                <input type="hidden" id="company_type" name="company_type" value="person" required>
            </div><br>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required><br>
            <br>
            <label for="confirmar_senha">Confirmar Senha:</label><br>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required><br>
            <br><br>
            <input type="submit" value="Cadastrar">
            <div class="btn"> <input type="voltar" value="Voltar" onclick="history.back()"></button></div>
            <div class="btn"> <button type="reset">Limpar</button></div>
        </form>
    </div>
    <script>
        function validateCPF($cpf) {
            $cpf = preg_replace('/\D/', '', $cpf);
            if (strlen($cpf) != 11) return false;
            $sum = 0;
            for ($i = 0; $i < 9; $i++) {
                $sum += $cpf[$i] * (10 - $i);
            }
            $rest = ($sum * 10) % 11;
            $rest = ($rest == 10 || $rest == 11) ? 0 : $rest;
            if ($rest != $cpf[9]) return false;
            $sum = 0;
            for ($i = 0; $i < 10; $i++) {
                $sum += $cpf[$i] * (11 - $i);
            }
            $rest = ($sum * 10) % 11;
            $rest = ($rest == 10 || $rest == 11) ? 0 : $rest;
            if ($rest != $cpf[10]) return false;
            return true;
        }
    </script>
    <script>
        const switcher = document.getElementById('switcherCPF')
        const switcherButton = document.getElementById('switcherButton')
        let activeSwitcher = false;

        switcher.addEventListener('click', () => {
            if (!activeSwitcher) {
                switcherButton.classList.add('activated')
                document.getElementById('dynamic-group').innerHTML = `<label for="RS">Razão social:</label><input type="text" name="nome_empresa"  class="form-control" id="nome_empresa"><small id="error_company_name" class="text-danger"></small> <label for="cnpj">CNPJ:</label><input type="text" placeholder="xx.xxx.xxx/xxxx-xx" name="document" class="form-control cnpj" id="document"
        data-id="cnpj" oninput="this.value = mascaraCNPJ(this.value)"  maxlength="18"><input type="hidden" id="cnpj" name="cnpj" value="company"/>`
                activeSwitcher = true
                document.getElementById('switcherCPF').innerHTML = `<input class="switch" id="switcherButton" type="hidden">CNPJ:</input><br>`
            } else {
                switcherButton.classList.remove('activated')
                document.getElementById('dynamic-group').innerHTML = `<label for="CPF">CPF:</label><input type="text" name="document" placeholder="xxx.xxx.xxx-xx" class="form-control cpf" id="document"
        data-id="cpf" oninput="this.value = mascaraCPF(this.value)"  maxlength="14"><input type="hidden"  id="company_type" name="company_type" value="person"/>`
                activeSwitcher = false
                document.getElementById('switcherCPF').innerHTML = `<input class="switch" id="switcherButton" type="hidden">CPF:</input><br>`
            }
        })
        if ($documentInput.hasClass('cpf')) {
            $documentInput.mask('999.999.999-99');
        } else {
            $documentInput.mask('99.999.999/9999-99');
        }
        // Aplicar a máscara inicial (CPF por padrão)
        $('#document').mask('999.999.999-99');
    </script>
    <script>
        function mascaraCPF(cpf) {
            cpf = cpf.replace(/\D/g, ''); // Remove tudo o que não é dígito
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca um ponto após o terceiro dígito
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca um ponto após o sexto dígito
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Coloca um hífen após o nono dígito
            return cpf;
        }
    </script>
    <script>
        function mascaraCNPJ(cnpj) {
            cnpj = cnpj.replace(/\D/g, '');
            cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2');
            cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2');
            cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2');
            return cnpj;
        }
    </script>

</body>

</html>