<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
            text-align: center;
        }

        a {
            display: block;
            text-align: right;
            margin-bottom: 15px;
            color: #e74c3c;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 15px;
            border: none;
            background: #3498db;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #2980b9;
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

        li:last-child {
            border-bottom: none;
        }

        .done {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Ciao <?= $_SESSION["username"] ?></h1>
    <a href="logout.php">Logout</a>

    <form method="POST">
        <input type="text" name="nuova_task" placeholder="Nuova attività..." required>
        <button type="submit">Aggiungi</button>
    </form>

    <ul>
        <?php while($row = mysqli_fetch_assoc($risultato)): ?>
            <li>
                <?= $row["testo"] ?>
                <?php if($row["completata"]) echo '<span class="done">Fatto</span>'; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

</body>
</html>
