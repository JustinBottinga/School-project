<?php
include_once('connection.php');

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $pdo->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $user = $query->fetch();

    if ($user !== false) {
        header("Location: index.php");
    } else {
        echo "";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <form method="POST">
            <h2>Login</h2>
            <label>Username:</label>
            <input class="loginInput" type="text" placeholder="Username" name="username" required>

            <br><br>

            <label>Password:</label>
            <input class="loginInput" type="password" placeholder="Password" name="password" required>

            <br><br>

            <button name="login">Login</button>

            <hr />
            <br>

            <a href="">forgot password?</a>

            <br>
            <br>

            <div class="register"><a href="register.php" id="register">Register</a></div>
        </form>
    </div>
</body>
</html>