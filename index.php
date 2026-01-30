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
        font-family: Arial, sans-serif;
        background: #f4f4f4;
    }

    form {
        width: 260px;
        margin: 120px auto;
        padding: 20px;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }

    h3 {
        text-align: center;
        margin-bottom: 15px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        width: 100%;
        padding: 8px;
        background: #333;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background: #555;
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
