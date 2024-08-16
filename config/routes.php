<?php

include '../src/controllers/lugares.php';
include '../src/controllers/contatos.php';

include_once '../config/routesNames.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller = match ($url) {
    routeHome => 'contatos_listar',

    routeContatosListar => 'contatos_listar',
    routeContatosExcluir => 'contatos_excluir',
    routeContatosEditar => 'contatos_editar',
    routeContatosAdicionar => 'contatos_adicionar',

    routeLugaresListar => 'lugares_listar',
    routeLugaresExcluir => 'lugares_excluir',
    routeLugaresEditar => 'lugares_editar',
    routeLugaresAdicionar => 'lugares_adicionar',

    default => null
};

if ($controller !== NULL) {
    $controller();
    exit;
}
