<?php
require_once __DIR__ . '/../src/Database.php';
session_start();

$db = new Database();
echo "Połączenie z bazą danych działa!";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon kosmetyczny</title>
</head>
<body>
<h1>Witamy w naszym salonie kosmetycznym!</h1>
<p>Więcej informacji znajdziesz wkrótce.</p>

<!-- Przycisk "Moje konto" -->
<form method="POST" action="">
    <button type="submit" name="my_account">Moje konto</button>
</form>

<?php
if (isset($_POST['my_account'])) {
    // Sprawdzenie, czy ktoś jest zalogowany
    if (isset($_SESSION['user_role'])) {
        // Przekierowanie do odpowiedniego panelu
        switch ($_SESSION['user_role']) {
            case 'admin':
                header("Location: admin/admin_panel.php");
                break;
            case 'employee':
                header("Location: employee/employee_panel.php");
                break;
            case 'client':
                header("Location: client/client_panel.php");
                break;
        }
    } else {
        // Przekierowanie do logowania, jeśli nikt nie jest zalogowany
        header("Location: login.php");
    }
    exit;
}
?>
</body>
</html>
