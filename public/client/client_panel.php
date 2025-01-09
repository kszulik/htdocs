<?php
session_start();
if ($_SESSION['user_role'] !== 'client') {
    echo "Brak dostępu. Ta strona jest dostępna tylko dla klientów.";
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
    <title>Panel Klienta</title>
</head>
<body>
<h1>Panel Klienta</h1>
<p>Zalogowany jako: <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></p>

<ul>
    <li><a href="book_appointment.php">Zarezerwuj wizytę</a></li>
    <li><a href="my_appointments.php">Moje rezerwacje</a></li>
</ul>

<!-- Przycisk "Wyloguj" -->
<form method="POST" action="">
    <button type="submit" name="logout">Wyloguj</button>
</form>
</body>
</html>
