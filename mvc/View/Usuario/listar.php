<?php

if (empty($usuarios)) {
    echo "<p>Nenhum Usuário encontrado!</p>";
    echo "<a href='View/Usuario/cadastrar.php'>Cadastrar</a>";
    return;
}

echo "<table class='tabela-container' border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><td><a class='btn btn-primary' href='View/Usuario/cadastrar.php'>Cadastrar</a></td></tr>";
echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>";

foreach ($usuarios as $usuario) {
    $id_usuario = $usuario['id_usuario'];
    echo "<tr>";
    echo "<td>{$id_usuario}</td>";
    echo "<td>{$usuario['nome']}</td>";
    echo "<td>{$usuario['email']}</td>";
    echo "<td>
                 <a class='btn btn-secondary' href='View/Usuario/editar.php?id_usuario={$id_usuario}'>Editar</a> |
                <a class='btn btn-danger' href='View/Usuario/deletar.php?id_usuario={$id_usuario}' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">Deletar</a>
            </td>";
    echo "</tr>";
}
echo "</table>";
