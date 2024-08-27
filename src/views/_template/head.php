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

    <?php $url = getCurrentUrl(); ?>
    
    <nav>
        <a class="btn <?php echo $url === ROUTE_CONTATOS_LISTAR ? 'btn-info' : 'btn-outline-info'; ?>"
            href="<?php echo ROUTE_CONTATOS_LISTAR; ?>">Listar Contatos</a>

        <a class="btn <?php echo $url === ROUTE_CONTATOS_ADICIONAR ? 'btn-info' : 'btn-outline-info'; ?>"
            href="<?php echo ROUTE_CONTATOS_ADICIONAR; ?>">Adicionar Contato</a>

        <a class="btn <?php echo $url === ROUTE_LUGARES_LISTAR ? 'btn-info' : 'btn-outline-info'; ?>"
            href="<?php echo ROUTE_LUGARES_LISTAR; ?>">Listar Lugares</a>

        <a class="btn <?php echo $url === ROUTE_LUGARES_ADICIONAR ? 'btn-info' : 'btn-outline-info'; ?>"
            href="<?php echo ROUTE_LUGARES_ADICIONAR; ?>">Adicionar Lugar</a>
    </nav>

    <hr>

    <?php if (isset($_SESSION['sucesso'])) {  ?>

    <div class="toast align-items-center text-bg-primary border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
        <div class="toast-body"><?php echo $_SESSION['sucesso']; ?> - OK </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

<?php } ?>