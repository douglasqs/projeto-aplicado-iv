<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="form-container">
    <h2>Cadastrar Novo Produto</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="alert alert-success">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>

    <form action="index.php?action=create_product" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div class="form-row">
            <div class="form-group half">
                <label for="potencia">Potência (W)</label>
                <input type="text" name="potencia" id="potencia" placeholder="Ex: 50">
            </div>
            <div class="form-group half">
                <label for="cor">Cor</label>
                <input type="text" name="cor" id="cor" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group half">
                <label for="preco">Preço (R$)</label>
                <input type="number" name="preco" id="preco" step="0.01" required>
            </div>
            <div class="form-group half">
                <label for="estoque">Estoque</label>
                <input type="number" name="estoque" id="estoque" required min="0">
            </div>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem do Produto</label>
            <input type="file" name="imagem" id="imagem" accept="image/*" required>
            <small>Formatos aceitos: JPG, PNG, GIF</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
            <a href="index.php?action=dashboard" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>