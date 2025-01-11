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
    $price = (float) $_POST['price']; // Obsługa ceny

    if ($name && $description && $duration > 0 && $price > 0) {
        $db = new Database();
        $pdo = $db->getPdo();

        // Dodaj usługę
        $stmt = $pdo->prepare("INSERT INTO services (name, description, category, duration) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $category, $duration]);

        // Pobierz ID nowo dodanej usługi
        $serviceId = $pdo->lastInsertId();

        // Przypisz cenę i powiąż usługę z użytkownikiem (jeśli to pracownik)
        if ($_SESSION['user_role'] === 'employee') {
            $stmt = $pdo->prepare("INSERT INTO employee_services (employee_id, service_id, price) VALUES (?, ?, ?)");
            $stmt->execute([$_SESSION['user_id'], $serviceId, $price]);
        }

        header("Location: service_panel.php");
        exit;
    } else {
        echo "Wypełnij poprawnie wszystkie pola.";
    }
}

?>
