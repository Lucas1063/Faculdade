<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            text-align: left;
            font-weight: bold;
            color: #555;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .link-container {
            margin-top: 20px;
            text-align: center;
        }

        .link-container a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .link-container a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <?php
        // Obtém os valores enviados via GET, se existirem
        $nome = isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : '';
        $telefone = isset($_GET['telefone']) ? htmlspecialchars($_GET['telefone']) : '';
        $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
        $mensagem = isset($_GET['mensagem']) ? htmlspecialchars($_GET['mensagem']) : '';
    ?>

    <div class="container">
        <h2>Formulário de Contato</h2>
        <form action="destino.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="number" id="telefone" name="telefone" value="<?php echo $telefone; ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" required><?php echo $mensagem; ?></textarea>

            <button type="submit">Enviar</button>
        </form>

        <div class="link-container">
            <p>Ou envie os dados via GET:</p>
            <a href="index.php?nome=João&telefone=123456789&email=joao@email.com&mensagem=Olá">Clique aqui para preencher</a>
        </div>
    </div>

</body>
</html>
