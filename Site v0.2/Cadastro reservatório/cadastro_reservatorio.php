<?php
$host="localhost";
$user="root";
$password="";
$dbname="dori";

$conn = new mysqli($host, $user, $password, $dbname);

$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$nome_propriedade = $_POST['nome_propriedade'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];
$usuario = $_POST['usuario'];

$sql = "INSERT INTO cadastro_usuario (nome, data_nascimento, nome_propriedade, endereco, senha, usuario) VALUES ('$nome', '$data_nascimento', '$nome_propriedade', '$endereco', '$senha', '$usuario')";


if(mysqli_query($conn, $sql)) {
    echo "<script>document.getElementById('modal').style.display = 'block';</script>";
}else{
    echo "Algo deu errado" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>