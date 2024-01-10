<?php

session_start();
$database = new PDO('mysql:host=localhost;dbname=BurpleDB', 'bit_academy', 'bit_academy');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $pdo->query("SELECT * FROM 'users' WHERE username = '$username' AND password = '$password'");
    $user = $query->fetch();

    if ($user !== false) {
        header("Location: index.php");
    }
}




?>