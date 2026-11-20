<?php
$host = 'localhost';
$port = '5432';
$dbname = 'projeto_crud';
$user = 'postgres';
$password = 'postgres'; 

$tarefas = [];
$erro = null;

try {

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    
    $stmt = $pdo->query("SELECT id, titulo, descricao, status FROM tarefas ORDER BY id ASC");
    

    $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    
    $erro = "Erro ao conectar ou buscar tarefas: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .erro { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Minhas Tarefas</h1>

    <?php if ($erro): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarefas as $tarefa): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)$tarefa['id']) ?></td>
                        <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
                        <td><?= htmlspecialchars($tarefa['descricao'] ?? '') ?></td>
                        <td><?= htmlspecialchars($tarefa['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>
