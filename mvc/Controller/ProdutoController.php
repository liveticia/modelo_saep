<?php
require_once "C:/Turma2/xampp/htdocs/saep1/mvc/Model/ProdutoModel.php";
class ProdutoController {
    private $produtoModel;
   
    public function __construct($pdo) {
        $this->produtoModel = new ProdutoModel($pdo);

    }
    public function listar() {
        $produtos = $this->produtoModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/saep1/mvc/View/Produto/listar.php";
        return;
    }

    public function buscarProduto($id_produto){
        $produto = $this->produtoModel->buscarProduto($id_produto);
        return $produto;
    }

    public function cadastrar($nome, $quantidade, $qnt_min) {
        $this->produtoModel->cadastrar($nome, $quantidade, $qnt_min);
    }

    public function editar($nome,$quantidade, $qnt_min, $id_produto){
        $this->produtoModel->editar($nome, $quantidade, $qnt_min, $id_produto);

    }

    public function deletar($id_produto){
        $produto = $this->produtoModel->deletar($id_produto);
        return $produto;
    }

    public function pesquisar($palavra)
{
    $produtos = $this->produtoModel->pesquisar($palavra);
    include_once "C:/Turma2/xampp/htdocs/saep1/mvc/View/Produto/listar.php";
    return;
}

public function contar()
{
    return $this->produtoModel->contar();
}
}








