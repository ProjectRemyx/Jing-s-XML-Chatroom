<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/chatroom.css">
    <link rel="stylesheet" type="text/css" href="css/chatrooms.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="scripts/refreshChat.js"></script>
    <script src="scripts/submitMessage.js"></script>
</head>
<header>
    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo"><img src="img/trident_logo.png"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php
            if(isset($_SESSION['user']))
            {
                echo "<li class='brand-logo center'>" . "Welcome, " . $_SESSION['user'] . "</li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            }
            else
            {
                echo "<li><a href='index.php'>Login</a></li>";
            }
            ?>
            </ul>
        </div>
    </nav>
</header>