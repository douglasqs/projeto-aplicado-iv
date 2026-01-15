<?php

// Show errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../src/Controllers/AuthController.php';
require_once __DIR__ . '/../src/Controllers/ProductController.php';

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'dashboard':
        $controller = new ProductController();
        $controller->index();
        break;
    case 'create_product':
        $controller = new ProductController();
        $controller->create();
        break;
    default:
        // Redirect to login or appropriate page
        header('Location: index.php?action=login');
        break;
}
