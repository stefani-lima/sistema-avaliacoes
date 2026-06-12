<?php 
class UsuarioModel {

    // login
    public function __construct(private PDO $pdo) {}
    public function login(string $loginUsuario, string $senhaUsuario): array|false {
        $usuario = $this->buscarPorLogin($loginUsuario);

        // verifica usuário
        if (!$usuario) return false;
        // verifica senha
        if (!password_verify($senhaUsuario, $usuario['senha_usuario'])) return false;

        return $usuario;
    }

        private function buscarPorLogin(string $loginUsuario): array|false {
        $sql = "SELECT id_usuario, nome_usuario, login_usuario, senha_usuario
                FROM usuarios_administrativos
                WHERE login_usuario = :loginUsuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':loginUsuario' => $loginUsuario]);

        return $stmt->fetch();
        }
}
?>