<?php   
if(!isset($_SESSION)){
    session_start();
}
session_Destroy();
header("location: ./Login/Index.php")
?>