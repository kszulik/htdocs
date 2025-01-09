<?php
require_once __DIR__ . '/../src/Database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new Database();
    $pdo = $db->getPdo();

    // Pobierz użytkownika po emailu
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Zalogowanie użytkownika
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        echo "Logowanie zakończone sukcesem! Witaj, " . $user['name'] . "!";
    } else {
        echo "Nieprawidłowy email lub hasło.";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
<h1>Logowanie</h1>
<form method="POST" action="login.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Hasło:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Zaloguj się</button>
</form>
</body>
</html>
