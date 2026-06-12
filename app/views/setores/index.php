<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setores</title>
</head>
<body>
    <header>
        <h1>Lista de setores</h1>
    </header>

    <main>
        <?php if (!empty($setores)): ?>
    
        <table>
            <tr>
                <th>ID</th>
                <th>Nome do Setor</th>
                <th>Ativo</th>
            </tr>
            <?php foreach ($setores as $setor): ?>
                <tr>
                    <td><?= htmlspecialchars($setor['id_setor']) ?></td>
                    <td><?= htmlspecialchars($setor['nome_setor']) ?></td>
                    <td><?= htmlspecialchars($setor['ativo'] ? 'Sim' : 'Não') ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

        <?php else: ?>

            <p>Sem resultados encontrados.</p>

        <?php endif; ?>


    </main>

</body>
</html>