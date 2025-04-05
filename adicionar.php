<?php
require 'Canetas.php';
$canetas = new Canetas();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $canetas->adicionar($_POST['descricao'], $_POST['marca'], $_POST['preco'], $_POST['cor']);
    header('Location: listar.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Caneta</title>
</head>
<body>
    <h1>Adicionar Nova Caneta</h1>
    <form method="POST">
        <label>Descrição: <input type="text" name="descricao" required></label><br>
        <label>Marca: <input type="text" name="marca" required></label><br>
        <label>Preço: <input type="number" step="0.01" name="preco" required></label><br>
        <label>Cor: <input type="text" name="cor" required></label><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="listar.php"><button>Voltar</button></a>
</body>
</html>
