<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="css/cadastrostyle.css">
    <script>
        function validarArquivo() {
            var input = document.getElementById("imagem");
            var arquivo = input.files[0];

            if (arquivo) {
                var extensoesPermitidas = ["jpg", "jpeg", "png", "gif"];
                var extensao = arquivo.name.split('.').pop().toLowerCase();

                if (extensoesPermitidas.indexOf(extensao) === -1) {
                    alert("Por favor, selecione um arquivo de imagem (jpg, jpeg, png, ou gif).");
                    input.value = ''; // Limpa o campo de arquivo
                }
            }
        }
    </script>
</head>

<body>
    <h1>Cadastro de Produtos</h1>
    <form id="cadastro-form" enctype="multipart/form-data">
        <label for="nome">Nome do Item:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="potencia">Potência:</label>
        <input type="number" name="potencia" id="potencia"><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" required step="0.01"><br>

        <label for="cor">Cor:</label>
        <input type="text" name="cor" id="cor" required><br>

        <label for="imagem">Imagem do Produto:</label>
        <input type="file" name="imagem" id="imagem" onchange="validarArquivo()"><br>

        <label for="estoque">Estoque:</label>
        <input type="number" name="estoque" id="estoque" required min="0"><br>

        <input type="submit" value="Cadastrar">
        <input type="button" value="Voltar à Página Inicial" onclick="window.location.href='inicial.php';">

    </form>

    <div id="resultado" style="color: black; text-align: center; padding: 10px; ">

    <script>
        document.getElementById('cadastro-form').addEventListener('submit', function (e) {
            e.preventDefault();

            var form = this;
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'processar_cadastro.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('resultado').innerHTML = xhr.responseText;
                    if (xhr.responseText.indexOf('cadastrado com sucesso') !== -1) {
                        form.reset(); // Limpa os campos do formulário
                    }
                }
            };
            xhr.send(formData);
        });
    </script>
</body>

</html>