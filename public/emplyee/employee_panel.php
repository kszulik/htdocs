<?php
session_start();
if ($_SESSION['user_role'] !== 'employee') {
    echo "Brak dostępu. Ta strona jest dostępna tylko dla pracowników.";
    exit;
}

// Wylogowanie użytkownika
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Pracownika</title>
</head>
<body>
<h1>Panel Pracownika</h1>
<p>Zalogowany jako: <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></p>

<ul>
    <li><a href="view_schedule.php">Zobacz grafik</a></li>
    <li><a href="view_appointments.php">Zobacz rezerwacje</a></li>
</ul>

<!-- Przycisk "Wyloguj" -->
<form method="POST" action="">
    <button type="submit" name="logout">Wyloguj</button>
</form>
</body>
</html>
