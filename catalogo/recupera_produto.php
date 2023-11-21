<?php
$conexao = Conexao::getConexao();
$sql = "SELECT * FROM produtos";
$result = $conexao->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="produto">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do Produto" class="produto-imagem">';
        echo '<h2>' . $row['nome'] . '</h2>';
        echo '<p>Potência: ' . $row['potencia'] . '</p>';
        echo '<p>Preço: R$ ' . $row['preco'] . '</p>';
        echo '<p>Cor: ' . $row['cor'] . '</p>'; // Adicionado campo "Cor"
        echo '<p>Estoque: ' . $row['estoque'] . '</p>'; // Adicionado campo "Estoque"
        echo '<a href="inicial.php?delete_product=' . $row['id'] . '">Excluir</a>';
        echo '</div>';
    }
} else {
    echo 'Nenhum produto cadastrado.';
}
//$conexao->close();
?>