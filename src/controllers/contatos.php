<?php

declare(strict_types=1);

const SQL_CONTATOS_INSERT = 'INSERT INTO tb_contatos (nome, email, telefone, data_cadastro) VALUES (:nome, :email, :telefone, :data_cadastro); ';
const SQL_CONTATOS_SELECT_ALL = 'SELECT * FROM tb_contatos; ';
const SQL_CONTATOS_SELECT_BY_ID = 'SELECT * FROM tb_contatos WHERE id = :id; ';
const SQL_CONTATOS_UPDATE_BY_ID = 'UPDATE tb_contatos SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id; ';
const SQL_CONTATOS_DELETE_BY_ID = 'DELETE FROM tb_contatos WHERE id = :id; ';

function contatos_listar(): void
{
    $query = connection()->prepare(SQL_CONTATOS_SELECT_ALL);
    $query->execute();

    view('contatosListar', $query->fetchAll());
}

function contatos_editar(): void
{
    if (!isset($_GET['id']))
        header('location: ' . routeContatosListar);

    $id = request_input('id');

    if ($_POST) {
        $nome = request_input('nome');
        $email = request_input('email');
        $telefone = request_input('telefone');

        $query = connection()->prepare(SQL_CONTATOS_UPDATE_BY_ID);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':nome', $nome, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $query->execute();

        header('location: ' . routeContatosListar);
    }

    $query = connection()->prepare(SQL_CONTATOS_SELECT_BY_ID);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    view('contatosEditar', $query->fetch(PDO::FETCH_ASSOC));
}

function contatos_excluir(): void
{
    if (!isset($_GET['id']))
        header('location: ' . routeContatosListar);

    $id = request_input('id');

    if ($_POST) {
        $query = connection()->prepare(SQL_CONTATOS_DELETE_BY_ID);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        header('location: ' . routeContatosListar);
    }

    $query = connection()->prepare(SQL_CONTATOS_SELECT_BY_ID);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    view('contatosExcluir', $query->fetch(PDO::FETCH_ASSOC));
}

function contatos_adicionar(): void
{
    if ($_POST) {
        $nome = request_input('nome');
        $email = request_input('email');
        $telefone = request_input('telefone');
        $dataCadastro = date('d/m/Y');

        $query = connection()->prepare(SQL_CONTATOS_INSERT);
        $query->bindParam(':nome', $nome, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $query->bindParam(':data_cadastro', $dataCadastro, PDO::PARAM_STR);
        $query->execute();

        header('location: ' . routeContatosListar);
    }

    view('contatosAdicionar');
}

/*  

    Alternativa para o BindParam()

    $sql = conexao()->prepare($query);

    $sql->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone
    ]);

*/
