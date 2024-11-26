<?php
require 'db.php';
session_start();

if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit;
}

// Cadastro de bolos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['image_url'])) {
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];

    if (filter_var($image_url, FILTER_VALIDATE_URL)) {
        $stmt = $pdo->prepare("INSERT INTO cakes (name, image_url) VALUES (?, ?)");
        $stmt->execute([$name, $image_url]);
    } else {
        echo "URL da imagem inválida.";
    }
}

// Exclusão de bolos
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM cakes WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
}

$cakes = $pdo->query("SELECT * FROM cakes")->fetchAll();
?>

<link rel="stylesheet" href="assets/admin.css">

<h1>Administração de Bolos</h1>

<form method="post">
    Nome do Bolo: <input type="text" name="name" required>
    URL da Imagem: <input type="text" name="image_url" required>
    <button type="submit">Cadastrar Bolo</button>
</form>

<h2>Lista de Bolos</h2>
<ul>
    <?php foreach ($cakes as $cake): ?>
        <li>
            <?= htmlspecialchars($cake['name']) ?> - 
            <a href="<?= htmlspecialchars($cake['image_url']) ?>" target="_blank">Imagem</a> - 
            <a href="?delete=<?= $cake['id'] ?>">Excluir</a>
        </li>
    <?php endforeach; ?>
</ul>

<a href="logout.php">Sair</a>