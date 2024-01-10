<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burple</title>
    <link rel="stylesheet" href="main.css">
    <script src="twitchAPI.js" defer></script>
</head>

<body>
    
    <nav class="navbar">
        <div class="right">
            <!-- als er niet is ingelogd, laat een login en register knop zien  -->
            <?php
            if (!isset($_SESSION["User"])) {
            ?>
            <div class="login"><a class="loginbtn" href="login.php">Login</a></div>
            <div class="login"><a class="loginbtn" href="register.php">Register</a></div>
            <?php
            } else {
                ?>
                <!-- hier komt de username  -->
                <?php
            }
            ?>
    </div>
    </nav>
    
    <div class="container">
        <div id="topGames"></div>
    </div>

    <footer>
        <div>
            <p>E-mail: burple@gmail.com</p>
            <p>Business phone number: 0693274837</p>
        </div>
    </footer>
</body>

</html>