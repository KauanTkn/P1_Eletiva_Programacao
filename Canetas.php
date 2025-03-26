<?php
require_once 'Database.php';

class Canetas {
    private $conexao;
    private $tabela = "Canetas";

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectar();
    }

    public function listar() {
        $sql = "SELECT * FROM " . $this->tabela;
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE can_cod = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function adicionar($descricao, $marca, $preco, $cor) {
        $sql = "INSERT INTO " . $this->tabela . " (can_descricao, can_marca, can_preco, can_cor) VALUES (:descricao, :marca, :preco, :cor)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':cor', $cor);
        return $stmt->execute();
    }

    public function atualizar($id, $descricao, $marca, $preco, $cor) {
        $sql = "UPDATE " . $this->tabela . " SET can_descricao = :descricao, can_marca = :marca, can_preco = :preco, can_cor = :cor WHERE can_cod = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':cor', $cor);
        return $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM " . $this->tabela . " WHERE can_cod = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
