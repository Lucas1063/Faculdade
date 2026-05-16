<?php
// Conexão com o banco de dados PostgreSQL
$host = "localhost"; // Endereço do servidor
$dbname = "postgres"; // Nome do banco de dados
$user = "postgres"; // Usuário do banco de dados
$password = "postgres"; // Senha do banco de dados

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro ao conectar ao banco de dados.");
}

// Inicializa a variável de busca
$search_name = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Captura o nome a ser pesquisado e escapa caracteres especiais
    $search_name = trim($_POST['search']);
}

// Consulta para listar todas as pessoas ou filtrar por nome
$query = "SELECT pescodigo, pesnome, pessobrenome, pesemail, pescidade, pesestado, createdat 
          FROM tbpessoa 
          WHERE pesnome ILIKE $1";
$params = array("%$search_name%");

$result = pg_query_params($conn, $query, $params);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . pg_last_error($conn));
}

// Início da estrutura HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Lista de Pessoas Cadastradas</h2>
    
    <!-- Formulário de busca -->
    <form method="post" action="" style="text-align: center; margin-bottom: 20px;">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search_name); ?>" placeholder="Digite o nome para buscar..." required>
        <input type="submit" value="Buscar">
    </form>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-Mail</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Data de Criação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop para exibir os dados na tabela
            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['pescodigo']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pesnome']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pessobrenome']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pesemail']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pescidade']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pesestado']) . "</td>";
                echo "<td>" . htmlspecialchars($row['createdat']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
// Fecha a conexão com o banco de dados
pg_close($conn);
?>
