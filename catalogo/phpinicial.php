<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("location: inicial.php");
    exit; // Importante sair para evitar que o restante do código seja executado
}

require_once("Conexao.php");

if (isset($_GET['delete_product'])) {
    // Se um produto deve ser excluído
    $product_id = $_GET['delete_product'];

    // Adicione código para excluir o produto com o ID $product_id do banco de dados
    $conexao = Conexao::getConexao();
    $sql = "DELETE FROM produtos WHERE id = :product_id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':product_id', $product_id);

    if ($stmt->execute()) {
        // Produto excluído com sucesso
        header("Location: inicial.php");
        exit;
    } else {
        // Lidar com erros, se houver algum
        echo "Erro ao excluir o produto: " . $stmt->errorInfo()[2];
    }
}
?>