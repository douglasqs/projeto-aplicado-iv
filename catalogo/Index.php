<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div id="corpo-center">

        <h1>Login</h1><!-- titulo -->

        <?php

        require_once "login.php";
        if (isset($_POST['btn-entrar'])) { //cadastrar
            //pegando input
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            //nserindo
            $logar = new Login();
            $logar->logar($email, $senha);
        }
        ?>

        <form action="" method="post"><!-- formulario -->

            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="senha" placeholder="Senha" required="">
            <button type="submit" name="btn-entrar"> Entrar </button><!-- botao entrar -->
            <a href="cadastro.php"> <strong>Cadastro</strong> </a><!-- cadastro -->
        </form>



    </div>

    <footer> douglasqsoares@hotmail.com </footer>
</body>

</html>