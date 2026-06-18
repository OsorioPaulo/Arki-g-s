<?php
session_start();
include_once '../index.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM admins WHERE usuario = ? AND senha = SHA2(?, 256)";
$stmt = $connect->prepare($sql);
$stmt->bind_param("ss", $usuario, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $_SESSION['admin'] = true;
    header("Location: ../Usuario/adm.php");
} else {
    header("Location: ../ADM/index.html");
    echo "Usuário ou senha inválidos!";
}
?>
