<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Criar Conta</h2>
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

        <form action="index.php?action=register" method="POST">
            <div class="form-row">
                <div class="form-group half">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="form-group half">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome" id="sobrenome" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required>
            </div>

            <div class="form-group">
                <label for="confSenha">Confirmar Senha</label>
                <input type="password" name="confSenha" id="confSenha" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        </form>

        <div class="auth-footer">
            <p>Já tem conta? <a href="index.php?action=login">Faça Login</a></p>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>