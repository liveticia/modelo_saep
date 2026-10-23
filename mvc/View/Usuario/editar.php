<?php

require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/UsuarioController.php";

$UsuarioController = new UsuarioController($pdo);

if(isset($_GET['id_usuario'])){
    $id_usuario = $_GET['id_usuario'];
    $usuario = $UsuarioController->buscarUsuario($id_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/saep1/mvc/CSS/style.css">
    <title>Editar Usuário</title>
</head>
<body>
    <form method="post">
       <label for="nome">Nome:</label>
       <input type="text" name="nome" value="<?=$usuario['nome'];?>" required><br> 

       <label for="email">Email:</label>
       <input type="email" name="email" value="<?=$usuario['email'];?>" required><br> 

       <label for="senha">Senha:</label>
       <input type="password" name="senha" value="<?=$usuario['senha'];?>" required>
       
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
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $UsuarioController->editar($nome, $email, $senha, $id_usuario);

    header('Location: ../../index.php');
}

?>








