<?php
class ProdutoModel {
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
        $stmt = $this->pdo->query("SELECT * FROM produtos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarProduto($id_produto){
        $stmt = $this->pdo->query("SELECT * FROM produtos WHERE id_produto = $id_produto");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $quantidade, $qnt_min) {
        $sql = "INSERT INTO produtos (nome, quantidade, qnt_min) VALUES (:nome, :quantidade, :qnt_min)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':quantidade' => $quantidade,
            ':qnt_min' => $qnt_min
        ]);
    }
    public function editar($nome, $quantidade, $qnt_min, $id_produto) {
        $sql = "UPDATE produtos SET nome=?, quantidade=?, qnt_min=? WHERE id_produto = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $quantidade, $qnt_min, $id_produto]);
    }

    public function deletar($id_produto) {
        $sql = "DELETE FROM produtos WHERE id_produto = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_produto]);
    }

    public function pesquisar($palavra)
{
    $sql = $this->pdo->prepare("
        SELECT *
        FROM produtos
        WHERE nome LIKE ?
    ");

    $sql->execute(["%$palavra%"]);

    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function contar()
{
    $sql = $this->pdo->query("SELECT COUNT(*) AS total FROM produtos");
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    return $resultado['total'];
}
    
}