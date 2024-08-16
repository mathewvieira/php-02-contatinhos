<?php

declare(strict_types=1);

function contatos_listar(): void
{
  $rows = connection()->query("SELECT * FROM tb_contatos; ");

  view('listar', $rows->fetchAll());
}

function contatos_editar(): void
{
  if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);

    if ($_POST) {
      $nome = htmlspecialchars($_POST['nome']);
      $email = htmlspecialchars($_POST['email']);
      $telefone = htmlspecialchars($_POST['telefone']);

      $query = connection()->prepare("UPDATE tb_contatos SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id; ");
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->bindParam(':nome', $nome, PDO::PARAM_STR);
      $query->bindParam(':email', $email, PDO::PARAM_STR);
      $query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
      $query->execute();

      header('location: /contatos/listar');
    }

    $query = connection()->prepare("SELECT * FROM tb_contatos WHERE id = :id; ");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    view('editar', $query->fetch(PDO::FETCH_ASSOC));
  }
}

function contatos_excluir(): void
{
  if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);

    if ($_POST) {
      $query = connection()->prepare("DELETE FROM tb_contatos WHERE id = :id; ");
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->execute();

      header('location: /contatos/listar');
    }

    $query = connection()->prepare("SELECT * FROM tb_contatos WHERE id = :id; ");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    view('excluir', $query->fetch(PDO::FETCH_ASSOC));
  }
}

function contatos_adicionar(): void
{
  if ($_POST) {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $dataCadastro = date('d/m/Y');

    $query = connection()->prepare("INSERT INTO tb_contatos (nome, email, telefone, data_cadastro) VALUES (:nome, :email, :telefone, :data_cadastro); ");
    $query->bindParam(':nome', $nome, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
    $query->bindParam(':data_cadastro', $dataCadastro, PDO::PARAM_STR);
    $query->execute();

    header('location: /contatos/listar');
  }

  view('adicionar');
}
