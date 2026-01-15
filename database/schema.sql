-- Tabela de Usuários
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `sobrenome` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `senha` VARCHAR(255) NOT NULL -- Tamanho aumentado para suportar hash bcrypt
);

-- Tabela de Produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `potencia` VARCHAR(50),
  `preco` DECIMAL(10, 2) NOT NULL,
  `cor` VARCHAR(30),
  `estoque` INT(11) NOT NULL DEFAULT 0,
  `imagem_path` VARCHAR(255), -- Caminho para o arquivo salvo no disco
  `data_cadastro` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
