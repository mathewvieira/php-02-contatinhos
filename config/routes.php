<?php

include_once '../src/utils/formsUtils.php';
include_once '../src/utils/routesUtils.php';

include '../src/controllers/lugares/lugares.php';
include '../src/controllers/contatos/contatos.php';

$url = getCurrentUrl();

$controller = match ($url) {
    ROUTE_HOME => 'contatos_listar',

    ROUTE_CONTATOS_LISTAR => 'contatos_listar',
    ROUTE_CONTATOS_EXCLUIR => 'contatos_excluir',
    ROUTE_CONTATOS_EDITAR => 'contatos_editar',
    ROUTE_CONTATOS_ADICIONAR => 'contatos_adicionar',

    ROUTE_LUGARES_LISTAR => 'lugares_listar',
    ROUTE_LUGARES_EXCLUIR => 'lugares_excluir',
    ROUTE_LUGARES_EDITAR => 'lugares_editar',
    ROUTE_LUGARES_ADICIONAR => 'lugares_adicionar',

    default => null
};

if ($controller !== null) {
    $controller();
    exit;
}
