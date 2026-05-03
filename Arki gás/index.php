<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "gas";

$connect = new mysqli($servername, $username, $password, $dbname);

if ($connect->connect_error) {
    die("Falha na conexão: " . $connect->connect_error);
}
?>
