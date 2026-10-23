<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/saep1/mvc/CSS/style.css">
    <title>Cadastrar Estoque</title>
</head>
<body>
    <form method="post">
       <label for="produto_id">Produto:</label>
       <input type="number" name="produto_id" required><br>

       <label for="id_usuario">Usuario:</label>
       <input type="number" name="id_usuario" required><br>

       <label for="tipo">Tipo:</label>
       <select name="tipo" required>
        <option value="entrada">Entrada</option>
        <option value="saida">Saída</option>
        </select> <br>

         <label for="quantidade">Quantidade:</label>
         <input type="number" name="quantidade" required><br>

         <label for="data_movimentacao">Data:</label>
        <input type="date" name="data_movimentacao" required><br>
       
       <input type="submit">
    </form>
</body>
</html>

<?php

require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/EstoqueController.php";

$EstoqueController = new EstoqueController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_produto = $_POST['produto_id'];
    $id_usuario = $_POST['id_usuario'];
    $tipo = $_POST['tipo'];
    $quantidade = $_POST['quantidade'];
    $data_movimentacao = $_POST['data_movimentacao'];

    $EstoqueController->cadastrar($id_produto, $id_usuario, $tipo, $quantidade, $data_movimentacao);
    header('Location: ../../index.php');
}










