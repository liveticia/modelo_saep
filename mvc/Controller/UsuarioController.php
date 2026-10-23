<?php
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Model/UsuarioModel.php";
class UsuarioController {
    private $usuarioModel;
   
    public function __construct($pdo) {
        $this->usuarioModel = new UsuarioModel($pdo);

    }
    public function listar() {
        $usuarios = $this->usuarioModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/saep1/mvc/View/Usuario/listar.php";
        return;
    }

    public function buscarUsuario($id_usuario){
        $usuario = $this->usuarioModel->buscarUsuario($id_usuario);
        return $usuario;
    }

    public function cadastrar($nome, $email, $senha) {
        $this->usuarioModel->cadastrar($nome, $email, $senha);
    }

    public function editar($nome, $email, $senha, $id_usuario){
        $this->usuarioModel->editar($nome, $email, $senha, $id_usuario);

    }

    public function deletar($id_usuario){
        $usuario = $this->usuarioModel->deletar($id_usuario);
        return $usuario;
    }

    public function contar()
{
    return $this->usuarioModel->contar();
}

     public function login($email, $senha){
        return $this->usuarioModel->login($email, $senha);
    }


}








