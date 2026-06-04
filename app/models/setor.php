<?php 
    function listarSetores(PDO $pdo): array {
        $sql = "SELECT id_setor, nome_setor 
            FROM setores 
            WHERE ativo = TRUE";

        $result = $pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function editarSetor(PDO $pdo, string $nomeSetor, int $idSetor) {
        $sql = "UPDATE setores
                SET nome_setor = ?
                WHERE id_setor = ?";

        $stmt = $pdo->prepare($sql);
        $stmt ->execute([$nomeSetor, $idSetor]);
    }
?>