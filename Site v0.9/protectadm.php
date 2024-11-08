<?php
if (!isset($_SESSION)) {
    session_start();

    // Verificar se o usuário está logado
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
        exit;
    }
    
    // Verificar se o usuário tem permissão de acesso
    if ($_SESSION['id'] != 1) {
        echo('Você não tem permissão para acessar essa pagina, entre como administrador!');
        exit;
    }
}
?>