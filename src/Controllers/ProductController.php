<?php

require_once __DIR__ . '/../Models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->checkAuth();
    }

    private function checkAuth()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function index()
    {
        $produtos = $this->productModel->getAll();
        require __DIR__ . '/../Views/products/list.php';
    }

    public function create()
    {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome' => $_POST['nome'],
                'potencia' => $_POST['potencia'] ?? '',
                'preco' => $_POST['preco'],
                'cor' => $_POST['cor'],
                'estoque' => $_POST['estoque'],
            ];

            // Image Upload Logic
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                // Ensure directory exists
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = time() . '_' . basename($_FILES['imagem']['name']);
                $uploadFile = $uploadDir . $fileName;

                $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (in_array($ext, $allowed)) {
                    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
                        $data['imagem_path'] = 'uploads/' . $fileName;

                        if ($this->productModel->create($data)) {
                            $success = "Produto cadastrado com sucesso!";
                        } else {
                            $error = "Erro ao salvar no banco de dados.";
                        }
                    } else {
                        $error = "Erro ao fazer upload da imagem.";
                    }
                } else {
                    $error = "Formato de arquivo inválido. Apenas JPG, PNG e GIF.";
                }
            } else {
                $error = "Selecione uma imagem válida.";
            }
        }

        require __DIR__ . '/../Views/products/create.php';
    }
}
