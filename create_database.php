<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cake_catalog';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS $database");
    echo "Banco de dados '$database' criado com sucesso.<br>";

    $pdo->exec("USE $database");

    $pdo->exec("CREATE TABLE IF NOT EXISTS employees (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )");
    echo "Tabela 'employees' criada com sucesso.<br>";

    $pdo->exec("CREATE TABLE IF NOT EXISTS cakes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        image_url VARCHAR(255) NOT NULL
    )");
    echo "Tabela 'cakes' criada com sucesso.<br>";

} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>