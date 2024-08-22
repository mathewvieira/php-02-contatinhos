<?php

const ROUTE_HOME = '/';
const ROUTE_CONTATOS_LISTAR = '/contatos/listar';
const ROUTE_CONTATOS_EXCLUIR = '/contatos/excluir';
const ROUTE_CONTATOS_EDITAR = '/contatos/editar';
const ROUTE_CONTATOS_ADICIONAR = '/contatos/adicionar';
const ROUTE_LUGARES_LISTAR = '/lugares/listar';
const ROUTE_LUGARES_EXCLUIR = '/lugares/excluir';
const ROUTE_LUGARES_EDITAR = '/lugares/editar';
const ROUTE_LUGARES_ADICIONAR = '/lugares/adicionar';

function getCurrentUrl(): string
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

function isContatosListar(string $url): bool
{
    return $url === ROUTE_CONTATOS_LISTAR;
}

function isContatosAdicionar(string $url): bool
{
    return $url === ROUTE_CONTATOS_ADICIONAR;
}

function isContatosEditar(string $url): bool
{
    return $url === ROUTE_CONTATOS_EDITAR;
}

function isContatosExcluir(string $url): bool
{
    return $url === ROUTE_CONTATOS_EXCLUIR;
}

function isLugaresListar(string $url): bool
{
    return $url === ROUTE_LUGARES_LISTAR;
}

function isLugaresAdicionar(string $url): bool
{
    return $url === ROUTE_LUGARES_ADICIONAR;
}

function isLugaresEditar(string $url): bool
{
    return $url === ROUTE_LUGARES_EDITAR;
}

function isLugaresExcluir(string $url): bool
{
    return $url === ROUTE_LUGARES_EXCLUIR;
}