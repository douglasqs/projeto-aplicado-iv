<?php include 'phpinicial.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="css/inicial.css">
</head>

<body>
    <div class="sidebar">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="cadastro_produto.php">Cadastro de Produtos</a></li>
            <li><a href="sair.php">Sair</a></li>
        </ul>
    </div>

    <div class="content">
        <nav>
            <div class="welcome-message">
                <p>Bem Vindo,
                    <?php echo $_SESSION['nome']; ?>
                </p>
            </div>
        </nav>

        <div id="home">
            <h1>Catálogo de Produtos</h1>

            <div class="lista-produtos">
                <?php include 'recupera_produto.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>
