<?php
$host="localhost";
$user="root";
$password="";
$dbname="dory";

$mysqli = new mysqli($host, $user, $password, $dbname);

if($mysqli->error) { 
    die("Falha ao conectar ao banco de dados");
} 

?>