<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'provap1';
    private $usuario = 'root';
    private $senha = '';
    private $conexao;

    public function conectar() {
        try {
            $this->conexao = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->usuario,
                $this->senha
            );
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            die("Erro na conexão: " . $erro->getMessage());
        }
        return $this->conexao;
    }
}
?>
