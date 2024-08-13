<?php

function app()
{
  $url = $_SERVER['REQUEST_URI'];

  $url_without_args = parse_url($url, PHP_URL_PATH);

  if ($url_without_args === '/listar' || $url_without_args === '/') {
    view('listar');
    exit;
  }

  if ($url_without_args === '/cadastrar') {
    if ($_POST) {
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];

      $data = date('d/m/Y');

      $conexao = require_once '../src/conexao.php';

      $conexao->query("
        INSERT INTO tb_contatos (nome, email, telefone, data_cadastro)
        VALUES ('{$nome}', '{$email}', '{$telefone}', '{$data}')
      ");

      header('location: /listar');
    }
    view('cadastrar');
    exit;
  }

  if ($url_without_args === '/editar') {
    if (isset($_GET['id'])) {
      if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $data = date('d/m/Y');

        $conexao = require_once '../src/conexao.php';

        $conexao->query("
          UPDATE tb_contatos
          SET nome = '{$nome}', email = '{$email}', telefone = '{$telefone}', data_cadastro = '{$data}'
          WHERE id = {$_GET['id']}
        ");

        header('location: /listar');
      }
      view('editar');
    }
    exit;
  }

  if ($url_without_args === '/deletar') {
    if (isset($_GET['id'])) {
      header('location: /listar');
    }
    view('deletar');
    exit;
  }

  echo "Página não encontrada";
}

function view(string $name): void
{
  // include: ele tenta, se der erro, ele continua a aplicacao
  // require: ele tenta, se der erro, ele para a aplicacao
  // *_once: ele so inclui o arquivo uma vez

  include '../src/views/_template/head.php';
  include "../src/views/{$name}.php";
  include '../src/views/_template/footer.php';
}

app();
