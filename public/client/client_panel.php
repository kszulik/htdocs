<?php
require_once __DIR__ . '/../../src/Database.php';
session_start();
if ($_SESSION['user_role'] !== 'client') {
    echo "Brak dostępu. Ta strona jest dostępna tylko dla klientów.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Klienta</title>
</head>
<body>
<h1>Panel Klienta</h1>
<ul>
    <li><a href="book_appointment.php">Zarezerwuj wizytę</a></li>
    <li><a href="my_appointments.php">Moje rezerwacje</a></li>
</ul>
</body>
</html>
