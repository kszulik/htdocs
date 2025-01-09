<?php
require_once __DIR__ . '/../src/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashowanie hasła

    $db = new Database();
    $pdo = $db->getPdo();

    // Sprawdź, czy email już istnieje
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo "Ten email jest już zarejestrowany.";
    } else {
        // Wstaw nowego użytkownika
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $password])) {
            echo "Rejestracja zakończona sukcesem!";
        } else {
            echo "Wystąpił błąd podczas rejestracji.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
<h1>Rejestracja</h1>
<form method="POST" action="register.php">
    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Hasło:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Zarejestruj się</button>
</form>
</body>
</html>
