  <?php
    function buscarPerguntasPorOrdem(PDO $pdo): array {
        $sql = "SELECT id_pergunta, texto_pergunta, ordem_pergunta 
                FROM perguntas 
                WHERE ativo = TRUE
                ORDER BY ordem_pergunta";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
?>