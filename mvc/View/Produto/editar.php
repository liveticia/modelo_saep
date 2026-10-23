<?php

require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/ProdutoController.php";

$ProdutoController = new ProdutoController($pdo);

if(isset($_GET['id_produto'])){
    $id_produto = $_GET['id_produto'];
    $produto = $ProdutoController->buscarProduto($id_produto);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/saep1/mvc/CSS/style.css">
    <title>Editar Produto</title>
</head>
<body class="">
    <form method="post">
       <label for="nome">Nome:</label>
       <input type="text" name="nome" value="<?=$produto['nome'];?>" required><br> 
       
       <label for="quantidade">Quantidade:</label>
       <input type="number" name="quantidade" value="<?=$produto['quantidade'];?>" required><br>

       <label for="qnt_min">Quantidade mínima:</label>
       <input type="number" name="qnt_min" value="<?=$produto['qnt_min'];?>" required><br>

       <input type="submit">
    </form>
</body>
</html>
<?php
} else {
    header('Location: listar.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $qnt_min = $_POST['qnt_min'];
    $ProdutoController->editar($nome, $quantidade, $qnt_min, $id_produto);

    header('Location: ../../index.php');
}

?>








