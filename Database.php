<?php
class Database {
    private $servidor = 'localhost';
    private $banco = 'provap1';
    private $usuario = 'root';
    private $senha = '';
    private $conexao;

    public function conectar() {
        $this->conexao = null;
        try {
            $this->conexao = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->banco, $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            echo "Erro na conexão: " . $erro->getMessage();
        }
        return $this->conexao;
    }
}
?>
