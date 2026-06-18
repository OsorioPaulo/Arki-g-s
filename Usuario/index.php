<?php
include_once '../index.php';

$nome = $_POST['nome'];
$numberphone = $_POST['number_phone'];
$desc = $_POST['desc'];
$local = $_POST['local'];

$sql_insert = "INSERT INTO solicitar(nome, telefone, localizacao, descc)
VALUES('$nome', '$numberphone', '$local', '$desc')";

if ($connect->query($sql_insert) === TRUE) {
    include_once 'pedidofeito.html';
} else {
    echo "Erro: " . $connect->error;
}
?>
