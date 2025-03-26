<?php
require 'Canetas.php';
$canetas = new Canetas();
$caneta = $canetas->buscarPorId($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $canetas->atualizar($_POST['id'], $_POST['descricao'], $_POST['marca'], $_POST['preco'], $_POST['cor']);
    header('Location: listar.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Caneta</title>
</head>
<body>
    <h1>Editar Caneta</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $caneta['can_cod'] ?>">
        <label>Descrição: <input type="text" name="descricao" value="<?= $caneta['can_descricao'] ?>" required></label><br>
        <label>Marca: <input type="text" name="marca" value="<?= $caneta['can_marca'] ?>" required></label><br>
        <label>Preço: <input type="number" step="0.01" name="preco" value="<?= $caneta['can_preco'] ?>" required></label><br>
        <label>Cor: <input type="text" name="cor" value="<?= $caneta['can_cor'] ?>" required></label><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="listar.php"><button>Voltar</button></a>
</body>
</html>
