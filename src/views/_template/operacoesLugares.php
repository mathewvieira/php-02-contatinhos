<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$isLugaresAdicionar = $url === routeLugaresAdicionar;
$isLugaresEditar = $url === routeLugaresEditar;
$isLugaresExcluir = $url === routeLugaresExcluir;

$disabledInputClass = "bg-secondary bg-opacity-10 not-allowed";

$inputCssClass = "class='form-control mb-3 " . ($isLugaresExcluir ? $disabledInputClass : '') . "'";
?>

<section class="row">
    <div class="col">
        <div class="card card-body">
            <?php
            echo !$isLugaresExcluir ? '<div id="div_erros"></div>' : '';

            if ($isLugaresAdicionar) {
                echo '<h4>Adicionar lugar</h4>';
            }
            if ($isLugaresEditar) {
                echo '<h4>Editar lugar</h4>';
            }
            if ($isLugaresExcluir) {
                echo '<h4>Confirmar exclusão?</h4>';
            }
            ?>

            <form action="" method="post">
                <label for="input_nome">Nome</label>
                <input id="input_nome" type="text" name="nome"
                    <?php
                    echo $inputCssClass;
                    echo $isLugaresExcluir ? ' readonly ' : ' ';
                    echo !$isLugaresAdicionar ? " value='{$data['nome']}' " : '';
                    ?>>

                <label for="input_endereco">Endereço</label>
                <input id="input_endereco" type="text" name="endereco"
                    <?php
                    echo $inputCssClass;
                    echo $isLugaresExcluir ? ' readonly ' : ' ';
                    echo !$isLugaresAdicionar ? " value='{$data['endereco']}' " : '';
                    ?>>

                <label for="input_avaliacao">Avaliação</label>
                <input id="input_avaliacao" type="range" min="1" max="5" name="avaliacao"
                    <?php
                    echo $inputCssClass;
                    echo $isLugaresExcluir ? ' readonly ' : ' ';
                    echo !$isLugaresAdicionar ? " value='{$data['avaliacao']}' " : '';
                    ?>>

                <div class="d-flex justify-content-between">
                    <a id="btn_cancelar" class="btn btn-danger flex-fill me-2"
                        href="<?php echo routeLugaresListar; ?>">Cancelar</a>

                    <button id="btn_enviar" class="btn btn-success w-25">OK</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col"></div>
</section>

<script src="/assets/js/validations.js"></script>