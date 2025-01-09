<?php
require_once __DIR__ . '/../../src/Database.php';
session_start();

// Sprawdzanie dostępu
if (!in_array($_SESSION['user_role'], ['admin', 'employee'])) {
    echo "Brak dostępu.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $duration = (int) $_POST['duration'];

    if ($name && $description && $duration > 0) {
        $db = new Database();
        $pdo = $db->getPdo();

        $stmt = $pdo->prepare("INSERT INTO services (name, description, category, duration) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $category, $duration]);

        header("Location: service_panel.php");
        exit;
    } else {
        echo "Wypełnij poprawnie wszystkie pola.";
    }
}
?>
