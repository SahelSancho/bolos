<?php
require 'db.php';

$cakes = $pdo->query("SELECT * FROM cakes")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Bolos</title>
    <link rel="stylesheet" href="assets/index.css">
</head>
<body>
    <header>
        <h1>Catálogo de Bolos</h1>
    </header>

    <main>
        <div class="cake-catalog">
            <?php foreach ($cakes as $cake): ?>
                <div class="cake-item">
                    <img src="<?= htmlspecialchars($cake['image_url']) ?>" alt="<?= htmlspecialchars($cake['name']) ?>">
                    <h3><?= htmlspecialchars($cake['name']) ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date('Y'); ?> Catálogo de Bolos. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
