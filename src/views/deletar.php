<?php 

$conn = require_once '../src/conexao.php';

$id = htmlspecialchars($_GET["id"]);

$query = $conn->prepare("DELETE FROM tb_contatos WHERE id = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
