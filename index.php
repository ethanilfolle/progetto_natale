<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "todo_app");

if (!isset($_SESSION["utente_id"])) {
    header("Location: login.php");
    exit;
}

$id_utente = $_SESSION["utente_id"];

if (isset($_POST["nuova_task"])) {
    $testo = $_POST["nuova_task"];
    mysqli_query($conn, "INSERT INTO attivita (testo, id_utente) VALUES ('$testo', $id_utente)");
}

$risultato = mysqli_query($conn, "SELECT * FROM attivita WHERE id_utente = $id_utente");
?>

<!DOCTYPE html>
<html>
<body>
<head>
<style>
    body {
        font-family: Arial;
        background: #eee;
    }

    form {
        width: 200px;
        margin: 100px auto;
        padding: 10px;
        background: white;
        border: 1px solid #ccc;
    }

    input, button {
        width: 100%;
        margin-top: 5px;
    }
</style>
</head>

    <h1>Ciao <?= $_SESSION["username"] ?></h1>
    <a href="logout.php">Logout</a>

    <form method="POST">
        <input type="text" name="nuova_task" required>
        <button type="submit">Aggiungi</button>
    </form>

    <ul>
        <?php while($row = mysqli_fetch_assoc($risultato)): ?>
            <li>
                <?= $row["testo"] ?> 
                <?php if($row["completata"]) echo "(Fatto)"; ?>
            </li>
        <?php endwhile; ?>
    </ul>

</body>
</html>
