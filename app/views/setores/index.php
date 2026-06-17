<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setores</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <nav>
        <div class="menu">
            <ul>
                <li><a href="index.php?page=dispositivos">Dispositivos</a></li>
                <li><a href="index.php?page=avaliacao">Avaliação</a></li>
                <li><a href="index.php?page=perguntas">Perguntas</a></li>
                <li><a href="index.php?page=setores">Setores</a></li>
                <li><a href="index.php?page=logout">Sair</a></li>
            </ul>
        </div>
    </nav>

    <div class="card setores">
        
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
                        <td><?= $setor['ativo'] ? '<span class="badge-sim">Sim</span>' : '<span class="badge-nao">Não</span>' ?></td>
                    </tr>
                <?php endforeach; ?>

            </table>

            <?php else: ?>

                <p>Sem resultados encontrados.</p>

            <?php endif; ?>


        </main>
    </div>

</body>
</html>