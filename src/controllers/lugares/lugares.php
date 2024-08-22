<?php

declare(strict_types=1);

const SQL_LUGARES_INSERT = 'INSERT INTO tb_lugares (nome, endereco, avaliacao, createdAt) VALUES (:nome, :endereco, :avaliacao, :createdAt); ';
const SQL_LUGARES_SELECT_ALL = 'SELECT * FROM tb_lugares; ';
const SQL_LUGARES_SELECT_BY_ID = 'SELECT * FROM tb_lugares WHERE id = :id; ';
const SQL_LUGARES_UPDATE_BY_ID = 'UPDATE tb_lugares SET nome = :nome, endereco = :endereco, avaliacao = :avaliacao, editedAt = :editedAt WHERE id = :id; ';
const SQL_LUGARES_DELETE_BY_ID = 'DELETE FROM tb_lugares WHERE id = :id; ';

function lugares_listar(): void
{
    $query = getConnection()->prepare(SQL_LUGARES_SELECT_ALL);
    $query->execute();

    view(ROUTE_LUGARES_LISTAR, $query->fetchAll());
}

function lugares_editar(): void
{
    if (!isset($_GET['id'])) {
        header('location: ' . ROUTE_LUGARES_LISTAR);
    }

    $id = requestInput('id');

    if ($_POST) {
        $nome = requestInput('nome');
        $endereco = requestInput('endereco');
        $avaliacao = requestInput('avaliacao');
        $editedAt = date('Y-m-d H:i:s');

        $query = getConnection()->prepare(SQL_LUGARES_UPDATE_BY_ID);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':nome', $nome, PDO::PARAM_STR);
        $query->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $query->bindParam(':avaliacao', $avaliacao, PDO::PARAM_INT);
        $query->bindParam(':editedAt', $editedAt);
        $query->execute();

        header('location: ' . ROUTE_LUGARES_LISTAR);
    }

    $query = getConnection()->prepare(SQL_LUGARES_SELECT_BY_ID);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    view(ROUTE_LUGARES_EDITAR, $query->fetch(PDO::FETCH_ASSOC));
}

function lugares_excluir(): void
{
    if (!isset($_GET['id'])) {
        header('location: ' . ROUTE_LUGARES_LISTAR);
    }

    $id = requestInput('id');

    if ($_POST) {
        $query = getConnection()->prepare(SQL_LUGARES_DELETE_BY_ID);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        header('location: ' . ROUTE_LUGARES_LISTAR);
    }

    $query = getConnection()->prepare(SQL_LUGARES_SELECT_BY_ID);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    view(ROUTE_LUGARES_EXCLUIR, $query->fetch(PDO::FETCH_ASSOC));
}

function lugares_adicionar(): void
{
    if ($_POST) {
        $nome = requestInput('nome');
        $endereco = requestInput('endereco');
        $avaliacao = requestInput('avaliacao');
        $createdAt = date('Y-m-d H:i:s');

        $query = getConnection()->prepare(SQL_LUGARES_INSERT);
        $query->bindParam(':nome', $nome, PDO::PARAM_STR);
        $query->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $query->bindParam(':avaliacao', $avaliacao, PDO::PARAM_INT);
        $query->bindParam(':createdAt', $createdAt);
        $query->execute();

        header('location: ' . ROUTE_LUGARES_LISTAR);
    }

    view(ROUTE_LUGARES_ADICIONAR);
}
