<?php

require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/EstoqueController.php";

$EstoqueController = new EstoqueController($pdo);

if(isset($_GET['id_estoque'])){
    $id_estoque = $_GET['id_estoque'];
    $estoque = $EstoqueController->buscarEstoque($id_estoque);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/saep1/mvc/CSS/style.css">
    <title>Editar Estoque</title>
</head>
<body>
    <form method="post">
       <label for="id_produto">Produto:</label>
       <input type="number" name="id_produto" value="<?=$estoque['id_produto'];?>" required><br>

       <label for="id_usuario">Usuário:</label>
       <input type="number" name="id_usuario" value="<?=$estoque['id_usuario'];?>" required><br>

       <label for="quantidade">Quantidade:</label>
       <input type="number" name="quantidade" value="<?=$estoque['quantidade'];?>" required><br>

       <label for="data_movimentacao">Data:</label>
       <input type="date" name="data_movimentacao" value="<?=$estoque['data_movimentacao'];?>" required><br>

       <input type="submit">
    </form>
</body>
</html>
<?php
} else {
    header('Location: listar.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_produto = $_POST['id_produto'];
    $id_usuario = $_POST['id_usuario'];
    $quantidade = $_POST['quantidade'];
    $data_movimentacao = $_POST['data_movimentacao'];

    $EstoqueController->editar($id_produto, $id_usuario, $quantidade, $data_movimentacao, $id_estoque);

    header('Location: ../../index.php');
}










