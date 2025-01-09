<?php
session_start();
if ($_SESSION['user_role'] !== 'admin') {
    echo "Brak dostępu. Ta strona jest dostępna tylko dla administratorów.";
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
<ul>
    <li><a href="manage_users.php">Zarządzaj użytkownikami</a></li>
    <li><a href="manage_services.php">Zarządzaj usługami</a></li>
    <li><a href="manage_appointments.php">Zarządzaj rezerwacjami</a></li>
</ul>
</body>
</html>
