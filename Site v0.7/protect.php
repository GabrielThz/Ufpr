<?php 
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['nome'])) { 
    die("Você não pode acessar está pagina porque não está logado. <p><a href=\"../Login/Index.php\"> Entrar </a></p>");
}
?>
