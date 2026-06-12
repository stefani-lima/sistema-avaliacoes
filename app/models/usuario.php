<?php
class UsuarioModel {

    // criar conta
    public function __construct(private PDO $pdo) {}
    public function criarConta(string $nomeUsuario, string $loginUsuario, string $senhaUsuario): bool {

        $senhaHash = password_hash($senhaUsuario, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios_administrativos (nome_usuario, login_usuario, senha_usuario) 
                VALUES (:nomeUsuario, :loginUsuario, :senhaHash)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nomeUsuario' => $nomeUsuario,
            ':loginUsuario' => $loginUsuario,
            ':senhaHash' => $senhaHash,
        ]);
    }
}

?>