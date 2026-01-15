<?php

require_once __DIR__ . '/../Config/Database.php';

class Product
{
    private $conn;
    private $table = 'produtos';

    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY data_cadastro DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . " 
                 (nome, potencia, preco, cor, estoque, imagem_path) 
                 VALUES (:nome, :potencia, :preco, :cor, :estoque, :imagem_path)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':potencia', $data['potencia']);
        $stmt->bindParam(':preco', $data['preco']);
        $stmt->bindParam(':cor', $data['cor']);
        $stmt->bindParam(':estoque', $data['estoque']);
        $stmt->bindParam(':imagem_path', $data['imagem_path']);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
