<?php $url = getCurrentUrl(); ?>

<section class="row">
    <div class="col">
        <div class="card card-body">
            <?php printTitle($url); ?>

            <div id="form-warning"></div>

            <form action="" method="post">
                <label for="input-nome">Nome</label>
                <input id="input-nome" type="text" name="nome" <?php printInputEssentials($url, $data, 'nome'); ?>>

                <label for="input-email">Email</label>
                <input id="input-email" type="text" name="email" <?php printInputEssentials($url, $data, 'email'); ?>>

                <label for="input-telefone">Telefone</label>
                <input id="input-telefone" type="text" name="telefone" <?php printInputEssentials($url, $data, 'telefone'); ?>>

                <div class="d-flex justify-content-between">
                    <a id="btn-cancelar" class="btn btn-danger flex-fill me-2"
                        href="<?php echo ROUTE_CONTATOS_LISTAR; ?>">Cancelar</a>

                    <button id="btn-enviar" class="btn btn-success w-25">OK</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col"></div>
</section>

<script src="/assets/js/validations.js"></script>