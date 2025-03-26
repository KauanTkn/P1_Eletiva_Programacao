<?php
require 'Canetas.php';
$canetas = new Canetas();
$canetas->excluir($_GET['id']);
header('Location: listar.php');
exit;
?>
