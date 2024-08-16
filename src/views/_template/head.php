<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Contatinhos</title>

    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="container" data-bs-theme="dark">

    <h1 class="mt-3">Contatinhos 🫣</h1>

    <hr>

    <?php $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>

    <nav>
        <a class="btn <?php echo $url === "/contatos/listar" ? 'btn-info' : 'btn-outline-info'; ?>"
            href="/contatos/listar">Listar Contatos</a>
        <a class="btn <?php echo $url === "/contatos/adicionar" ? 'btn-info' : 'btn-outline-info'; ?>"
            href="/contatos/adicionar">Adicionar Contatos</a>
        <a class="btn <?php echo $url === "/lugares/listar" ? 'btn-info' : 'btn-outline-info'; ?>"
            href="/lugares/listar">Listar Lugares</a>
        <a class="btn <?php echo $url === "/lugares/adicionar" ? 'btn-info' : 'btn-outline-info'; ?>"
            href="/lugares/adicionar">Adicionar Lugares</a>
    </nav>

    <hr>