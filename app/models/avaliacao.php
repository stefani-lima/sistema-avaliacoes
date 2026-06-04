  <?php

    function salvarRespostas(PDO $pdo, int $idSetor, int $idPergunta, int $idDispositivo, int  $resposta, ?string $resOpcional): bool {
        $sql = "INSERT INTO avaliacoes (id_setor, id_pergunta, id_dispositivo, resposta, feedback_textual) VALUES (:idSetor, :idPergunta, :idDispositivo, :resposta, :resOpcional)";

        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
          ':idSetor' => $idSetor,
          ':idPergunta' => $idPergunta,
          ':idDispositivo' => $idDispositivo,
          ':resposta' => $resposta,
          ':resOpcional' => $resOpcional,
        ]); 
    }

?>