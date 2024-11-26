<?php
require 'db.php';

$cakes = $pdo->query("SELECT * FROM cakes")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Bolos</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Catálogo de Bolos</h1>
    <div class="cake-catalog">
        <?php foreach ($cakes as $cake): ?>
            <div class="cake-item">
                <h2><?= htmlspecialchars($cake['name']) ?></h2>
                <img src="<?= htmlspecialchars($cake['image_url']) ?>" alt="<?= htmlspecialchars($cake['name']) ?>" width="200">
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>