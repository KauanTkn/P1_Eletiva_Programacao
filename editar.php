<?php
require 'Canetas.php';

// Verifica se um ID foi passado na URL
if (!isset($_GET['id'])) {
    die("ID da caneta não informado.");
}

$canetas = new Canetas();
$caneta = $canetas->buscarPorId($_GET['id']);

// Se o ID não existir no banco, exibe uma mensagem e interrompe o script
if (!$caneta) {
    die("Caneta não encontrada.");
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
    $cor = $_POST['cor'];

    $canetas->atualizar($id, $descricao, $marca, $preco, $cor);

    // Redireciona para a lista de canetas
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
        <input type="hidden" name="id" value="<?= htmlspecialchars($caneta['can_cod']) ?>">
        
        <label>Descrição:</label>
        <input type="text" name="descricao" value="<?= htmlspecialchars($caneta['can_descricao']) ?>" required>
        <br>

        <label>Marca:</label>
        <input type="text" name="marca" value="<?= htmlspecialchars($caneta['can_marca']) ?>" required>
        <br>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" value="<?= htmlspecialchars($caneta['can_preco']) ?>" required>
        <br>

        <label>Cor:</label>
        <input type="text" name="cor" value="<?= htmlspecialchars($caneta['can_cor']) ?>" required>
        <br>

        <button type="submit">Salvar</button>
    </form>

    <a href="listar.php"><button>Voltar</button></a>
</body>
</html>
