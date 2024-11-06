<?php
$host="localhost";
$user="root";
$password="";
$dbname="dory";

$mysqli = new mysqli($host, $user, $password, $dbname);
if (isset($_POST['email'])) {

   $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
   $email = password_hash($_POST['email'], PASSWORD_DEFAULT);
   $cpf = isset($_POST['cpf']) && $_POST['cpf'] !== '' ? password_hash($_POST['cpf'], PASSWORD_DEFAULT) : null;
   $nome_empresa = isset($_POST['nome_empresa']) && $_POST['nome_empresa'] !== '' ? password_hash($_POST['nome_empresa'], PASSWORD_DEFAULT) : null;
   $cnpj = isset($_POST['cnpj']) && $_POST['cnpj'] !== '' ? password_hash($_POST['cnpj'], PASSWORD_DEFAULT) : null;
     $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    

  $stmt = $mysqli->prepare("INSERT INTO cadastro_usuario (nome, email, cpf, nome_empresa, cnpj, senha) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
     die("Erro na preparação do statement: " . $mysqli->error);
    }

    if (!$stmt->bind_param("ssssss", $nome, $email, $cpf, $nome_empresa, $cnpj, $senha)) {
     die("Erro ao associar parâmetros: " . $stmt->error);
     }
    

    if ($stmt->execute()) {
        header("Location: ../Login/Index.php");
        echo ("Cadastrado com sucesso:");
    } else {
   echo "Erro ao cadastrar usuário: " . $stmt->error;
   }
    
   $stmt->close();
    }
    ?>

