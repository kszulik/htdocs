<?php
require_once __DIR__ . '/../src/Database.php';

$errors = []; // Tablica na błędy formularza

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Walidacja danych
    if (empty($name)) {
        $errors[] = "Imię jest wymagane.";
    }

    if (empty($email)) {
        $errors[] = "Email jest wymagany.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Podany email jest nieprawidłowy.";
    }

    if (empty($password)) {
        $errors[] = "Hasło jest wymagane.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Hasło musi mieć co najmniej 6 znaków.";
    }

    if ($password !== $password_confirm) {
        $errors[] = "Hasła nie są zgodne.";
    }

    // Jeśli nie ma błędów, spróbuj zarejestrować użytkownika
    if (empty($errors)) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT); // Hashowanie hasła

        $db = new Database();
        $pdo = $db->getPdo();

        // Sprawdź, czy email już istnieje
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $errors[] = "Ten email jest już zarejestrowany.";
        } else {
            // Wstaw nowego użytkownika
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $password_hashed])) {
                // Przekierowanie do strony logowania po pomyślnej rejestracji
                header("Location: login.php");
                exit;
            } else {
                $errors[] = "Wystąpił błąd podczas rejestracji.";
            }
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

<!-- Wyświetlanie błędów -->
<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="register.php">
    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required><br><br>

    <label for="password">Hasło:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="password_confirm">Potwierdź hasło:</label>
    <input type="password" id="password_confirm" name="password_confirm" required><br><br>

    <button type="submit">Zarejestruj się</button>
</form>
</body>
</html>
