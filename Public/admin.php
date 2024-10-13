<?php
// Conexão com o banco de dados
include('db_connect.php');

// Busca as respostas do banco de dados
$query = "SELECT p.pergunta, r.resposta, r.feedback FROM tbrespostas r
          JOIN tbperguntas p ON r.id_pergunta = p.id
          ORDER BY p.ordem, r.id";
$result = pg_query($conn, $query);

if (!$result) {
    die("Erro ao buscar as respostas.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Painel de Administração - Respostas da Avaliação</h1>
        <table>
            <thead>
                <tr>
                    <th>Pergunta</th>
                    <th>Resposta</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = pg_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['pergunta']; ?></td>
                        <td><?php echo $row['resposta']; ?></td>
                        <td><?php echo $row['feedback'] ?: 'N/A'; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
pg_close($conn);
?>
