<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
            $conexao = require_once '../src/conexao.php';

            $resultado = $conexao->query('SELECT * FROM tb_contatos;');

            // foreach ($resultado->fetchAll() as $cada) {
            foreach ($resultado as $cada) {
                echo "
                    <tr>
                        <td>{$cada['id']}</td>
                        <td>{$cada['nome']}</td>
                        <td>{$cada['email']}</td>
                        <td>{$cada['telefone']}</td>
                        <td>
                            <a href=''>Editar</a>
                            <a href=''>Excluir</a>
                        </td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>