<?php

include '../src/controllers/lugares.php';
include '../src/controllers/contatos.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller = match ($url) {
    '/' => 'contatos_listar',

    '/contatos/listar' => 'contatos_listar',
    '/contatos/excluir' => 'contatos_excluir',
    '/contatos/editar' => 'contatos_editar',
    '/contatos/adicionar' => 'contatos_adicionar',

    '/lugares/listar' => 'lugares_listar',
    '/lugares/excluir' => 'lugares_excluir',
    '/lugares/editar' => 'lugares_editar',
    '/lugares/adicionar' => 'lugares_adicionar',

    default => null
};

if ($controller !== NULL) {
    $controller();
    exit;
}
