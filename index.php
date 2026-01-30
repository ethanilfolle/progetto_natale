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
