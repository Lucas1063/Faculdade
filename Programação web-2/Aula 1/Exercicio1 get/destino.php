<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Recebidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        pre {
            background: #f4f4f4;
            padding: 10px;
            border: 1px solid #ccc;
            overflow-x: auto;
        }
    </style>
</head>
<body>

    <h2>Dados Recebidos</h2>
    <pre><?php print_r($_REQUEST); ?></pre>

    <h2>Cabeçalho da Requisição</h2>
    <pre><?php print_r(apache_request_headers()); ?></pre>

    <h2>Método Utilizado</h2>
    <pre><?php echo $_SERVER['REQUEST_METHOD']; ?></pre>

</body>
</html>
