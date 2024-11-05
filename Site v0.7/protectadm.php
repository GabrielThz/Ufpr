<?php 
if (!isset($_SESSION)) {
    session_start();
}

// Certifique-se de que a conexão com o banco de dados já foi feita antes
include('conexao.php'); // Inclua o arquivo de conexão com o banco de dados

// Verifique se a sessão do usuário está configurada
if (!isset($_SESSION['nome']) || !is_array($_SESSION['nome'])) {
    die("Você não pode acessar esta página porque não está logado como administrador. <p><a href=\"../Login/Index.php\"> Entrar como administrador </a></p>");
}

// Acessa as informações do usuário
$usuario = $_SESSION['usuario'];

// Verifica se o usuário tem nível de administrador
if (!isset($usuario['usuario']) || $usuario['usuario'] !== 1) {
    die("Você não pode acessar esta página porque não está logado como administrador. <p><a href=\"../Login/Index.php\"> Entrar como administrador </a></p>");
}

// O resto do seu código para a página aqui
?>
