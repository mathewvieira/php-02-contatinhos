<?php

//pegando a url que o usuario acessou
$url = $_SERVER['REQUEST_URI'];

if ($url === '/listar') {
    view('listar');
} else if ($url === '/cadastro') {

    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
    
        
    }
    // INSERT INTO .........

    view('cadastro');
} else {
    echo "Pagina nao encontrada";
}

function view(string $name): void
{
    include '../src/views/_template/head.php';
    include "../src/views/{$name}.php";
    include '../src/views/_template/footer.php';
}




