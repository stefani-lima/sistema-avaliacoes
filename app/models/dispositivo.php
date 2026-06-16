<?php 

    function buscarDispositivo(PDO $pdo, int $idDispositivo): array|false { // busca id dispositivo e nome setor
        $sql = "SELECT d.id_dispositivo, d.id_setor, d.nome_dispositivo, d.ativo, s.nome_setor
                FROM dispositivos d
                JOIN setores s ON s.id_setor = d.id_setor
                WHERE d.ativo = TRUE
                AND d.id_dispositivo = :idDispositivo";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idDispositivo' => $idDispositivo]);
        return $stmt->fetch();
    }

        function listarDispositivos(PDO $pdo): array {
        $sql = "SELECT d.id_dispositivo, d.id_setor, d.nome_dispositivo, d.ativo, s.nome_setor
                FROM dispositivos d
                JOIN setores s ON s.id_setor = d.id_setor
                WHERE d.ativo = TRUE";

        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>