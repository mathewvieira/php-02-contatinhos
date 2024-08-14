<?php

declare(strict_types=1);

function contatos_listar(): void
{
  $rows = connection()->query("SELECT * FROM tb_contatos;");

  view('listar', $rows->fetchAll());
}

function contatos_editar(): void
{
  if (isset($_GET['id'])) {
    if ($_POST) {
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];

      $data = date('d/m/Y');

      connection()->query("
            UPDATE tb_contatos
            SET nome = '{$nome}', email = '{$email}', telefone = '{$telefone}', data_cadastro = '{$data}'
            WHERE id = {$_GET['id']}
          ");

      header('location: /contatos/listar');
    }

    view('editar');
  }
}

function contatos_excluir(): void
{
  if (isset($_GET['id'])) {
    header('location: /contatos/listar');
  }

  view('deletar');
}

function contatos_adicionar(): void
{
  if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $data = date('d/m/Y');

    connection()->query("
          INSERT INTO tb_contatos (nome, email, telefone, data_cadastro)
          VALUES ('{$nome}', '{$email}', '{$telefone}', '{$data}')
        ");

    header('location: /contatos/listar');
  }

  view('adicionar');
}
