<?php

include '../config/routes.php';

function view(string $name, mixed $data = []): void
{
    // include: ele tenta, se der erro, ele continua a aplicacao
    // require: ele tenta, se der erro, ele para a aplicacao
    // *_once: ele so inclui o arquivo uma vez

    include "../src/views/_template/head.php";
    include "../src/views/{$name}.php";
    include "../src/views/_template/footer.php";
}

function request_input(string $nome): mixed
{
    return htmlspecialchars($_POST[$nome] ?? $_GET[$nome]);
}

function connection()
{
    return include "../src/conexao.php";
}
