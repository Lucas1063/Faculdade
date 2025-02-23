<?php
include_once 'config/config.php';
$db = dbConnect();

// Carregar perguntas
$query = $db->query("SELECT id_pergunta, texto_pergunta FROM perguntas WHERE status = TRUE ORDER BY id_pergunta");
$perguntas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Avaliação do Hospital</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/index.js" defer></script>
</head>

<body>
    <form id="avaliacaoForm" action="submeter.php" method="POST">
        <h1>Avaliação do Hospital Regional Alto Vale</h1>

        <div id="perguntas-container">
            <?php foreach ($perguntas as $index => $pergunta): ?>
                <div class="pergunta" id="pergunta-<?php echo $index; ?>"
                    style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                    <label><?php echo htmlspecialchars($pergunta['texto_pergunta']); ?></label>
                    <div class="botoes-resposta">
                        <?php for ($i = 0; $i <= 10; $i++): ?>
                            <button type="button" class="botao-nota" data-index="<?php echo $index; ?>"
                                data-valor="<?php echo $i; ?>" onclick="selecionarNota(this, <?php echo $index; ?>)">
                                <?php echo $i; ?>
                            </button>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" name="resposta[<?php echo $pergunta['id_pergunta']; ?>]"
                        id="resposta-<?php echo $index; ?>">

                    <!-- Campo de feedback opcional -->
                    <div class="feedback-container">
                        <label>Feedback (opcional)</label>
                        <textarea name="feedback[<?php echo $pergunta['id_pergunta']; ?>]"
                            placeholder="Deixe seu feedback..."></textarea>
                    </div>

                    <button type="button" class="confirmar-btn" onclick="proximaPergunta(<?php echo $index; ?>)"
                        disabled>Confirmar</button>

                </div>

            <?php endforeach; ?>
        </div>

        <button type="submit" id="enviarAvaliacao" style="display: none;">Enviar Avaliação</button>
        <footer>
            <p>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</p>
        </footer>
    </form>
</body>

</html>