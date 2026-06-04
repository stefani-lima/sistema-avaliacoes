  <?php
  function buscarPerguntas(PDO $pdo): array {
        $sql = "SELECT id_pergunta, texto_pergunta, ativo 
                FROM perguntas 
                WHERE ativo = TRUE";

        $result = $pdo->query($sql);
        return $result->fetchAll();
  }
?>