<?php
require 'Canetas.php';

// Verifica se o ID foi passado na URL
if (!isset($_GET['id'])) {
    die("Erro: ID da caneta não informado.");
}

$id = $_GET['id'];

$canetas = new Canetas();

// Verifica se a caneta existe antes de tentar excluir
$caneta = $canetas->buscarPorId($id);
if (!$caneta) {
    die("Erro: Caneta não encontrada.");
}

// Exclui a caneta
$canetas->excluir($id);

// Redireciona para a lista após excluir
header('Location: listar.php');
exit;
?>
