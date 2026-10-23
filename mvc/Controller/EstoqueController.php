<?php
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Model/EstoqueModel.php";
class EstoqueController {
    private $estoqueModel;
   
    public function __construct($pdo) {
        $this->estoqueModel = new EstoqueModel($pdo);

    }
    public function listar() {
        $estoques = $this->estoqueModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/saep1/mvc/View/Estoque/listar.php";
        return;
    }

    public function buscarEstoque($id_estoque){
        $estoque = $this->estoqueModel->buscarEstoque($id_estoque);
        return $estoque;
    }

    public function cadastrar($id_produto, $id_usuario, $tipo, $quantidade, $data_movimentacao) {
        $this->estoqueModel->cadastrar($id_produto, $id_usuario, $tipo, $quantidade, $data_movimentacao);
    }

    public function editar($id_produto, $quantidade, $id_usuario, $id_estoque) {
        $this->estoqueModel->editar($id_produto, $quantidade, $id_usuario, $id_estoque);
    }

    public function deletar($id_estoque){
        $estoque = $this->estoqueModel->deletar($id_estoque);
        return $estoque;
    }

    public function contar()
{
    return $this->estoqueModel->contar();
}

}






