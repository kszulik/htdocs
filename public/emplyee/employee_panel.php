<?php
require_once __DIR__ . '/../../src/Database.php';
session_start();
if ($_SESSION['user_role'] !== 'employee') {
    echo "Brak dostępu. Ta strona jest dostępna tylko dla pracowników.";
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
<ul>
    <li><a href="view_schedule.php">Zobacz grafik</a></li>
    <li><a href="view_appointments.php">Zobacz rezerwacje</a></li>
</ul>
</body>
</html>
