<?php

require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/ProdutoController.php";

$ProdutoController = new ProdutoController($pdo);

if(isset($_GET['id_produto'])){
    $id_produto = $_GET['id_produto'];
    $produto = $ProdutoController->deletar($id_produto);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}
?>