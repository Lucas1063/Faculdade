<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Obrigado pela Avaliação</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        // Redirecionar e aplicar animação de fade-out
        setTimeout(function() {
            document.querySelector('.message').classList.add('fade-out');
            setTimeout(function() {
                window.location.href = "index.php";  // Página inicial
            }, 2000);  
        }, 3000); 
    </script>
</head>
<body>
    <div class="message">
        <h1>Obrigado pela sua avaliação!</h1>
        <p>Sua resposta é muito importante para nós.</p>
        <p>Você será redirecionado para a página inicial em alguns segundos...</p>
        <footer>
        <p>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</p>
    </footer>
    </div>

</body>
</html>
