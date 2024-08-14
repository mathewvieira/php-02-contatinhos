<table class="table table-striped table-hover">
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
		<?php

		foreach ($contacts as $contact) {
			echo "
				<tr>
					<td>{$contact['id']}</td>
					<td>{$contact['nome']}</td>
					<td>{$contact['email']}</td>
					<td>{$contact['telefone']}</td>
					<td>
						<a href='/contatos/editar?id={$contact["id"]}'>Editar</a>
						<a href='/contatos/deletar?id={$contact["id"]}'>Excluir</a>
					</td>
				</tr>
			";
		}

		?>
	</tbody>
</table>