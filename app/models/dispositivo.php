<?php 

    function buscarDispositivo(PDO $pdo, int $idDispositivo) { // busca id dispositivo e nome setor
        $sql = "SELECT d.id_dispositivo, d.id_setor, d.nome_dispositivo, s.nome_setor
                FROM dispositivos d
                JOIN setores s ON s.id_setor = d.id_setor
                WHERE d.ativo = TRUE
                AND d.id_dispositivo = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $idDispositivo]);
        return $stmt->fetch();
    }