<?php
$host="localhost";
$user="root";
$password="";
$dbname="dory";

$conn = new mysqli($host, $user, $password, $dbname);


$leitura1_01 = $_POST['leitura1_01'];
$leitura2_01 = $_POST['leitura2_01'];
$leitura3_01 = $_POST['leitura3_01'];

$leitura1_025 = $_POST['leitura1_025'];
$leitura2_025 = $_POST['leitura2_025'];
$leitura3_025 = $_POST['leitura3_025'];

$leitura1_05 = $_POST['leitura1_05'];
$leitura2_05 = $_POST['leitura2_05'];
$leitura3_05 = $_POST['leitura3_05'];

$leitura1_1 = $_POST['leitura1_1'];
$leitura2_1 = $_POST['leitura2_1'];
$leitura3_1 = $_POST['leitura3_1'];

$leitura1_2 = $_POST['leitura1_2'];
$leitura2_2 = $_POST['leitura2_2'];
$leitura3_2 = $_POST['leitura3_2'];

$leitura1_35 = $_POST['leitura1_35'];
$leitura2_35 = $_POST['leitura2_35'];
$leitura3_35 = $_POST['leitura3_35'];

$leitura1_65 = $_POST['leitura1_65'];
$leitura2_65 = $_POST['leitura2_65'];
$leitura3_65 = $_POST['leitura3_65'];

$leitura1_10 = $_POST['leitura1_10'];
$leitura2_10 = $_POST['leitura2_10'];
$leitura3_10 = $_POST['leitura3_10'];


$sql = "INSERT INTO 
calibragem (leitura1_01, leitura2_01, leitura3_01, 
leitura1_025, leitura2_025, leitura3_025, 
leitura1_05, leitura2_05 ,leitura3_05, 
leitura1_1, leitura2_1 ,leitura3_1, 
leitura1_2, leitura2_2, leitura3_2,
 leitura1_35, leitura2_35, leitura3_35, 
 leitura1_65, leitura2_65, leitura3_65, 
 leitura1_10, leitura2_10, leitura3_10) 
VALUES ('$leitura1_01', '$leitura2_01', '$leitura3_01', 
'$leitura1_025', '$leitura2_025', '$leitura3_025', 
'$leitura1_05', '$leitura2_05', '$leitura3_05',
 '$leitura1_1', '$leitura2_1', '$leitura3_1', 
 '$leitura1_2', '$leitura2_2', '$leitura3_2',
  '$leitura1_35', '$leitura2_35', '$leitura3_35', 
  '$leitura1_65', '$leitura2_65', '$leitura3_65', 
  '$leitura1_10', '$leitura2_10', '$leitura3_10')";

if(mysqli_query($conn, $sql)) {
    header("Location: index.php?mensagem=Cadastro realizado com sucesso!");
}else{
    echo "Algo deu errado" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>