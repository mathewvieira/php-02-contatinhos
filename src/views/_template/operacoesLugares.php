<?php $url = getCurrentUrl(); ?>

<section class="row">
    <div class="col">
        <div class="card card-body">
            <?php printTitle($url); ?>

            <div id="form-warning"></div>

            <form action="" method="post">
                <label for="input-nome">Nome</label>
                <input id="input-nome" type="text" name="nome" <?php printInputEssentials($url, $data, 'nome'); ?>>

                <label for="input-endereco">Endereço</label>
                <input id="input-endereco" type="text" name="endereco" <?php printInputEssentials($url, $data, 'endereco'); ?>>

                <label>Avaliação</label>
                <div class="form-control mb-3 star-rating d-flex justify-content-between">
                    <div>
                        <input type="radio" id="star-1" name="avaliacao" value="1" <?php printAttrChecked($url, $data, 'avaliacao', 1, true); ?>>
                        <label for="star-1">1 <i class="bi bi-star-fill"></i></label>
                    </div>

                    <div>
                        <input type="radio" id="star-2" name="avaliacao" value="2" <?php printAttrChecked($url, $data, 'avaliacao', 2); ?>>
                        <label for="star-2">2 <i class="bi bi-star-fill"></i></label>
                    </div>

                    <div>
                        <input type="radio" id="star-3" name="avaliacao" value="3" <?php printAttrChecked($url, $data, 'avaliacao', 3); ?>>
                        <label for="star-3">3 <i class="bi bi-star-fill"></i></label>
                    </div>

                    <div>
                        <input type="radio" id="star-4" name="avaliacao" value="4" <?php printAttrChecked($url, $data, 'avaliacao', 4); ?>>
                        <label for="star-4">4 <i class="bi bi-star-fill"></i></label>
                    </div>

                    <div>
                        <input type="radio" id="star-5" name="avaliacao" value="5" <?php printAttrChecked($url, $data, 'avaliacao', 5); ?>>
                        <label for="star-5">5 <i class="bi bi-star-fill"></i></label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a id="btn-cancelar" class="btn btn-danger flex-fill me-2"
                        href="<?php echo ROUTE_LUGARES_LISTAR; ?>">Cancelar</a>

                    <button id="btn-enviar" class="btn btn-success w-25">OK</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col"></div>
</section>

<script src="/assets/js/validations.js"></script>