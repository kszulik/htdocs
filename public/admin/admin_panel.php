<?php
session_start();
if ($_SESSION['user_role'] !== 'admin') {
    echo "Brak dostępu. Ta strona jest dostępna tylko dla administratorów.";
    exit;
}

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
    <title>Panel Administratora</title>
</head>
<body>
<h1>Panel Administratora</h1>
<p>Zalogowany jako: <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></p>

<ul>
    <li><a href="manage_users.php">Zarządzaj użytkownikami</a></li>
    <li><a href="../services/service_panel.php">Zarządzaj usługami</a></li>
    <li><a href="manage_appointments.php">Zarządzaj rezerwacjami</a></li>
</ul>

<!-- Przycisk Wyloguj -->
<form method="POST" action="">
    <button type="submit" name="logout">Wyloguj</button>
</form>
</body>
</html>
