

<?php

if (empty($estoques)) {
    echo "<p>Nenhum Estoque encontrado!</p>";
    echo "<a href='View/Estoque/cadastrar.php'>Cadastrar</a>";
    return;
}

echo "<table class='tabela-container' border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><td><a class='btn btn-primary' href='View/Estoque/cadastrar.php'>Cadastrar</a></td></tr>";
echo "<tr><th>ID</th><th>Produto</th><th>Usuário</th><th>Quantidade</th><th>Data</th><th>Ações</th></tr>";

foreach ($estoques as $estoque) {
    $id_estoque = $estoque['id_estoque'];
    echo "<tr>";
    echo "<td>{$id_estoque}</td>";
    echo "<td>{$estoque['id_produto']}</td>";
    echo "<td>{$estoque['id_usuario']}</td>";
    echo "<td>{$estoque['quantidade']}</td>";
    echo "<td>{$estoque['data_movimentacao']}</td>";
    echo "<td>
                 <a class='btn btn-secondary' href='View/Estoque/editar.php?id_estoque={$id_estoque}'>Editar</a> |
                <a class='btn btn-danger' href='View/Estoque/deletar.php?id_estoque={$id_estoque}' onclick=\"return confirm('Tem certeza que deseja excluir este estoque?')\">Deletar</a>
            </td>";
    echo "</tr>";
}
echo "</table>";
