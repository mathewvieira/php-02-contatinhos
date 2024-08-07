<?php

//pegando a url que o usuario acessou
$url = $_SERVER['REQUEST_URI'];

if ($url === '/listar' || $url === '/') {
    view('listar');
} else if ($url === '/cadastro') {

    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $data = date('d/m/Y');

        $conexao = require_once '../src/conexao.php';

        $conexao->query("
            INSERT INTO tb_contatos (nome, email, telefone, data_cadastro)
            VALUES ('{$nome}', '{$email}', '{$telefone}', '{$data}')
        "); 

        //redirecionar
        header('location: /listar');
    } 

    view('cadastro');
} else {
    echo "Pagina nao encontrada";
}

function view(string $name): void
{
    // include: ele tenta, se der erro, ele continua a aplicacao
    // require: ele tenta, se der erro, ele para a aplicacao
    // *_once: ele so inclui o arquivo uma vez

    include '../src/views/_template/head.php';
    include "../src/views/{$name}.php";
    include '../src/views/_template/footer.php';
}




