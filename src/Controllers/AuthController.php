<?php

require_once __DIR__ . '/../Models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = $_POST['senha'];

            $user = $this->userModel->login($email, $senha);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nome'];
                header('Location: index.php?action=dashboard');
                exit;
            } else {
                $error = "Email ou senha incorretos.";
            }
        }
        require __DIR__ . '/../Views/auth/login.php';
    }

    public function register()
    {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = $_POST['senha'];
            $confSenha = $_POST['confSenha'];

            if ($senha !== $confSenha) {
                $error = "As senhas não coincidem.";
            } else {
                if ($this->userModel->create($nome, $sobrenome, $email, $senha)) {
                    $success = "Usuário cadastrado com sucesso! Faça login.";
                } else {
                    $error = "Erro ao cadastrar. Email pode já estar em uso.";
                }
            }
        }
        require __DIR__ . '/../Views/auth/register.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}
