<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Login</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="seu@email.com">
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required placeholder="Sua senha">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </form>

        <div class="auth-footer">
            <p>Não tem conta? <a href="index.php?action=register">Cadastre-se</a></p>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>