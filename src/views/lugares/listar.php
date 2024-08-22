<?php if (count($data) > 0) { ?>

    <div class="table-responsive card">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Avaliação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['endereco']; ?></td>

                        <td>
                            <?php

                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $row['avaliacao']) {
                                    echo '<i class="bi bi-star-fill"></i>';
                                } else {
                                    echo '<i class="bi bi-star"></i>';
                                }
                            }

                            ?>
                        </td>

                        <td>
                            <?php

                            $linkEditar = ROUTE_LUGARES_EDITAR . "?id={$row["id"]}";
                            $linkExcluir = ROUTE_LUGARES_EXCLUIR . "?id={$row["id"]}";

                            ?>

                            <a href='<?php echo $linkEditar; ?>'><i class="bi bi-pencil-square"></i></a>
                            <a href='<?php echo $linkEditar; ?>'>Editar</a>

                            <i class="bi bi-dash-lg"></i>

                            <a href='<?php echo $linkExcluir; ?>'><i class="bi bi-trash"></i></a>
                            <a href='<?php echo $linkExcluir; ?>'>Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php

} else {
    echo "<span>Nenhum registro encontrado. Clique em <a href='" . ROUTE_LUGARES_ADICIONAR . "'>Adicionar Lugar</a> para criar.</span>";
}

?>