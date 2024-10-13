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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pesnome = $_POST['campo_primeiro_nome'];
    $pessobrenome = $_POST['campo_sobrenome'];
    $pesemail = $_POST['campo_email'];
    $pescidade = $_POST['campo_cidade'];
    $pesestado = $_POST['campo_estado'];
    $pessenha = password_hash($_POST['campo_password'], PASSWORD_BCRYPT); 


    $query = "INSERT INTO tbpessoa (pesnome, pessobrenome, pesemail, pescidade, pesestado, pespassword) 
              VALUES ($1, $2, $3, $4, $5, $6)";
    $params = array($pesnome, $pessobrenome, $pesemail, $pescidade, $pesestado, $pessenha);

    $result = pg_query_params($conn, $query, $params);

    if ($result) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao realizar o cadastro.";
    }
}

pg_close($conn);
?>
