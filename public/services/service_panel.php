<?php
session_start();
require_once __DIR__ . '/../../src/Database.php';

// Sprawdzanie ról
if (!in_array($_SESSION['user_role'], ['admin', 'employee'])) {
    echo "Brak dostepu. Ta strona jest dostepna tylko dla administratorow i pracownikow.";
    exit;
}

$db = new Database();
$pdo = $db->getPdo();

// Pobieranie usług
if ($_SESSION['user_role'] === 'employee') {
    // Pracownik widzi tylko swoje uslugi
    $stmt = $pdo->prepare("
        SELECT s.id, s.name, s.description, s.category, s.duration, es.price 
        FROM services s
        JOIN employee_services es ON s.id = es.service_id
        WHERE es.employee_id = ?
    ");
    $stmt->execute([$_SESSION['user_id']]);
} else {
    // Administrator widzi wszystkie uslugi
    $stmt = $pdo->prepare("
        SELECT s.id, s.name, s.description, s.category, s.duration, es.price, u.name AS employee_name 
        FROM services s
        LEFT JOIN employee_services es ON s.id = es.service_id
        LEFT JOIN users u ON es.employee_id = u.id
    ");
    $stmt->execute();
}
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Zarządzania Usługami</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .form-container, .table-container {
            width: 48%;
        }
    </style>
</head>
<body>
<h1>Panel Zarządzania Usługami</h1>
<p>Zalogowany jako: <strong><?= htmlspecialchars($_SESSION['user_name']) ?> (<?= htmlspecialchars($_SESSION['user_role']) ?>)</strong></p>

<div class="container">
    <!-- Formularz dodawania nowej usługi -->
    <div class="form-container">
        <h2>Dodaj Usługę</h2>
        <form method="POST" action="add_service.php">
            <label for="name">Nazwa:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="description">Opis:</label>
            <textarea id="description" name="description" required></textarea><br><br>

            <label for="category">Kategoria:</label>
            <input type="text" id="category" name="category"><br><br>

            <label for="duration">Czas trwania (minuty):</label>
            <input type="number" id="duration" name="duration" required><br><br>

            <label for="price">Cena (zł):</label>
            <input type="number" step="0.01" id="price" name="price" required><br><br>

            <button type="submit">Dodaj Usługę</button>
        </form>
    </div>

    <!-- Tabela z usługami -->
    <div class="table-container">
        <h2>Lista Usług</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Kategoria</th>
                <th>Czas trwania (min)</th>
                <th>Cena</th>
                <?php if ($_SESSION['user_role'] === 'admin'): ?>
                    <th>Pracownik</th>
                <?php endif; ?>
                <th>Akcje</th>
            </tr>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= htmlspecialchars($service['id']) ?></td>
                    <td><?= htmlspecialchars($service['name']) ?></td>
                    <td><?= htmlspecialchars($service['description']) ?></td>
                    <td><?= htmlspecialchars($service['category']) ?></td>
                    <td><?= htmlspecialchars($service['duration']) ?></td>
                    <td><?= htmlspecialchars($service['price'] ?? '-') ?></td>
                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                        <td><?= htmlspecialchars($service['employee_name'] ?? 'Nieprzypisany') ?></td>
                    <?php endif; ?>
                    <td>
                        <a href="edit_service.php?id=<?= $service['id'] ?>">Edytuj</a>
                        <a href="delete_service.php?id=<?= $service['id'] ?>" onclick="return confirm('Czy na pewno chcesz usunąć tę usługę?')">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>