<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="page-header">
    <h1>Catálogo de Produtos</h1>
    <a href="index.php?action=create_product" class="btn btn-success">+ Novo Produto</a>
</div>

<div class="product-grid">
    <?php if (empty($produtos)): ?>
        <p class="no-products">Nenhum produto cadastrado.</p>
    <?php else: ?>
        <?php foreach ($produtos as $produto): ?>
            <div class="product-card">
                <div class="product-image">
                    <?php if (!empty($produto['imagem_path']) && file_exists(__DIR__ . '/../../../public/' . $produto['imagem_path'])): ?>
                        <img src="<?php echo htmlspecialchars($produto['imagem_path']); ?>"
                            alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                    <?php else: ?>
                        <div class="no-image">Sem Imagem</div>
                    <?php endif; ?>
                </div>
                <div class="product-details">
                    <h3>
                        <?php echo htmlspecialchars($produto['nome']); ?>
                    </h3>
                    <p class="potencia">
                        <?php echo htmlspecialchars($produto['potencia']); ?>W
                    </p>
                    <p class="cor">Cor:
                        <?php echo htmlspecialchars($produto['cor']); ?>
                    </p>
                    <p class="estoque">Estoque:
                        <?php echo htmlspecialchars($produto['estoque']); ?>
                    </p>
                    <div class="price">R$
                        <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>