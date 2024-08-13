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

		$conn = require_once '../src/conexao.php';

		$rows = $conn->query('SELECT * FROM tb_contatos;');

		foreach ($rows->fetchAll() as $row) {
			echo "
				<tr>
					<td>{$row['id']}</td>
					<td>{$row['nome']}</td>
					<td>{$row['email']}</td>
					<td>{$row['telefone']}</td>
					<td>
						<a href='/editar?id={$row["id"]}'>Editar</a>
						<a href='/deletar?id={$row["id"]}'>Excluir</a>
					</td>
				</tr>
			";
		}

		?>
	</tbody>
</table>
