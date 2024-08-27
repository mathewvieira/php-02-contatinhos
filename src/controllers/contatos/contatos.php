<?php

declare(strict_types=1);

const SQL_CONTATOS_INSERT = 'INSERT INTO tb_contatos (nome, email, telefone, data_cadastro) VALUES (:nome, :email, :telefone, :data_cadastro); ';
const SQL_CONTATOS_SELECT_ALL = 'SELECT * FROM tb_contatos; ';
const SQL_CONTATOS_SELECT_BY_ID = 'SELECT * FROM tb_contatos WHERE id = :id; ';
const SQL_CONTATOS_UPDATE_BY_ID = 'UPDATE tb_contatos SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id; ';
const SQL_CONTATOS_DELETE_BY_ID = 'DELETE FROM tb_contatos WHERE id = :id; ';

function contatos_listar(): void
{
    $query = getConnection()->prepare(SQL_CONTATOS_SELECT_ALL);
    $query->execute();

    view(ROUTE_CONTATOS_LISTAR, $query->fetchAll());
}

function contatos_editar(): void
{
    if (!isset($_GET['id'])) {
        header('location: ' . ROUTE_CONTATOS_LISTAR);
    }

    $id = requestInput('id');

    if (!$_POST) {
        $query = getConnection()->prepare(SQL_CONTATOS_SELECT_BY_ID);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    
        view(ROUTE_CONTATOS_EDITAR, $query->fetch(PDO::FETCH_ASSOC));
        return;       
    }

    $nome = requestInput('nome');
    $email = requestInput('email');
    $telefone = requestInput('telefone');

    $query = getConnection()->prepare(SQL_CONTATOS_UPDATE_BY_ID);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':nome', $nome, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
    $query->execute();

    $_SESSION['sucesso'] = 'contato_editado';

    header('location: ' . ROUTE_CONTATOS_LISTAR);
}

function contatos_excluir(): void
{
    if (!isset($_GET['id'])) {
        header('location: ' . ROUTE_CONTATOS_LISTAR);
    }

    $id = requestInput('id');

    if (!$_POST) {
        $query = getConnection()->prepare(SQL_CONTATOS_SELECT_BY_ID);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    
        view(ROUTE_CONTATOS_EXCLUIR, $query->fetch(PDO::FETCH_ASSOC));
        return;
    }

    $query = getConnection()->prepare(SQL_CONTATOS_DELETE_BY_ID);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $_SESSION['sucesso'] = 'contato_excluido';

    header('location: ' . ROUTE_CONTATOS_LISTAR);
}

function contatos_adicionar(): void
{
    if (!$_POST) {
        view(ROUTE_CONTATOS_ADICIONAR);
        return;
    }
    
    $nome = requestInput('nome');
    $email = requestInput('email');
    $telefone = requestInput('telefone');
    $dataCadastro = date('d/m/Y');

    $query = getConnection()->prepare(SQL_CONTATOS_INSERT);
    $query->bindParam(':nome', $nome, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
    $query->bindParam(':data_cadastro', $dataCadastro, PDO::PARAM_STR);
    $query->execute();

    $_SESSION['sucesso'] = 'contato_adicionado';

    header('location: ' . ROUTE_CONTATOS_LISTAR);
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
