<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Controller/UsuarioController.php";

$UsuarioController = new UsuarioController($pdo);
$mensagemErro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $Usuario = $UsuarioController->login($email, $senha);

    if ($Usuario != null) {
        $_SESSION["usuario"] = $Usuario["id"];
        header('Location: index.php');
        exit;
    } else {
        $mensagemErro = "Erro ao logar";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/saep1/mvc/CSS/style.css">
</head>
<body>
    <main class="login-layout">
        <div class="login-box">
            <h2>Login</h2>
            <p class="subtitle">Entre com seu email para acessar a area de eventos.</p>

            <form method="POST">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu email" required>
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
                <button type="submit">Entrar</button>
                <a class="button-link" href="View/Usuario/cadastrar.php">Criar conta</a>
            </form>

            <?php if ($mensagemErro !== ""): ?>
                <div class="message"><?= $mensagemErro; ?></div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>