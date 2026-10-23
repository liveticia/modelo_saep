<?php

require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/EstoqueController.php";

$EstoqueController = new EstoqueController($pdo);

if(isset($_GET['id_estoque'])){
    $id_estoque = $_GET['id_estoque'];
    $estoque = $EstoqueController->deletar($id_estoque);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}

?>