<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/saep1/mvc/CSS/style.css">
    <title>Cadastrar Medicamento</title>
</head>
<body>
    <form method="post">
       <label for="nome">Nome:</label>
       <input type="text" name="nome" required><br> 
       
       <label for="quantidade">Quantidade:</label>
       <input type="number" name="quantidade" required><br>

       <label for="qnt_min">Quantidade mínima:</label>
       <input type="number" name="qnt_min" required><br>

       <input type="submit">
    </form>
</body>
</html>

<?php

require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/ProdutoController.php";

$ProdutoController = new ProdutoController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $qnt_min = $_POST['qnt_min'];


    $ProdutoController->cadastrar($nome, $quantidade, $qnt_min);
    header('Location: ../../index.php');
}










