<?php

require_once __DIR__ . '/../Config/Database.php';

class User
{
    private $conn;
    private $table = 'usuario';

    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function create($nome, $sobrenome, $email, $senha)
    {
        // Verifica se email já existe
        if ($this->findByEmail($email)) {
            return false;
        }

        $query = "INSERT INTO " . $this->table . " (nome, sobrenome, email, senha) VALUES (:nome, :sobrenome, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        // Hash da senha
        $password_hash = password_hash($senha, PASSWORD_BCRYPT);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $password_hash);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function findByEmail($email)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function login($email, $senha)
    {
        $user = $this->findByEmail($email);

        if ($user && password_verify($senha, $user['senha'])) {
            return $user;
        }

        return false;
    }
}
