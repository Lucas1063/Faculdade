<?php

$filename = 'pessoas.json';
if (!file_exists($filename)) {
    file_put_contents($filename, json_encode([])); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pesnome = $_POST['campo_primeiro_nome'];
    $pessobrenome = $_POST['campo_sobrenome'];
    $pesemail = $_POST['campo_email'];
    $pescidade = $_POST['campo_cidade'];
    $pesestado = $_POST['campo_estado'];
    $pessenha = password_hash($_POST['campo_password'], PASSWORD_BCRYPT);

  
    $pessoa = array(
        'nome' => $pesnome,
        'sobrenome' => $pessobrenome,
        'email' => $pesemail,
        'cidade' => $pescidade,
        'estado' => $pesestado,
        'senha' => $pessenha
    );


    $conteudo_atual = file_get_contents($filename);
    $pessoas = json_decode($conteudo_atual, true); 


    if (count($pessoas) < 10) {

        $pessoas[] = $pessoa;

        file_put_contents($filename, json_encode($pessoas, JSON_PRETTY_PRINT));

        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: o limite de 10 pessoas já foi atingido.";
    }
}
?>
