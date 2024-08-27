<?php

session_start();

include '../config/routes.php';

function view(string $route, mixed $data = []): void
{
    // include: ele tenta, se der erro, ele continua a aplicacao
    // require: ele tenta, se der erro, ele para a aplicacao
    // *_once: ele so inclui o arquivo uma vez  

    include "../src/views/_template/head.php";
    include "../src/views/{$route}.php";
    include "../src/views/_template/footer.php";

    unset($_SESSION['sucesso']);
}

function requestInput(string $nome): mixed
{
    return htmlspecialchars($_POST[$nome] ?? $_GET[$nome]);
}

function getConnection(): object
{
    return include "../src/conexao.php";
}

// session_destroy();
