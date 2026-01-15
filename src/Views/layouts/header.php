<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php if (isset($_SESSION['user_id'])): ?>
        <nav class="navbar">
            <div class="container">
                <a href="index.php?action=dashboard" class="brand">SistemaGestão</a>
                <ul class="nav-links">
                    <li><a href="index.php?action=dashboard">Catálogo</a></li>
                    <li><a href="index.php?action=create_product">Novo Produto</a></li>
                    <li><a href="index.php?action=logout" class="btn-logout">Sair</a></li>
                </ul>
            </div>
        </nav>
    <?php endif; ?>
    <div class="main-container">