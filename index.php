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
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #6a85f1, #a777e3);
    }

    form {
        width: 280px;
        margin: 120px auto;
        padding: 25px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        text-align: center;
    }

    h3 {
        margin-bottom: 20px;
        color: #444;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        text-align: center;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #6a85f1;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        background: #5a73d8;
    }
</style>
</head>

<body>

<form method="POST">
    <h3>Login</h3>
    <input type="text" name="username" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button>Login</button>
</form>

</body>
</html>
