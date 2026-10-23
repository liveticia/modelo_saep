<?php

require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/UsuarioController.php";

$UsuarioController = new UsuarioController($pdo);

if(isset($_GET['id_usuario'])){
    $id_usuario = $_GET['id_usuario'];
    $usuario = $UsuarioController->deletar($id_usuario);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}
?>