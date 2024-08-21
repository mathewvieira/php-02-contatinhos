<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$isContatosAdicionar = $url === routeContatosAdicionar;
$isContatosEditar = $url === routeContatosEditar;
$isContatosExcluir = $url === routeContatosExcluir;

$disabledInputClass = "bg-secondary bg-opacity-10 not-allowed";

$inputCssClass = "class='form-control mb-3 " . ($isContatosExcluir ? $disabledInputClass : '') . "'";
?>

<section class="row">
    <div class="col">
        <div class="card card-body">
            <?php
            echo !$isContatosExcluir ? '<div id="div_erros"></div>' : '';

            if ($isContatosAdicionar) {
                echo '<h4>Adicionar contato</h4>';
            }
            if ($isContatosEditar) {
                echo '<h4>Editar contato</h4>';
            }
            if ($isContatosExcluir) {
                echo '<h4>Confirmar exclusão?</h4>';
            }
            ?>

            <form action="" method="post">
                <label for="input_nome">Nome</label>
                <input id="input_nome" type="text" name="nome"
                    <?php
                    echo $inputCssClass;
                    echo $isContatosExcluir ? ' readonly ' : ' ';
                    echo !$isContatosAdicionar ? " value='{$data['nome']}' " : '';
                    ?>>

                <label for="input_email">Email</label>
                <input id="input_email" type="text" name="email"
                    <?php
                    echo $inputCssClass;
                    echo $isContatosExcluir ? ' readonly ' : ' ';
                    echo !$isContatosAdicionar ? " value='{$data['email']}' " : '';
                    ?>>

                <label for="input_telefone">Telefone</label>
                <input id="input_telefone" type="text" name="telefone"
                    <?php
                    echo $inputCssClass;
                    echo $isContatosExcluir ? ' readonly ' : ' ';
                    echo !$isContatosAdicionar ? " value='{$data['telefone']}' " : '';
                    ?>>

                <div class="d-flex justify-content-between">
                    <a id="btn_cancelar" class="btn btn-danger flex-fill me-2"
                        href="<?php echo routeContatosListar; ?>">Cancelar</a>

                    <button id="btn_enviar" class="btn btn-success w-25">OK</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col"></div>
</section>

<script src="/assets/js/validations.js"></script>