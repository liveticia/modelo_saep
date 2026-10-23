
<?php

if (empty($produtos)) {
    echo "<p>Nenhum Produto encontrado!</p>";
    echo "<a href='View/Produto/cadastrar.php'>Cadastrar</a>";
    return;
}

?>

<form method="GET">
    <input type="text" name="pesquisa"
           placeholder="Pesquisar produto..."
           value="<?= htmlspecialchars($_GET['pesquisa'] ?? '') ?>">

    <button class="btn btn-primary pesquisa" type="submit">
        Pesquisar
    </button>
</form>

<?php

echo "<table class='tabela-container' border='1' cellpadding='5' cellspacing='0'>";

echo "<tr>
        <td colspan='5'>
            <a class='btn btn-primary' href='View/Produto/cadastrar.php'>
                Cadastrar
            </a>
        </td>
      </tr>";

echo "<tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Quantidade Mínima</th>
        <th>Ações</th>
      </tr>";

foreach ($produtos as $produto) {

    $id_produto = $produto['id_produto'];

    // Verifica se o estoque está abaixo do mínimo
    $classe = '';

    if ($produto['quantidade'] < $produto['qnt_min']) {
        $classe = 'estoque-baixo';
    }

    echo "<tr class='$classe'>";

    echo "<td>{$id_produto}</td>";
    echo "<td>" . htmlspecialchars($produto['nome']) . "</td>";
    echo "<td>{$produto['quantidade']}</td>";
    echo "<td>{$produto['qnt_min']}</td>";

    echo "<td>
            <a class='btn btn-secondary'
               href='View/Produto/editar.php?id_produto={$id_produto}'>
                Editar
            </a> |

            <a class='btn btn-danger'
               href='View/Produto/deletar.php?id_produto={$id_produto}'
               onclick=\"return confirm('Tem certeza que deseja excluir este produto?')\">
                Deletar
            </a>
          </td>";

    echo "</tr>";
}

echo "</table>";

?>
