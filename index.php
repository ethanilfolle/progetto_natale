<?php
session_start();
include "db.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    include "login_query.php";
}
?>

<!DOCTYPE html>
<html>
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
<body>

<h2>Login</h2>

<form method="POST">
    <input type="text" name="username">
    <br><br>
    <input type="password" name="password">
    <br><br>
    <button>Login</button>
</form>

</body>
</html>
