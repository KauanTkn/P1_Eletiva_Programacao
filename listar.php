<?php
require 'Canetas.php';
$canetas = new Canetas();
$lista = $canetas->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Canetas</title>
</head>
<body>
    <h1>Lista de Canetas</h1>
    <table border="1">
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
                    <a href="editar.php?id=<?= $caneta['can_cod'] ?>">Editar</a> |
                    <a href="excluir.php?id=<?= $caneta['can_cod'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php"><button>Voltar ao Menu</button></a>
</body>
</html>
