<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/saep1/mvc/CSS/style.css">
     <title>Dashboard</title>

     <h1>Dashboard</h1>

     
   
</body>
</html>

<?php
require_once "DB/Database.php";
require_once "Controller/ProdutoController.php";
require_once "Controller/UsuarioController.php";
require_once "Controller/EstoqueController.php";

$produtoController = new ProdutoController($pdo);
$usuarioController = new UsuarioController($pdo);
$estoqueController = new EstoqueController($pdo);

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != "")
{
    $produtos = $produtoController->pesquisar($_GET['pesquisa']);
}
else
{
    $produtos = $produtoController->listar();
}
$usuarios = $usuarioController->listar();
$estoque = $estoqueController->listar();

$totalProdutos = $produtoController->contar();
$totalUsuarios = $usuarioController->contar();
$totalEstoque = $estoqueController->contar();
?>
<div class="cards">

    <div class="card">
        <h2>Produtos</h2>
        <p><?= $totalProdutos ?></p>
    </div>

    <div class="card">
        <h2>Usuários</h2>
        <p><?= $totalUsuarios ?></p>
    </div>

    <div class="card">
        <h2>Estoque</h2>
        <p><?= $totalEstoque ?></p>
    </div>

</div>