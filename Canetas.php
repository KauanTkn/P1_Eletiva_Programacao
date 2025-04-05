<?php
require_once 'Database.php';

class Canetas {
    private $conexao;
    private $tabela = "Canetas";

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectar();
    }

    // Função para listar todas as canetas
    public function listar() {
        $sql = "SELECT * FROM {$this->tabela}";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Função para buscar uma caneta pelo ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM {$this->tabela} WHERE can_cod = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Função para adicionar uma nova caneta
    public function adicionar($descricao, $marca, $preco, $cor) {
        $sql = "INSERT INTO {$this->tabela} (can_descricao, can_marca, can_preco, can_cor) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([$descricao, $marca, $preco, $cor]);
    }

    // Função para atualizar os dados de uma caneta
    public function atualizar($id, $descricao, $marca, $preco, $cor) {
        $sql = "UPDATE {$this->tabela} SET can_descricao = ?, can_marca = ?, can_preco = ?, can_cor = ? WHERE can_cod = ?";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([$descricao, $marca, $preco, $cor, $id]);
    }

    // Função para excluir uma caneta
    public function excluir($id) {
        $sql = "DELETE FROM {$this->tabela} WHERE can_cod = ?";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
