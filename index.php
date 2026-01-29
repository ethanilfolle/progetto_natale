<?php
session_start();

if (!isset($_SESSION["utente_id"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Benvenuto <?= $_SESSION["username"] ?></h1>

<a href="logout.php">Logout</a>

</body>
</html>
