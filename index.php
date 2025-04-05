<?php
require 'Canetas.php';

$canetas = new Canetas();

// Processamento de formulários
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && $_POST['id'] != '') {
        // Atualizar caneta existente
        $canetas->atualizar($_POST['id'], $_POST['descricao'], $_POST['marca'], $_POST['preco'], $_POST['cor']);
    } else {
        // Adicionar nova caneta
        $canetas->adicionar($_POST['descricao'], $_POST['marca'], $_POST['preco'], $_POST['cor']);
    }
    header('Location: index.php');
    exit;
}

// Excluir caneta
if (isset($_GET['excluir'])) {
    $canetas->excluir($_GET['excluir']);
    header('Location: index.php');
    exit;
}

// Buscar caneta para edição
$canetaEdit = null;
if (isset($_GET['editar'])) {
    $canetaEdit = $canetas->buscarPorId($_GET['editar']);
}

// Listar todas as canetas
$lista = $canetas->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Canetas</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 20px; }
        table { width: 80%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f4f4f4; }
        form { width: 50%; margin: auto; }
        input, button { margin: 5px; padding: 8px; width: 90%; }
    </style>
</head>
<body>

    <h1>Gerenciamento de Canetas</h1>

    <h2><?= $canetaEdit ? 'Editar Caneta' : 'Adicionar Nova Caneta' ?></h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $canetaEdit['can_cod'] ?? '' ?>">
        <input type="text" name="descricao" placeholder="Descrição" value="<?= $canetaEdit['can_descricao'] ?? '' ?>" required><br>
        <input type="text" name="marca" placeholder="Marca" value="<?= $canetaEdit['can_marca'] ?? '' ?>" required><br>
        <input type="number" step="0.01" name="preco" placeholder="Preço" value="<?= $canetaEdit['can_preco'] ?? '' ?>" required><br>
        <input type="text" name="cor" placeholder="Cor" value="<?= $canetaEdit['can_cor'] ?? '' ?>" required><br>
        <button type="submit"><?= $canetaEdit ? 'Atualizar' : 'Adicionar' ?></button>
    </form>

    <h2>Lista de Canetas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Cor</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $caneta): ?>
            <tr>
                <td><?= $caneta['can_cod'] ?></td>
                <td><?= $caneta['can_descricao'] ?></td>
                <td><?= $caneta['can_marca'] ?></td>
                <td><?= $caneta['can_preco'] ?></td>
                <td><?= $caneta['can_cor'] ?></td>
                <td>
                    <a href="index.php?editar=<?= $caneta['can_cod'] ?>">Editar</a> |
                    <a href="index.php?excluir=<?= $caneta['can_cod'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
