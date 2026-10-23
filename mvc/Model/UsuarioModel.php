<?php
class UsuarioModel {
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
        $sql = "SELECT * FROM usuarios ORDER BY nome ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarUsuario($id_usuario){
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_usuario' => $id_usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   
public function cadastrar($nome, $email, $senha) {
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha)
            VALUES (:nome, :email, :senha)";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senhaHash
    ]);
}

    public function editar($nome, $email, $senha, $id_usuario) {
        $sql = "UPDATE usuarios SET nome=?, email=?, senha=? WHERE id_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $senha, $id_usuario]);
    }

    public function deletar($id_usuario) {
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_usuario]);
    }
    
    public function contar()
{
    $sql = $this->pdo->query("SELECT COUNT(*) AS total FROM usuarios");
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    return $resultado['total'];
}
 

       public function login($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $senha]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   
}