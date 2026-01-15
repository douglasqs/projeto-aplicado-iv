<?php
// Script to setup database
$db_file = __DIR__ . '/database/database.sqlite';

try {
    $pdo = new PDO("sqlite:" . $db_file);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents(__DIR__ . '/database/schema.sql');

    // SQLite doesn't support multiple statements in one exec() easily if they use proprietary syntax,
    // but the schema is standard enough. Let's clean some MySQL-specific bits if necessary.
    $sql = str_replace(['ENGINE=InnoDB', 'DEFAULT CHARSET=utf8mb4'], '', $sql);

    $pdo->exec($sql);

    echo "Banco de dados SQLite criado e tabelas inicializadas com sucesso em: " . $db_file;
} catch (PDOException $e) {
    echo "Erro ao configurar banco de dados SQLite: " . $e->getMessage();
}
