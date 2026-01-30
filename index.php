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
        background: #f4f6fb;
        padding: 40px;
    }

    .container {
        max-width: 500px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 10px;
        color: #444;
    }

    .logout {
        text-align: center;
        margin-bottom: 20px;
    }

    .logout a {
        color: #6a85f1;
        text-decoration: none;
        font-weight: bold;
    }

    form {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    input[type="text"] {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    button {
        padding: 10px 15px;
        background: #6a85f1;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background: #5a73d8;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        padding: 10px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
    }

    .done {
        color: green;
        font-weight: bold;
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
