<div class="table-responsive card">
	<table class="table table-bordered table-striped table-hover mb-0">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Telefone</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $row) { ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nome']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['telefone']; ?></td>
					<td>
						<?php

						$linkEditar = "/contatos/editar?id={$row["id"]}";
						$linkExcluir = "/contatos/excluir?id={$row["id"]}";

						?>

						<a href='<?php echo $linkEditar; ?>'><i class="bi bi-pencil-square"></i></a>
						<a href='<?php echo $linkEditar; ?>'>Editar</a>

						<i class="bi bi-dash-lg"></i>

						<a href='<?php echo $linkExcluir; ?>'><i class="bi bi-trash"></i></a>
						<a href='<?php echo $linkExcluir; ?>'>Excluir</a>
					</td>
				</tr>
			<? } ?>
		</tbody>
	</table>
</div>