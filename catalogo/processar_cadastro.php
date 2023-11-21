<?php
require_once("Conexao.php");

try {
    $conexao = Conexao::getConexao();

    // Verifique se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupere os dados do formulário
        $nome = $_POST["nome"];
        $potencia = $_POST["potencia"];
        $preco = $_POST["preco"];
        $cor = $_POST["cor"]; // Recupere o valor da cor
        $estoque = $_POST["estoque"];


        // Processar a imagem
        $imagem = $_FILES["imagem"]["tmp_name"]; // Caminho temporário do arquivo
        $tamanho = $_FILES["imagem"]["size"];

        if ($imagem) {
            $conteudo_imagem = file_get_contents($imagem); // Lê o conteúdo da imagem

            // Inserir a imagem no banco de dados
            $sql = "INSERT INTO produtos (nome, potencia, preco, imagem, estoque, cor) VALUES (:nome, :potencia, :preco, :imagem, :estoque, :cor)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':potencia', $potencia);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':cor', $cor);
            $stmt->bindParam(':imagem', $conteudo_imagem, PDO::PARAM_LOB); // Use PDO::PARAM_LOB para dados BLOB
            $stmt->bindParam(':estoque', $estoque);


            if ($stmt->execute()) {
                echo "Produto cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o produto: " . $stmt->errorInfo()[2];
            }
        } else {
            echo "Erro ao processar a imagem.";
        }
    }
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}