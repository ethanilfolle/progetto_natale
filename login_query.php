<?php

$sql = "SELECT * FROM utenti 
        WHERE username = '$username'
        AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    $_SESSION["utente_id"] = $row["id"];
    $_SESSION["username"] = $row["username"];

    header("Location: index.php");
    exit;
}
else {
    echo "Credenziali errate";
}
