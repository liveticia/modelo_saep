<?php
class EstoqueModel {
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
        $stmt = $this->pdo->query("SELECT * FROM estoque");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarEstoque($id_estoque){
        $sql = "SELECT * FROM estoque WHERE id_estoque = :id_estoque";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_estoque' => $id_estoque]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($id_produto, $id_usuario, $tipo, $quantidade, $data_movimentacao) {
        $sql = "INSERT INTO estoque (id_produto, id_usuario, tipo, quantidade, data_movimentacao) VALUES (:id_produto, :id_usuario, :tipo, :quantidade, :data_movimentacao)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_produto' => $id_produto,
            ':id_usuario' => $id_usuario,
            ':tipo' => $tipo,
            ':quantidade' => $quantidade,
            ':data_movimentacao' => $data_movimentacao
        ]);

        if ($tipo == 'entrada') {
    $sql1 = "UPDATE produtos
            SET quantidade = quantidade + :quantidade
            WHERE id_produto = :id";
} else {
    $sql1 = "UPDATE produtos
            SET quantidade = quantidade - :quantidade
            WHERE id_produto = :id";
}

$stmt1 = $this->pdo->prepare($sql1);

return $stmt1->execute([
    ':quantidade' => $quantidade,
    ':id' => $id_produto
]);

    }
    public function editar($id_produto, $quantidade, $id_usuario, $id_estoque) {
        $sql = "UPDATE estoque SET id_produto=?, quantidade=?, id_usuario=? WHERE id_estoque = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_produto,  $id_usuario,$quantidade, $id_estoque]);
    }

    public function deletar($id_estoque) {
        $sql = "DELETE FROM estoque WHERE id_estoque = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_estoque]);
    }
    


public function totalProdutos()
{
    $sql = $this->pdo->query("SELECT COUNT(*) as total FROM produtos");
    return $sql->fetch()['total'];
}

public function totalUsuarios()
{
    $sql = $this->pdo->query("SELECT COUNT(*) as total FROM usuarios");
    return $sql->fetch()['total'];
}

public function totalEstoque()
{
    $sql = $this->pdo->query("SELECT COUNT(*) as total FROM estoque");
    return $sql->fetch()['total'];
}
public function listarEstoqueBaixo()
{
    $sql = "SELECT id_produto, nome, quantidade, qnt_min
            FROM produtos
            WHERE quantidade <= qnt_min";

    $stmt = $this->pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function contar()
{
    $sql = $this->pdo->query("SELECT COUNT(*) AS total FROM estoque");
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    return $resultado['total'];
}
    
}