<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/chatroom.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="scripts/refreshChat.js"></script>
    <script src="scripts/submitMessage.js"></script>    
</head>
<?php
include 'header.php';
include 'sendMessage.php';
?>
<body>
    <div id="chatroomContainer">
        <div id="chatroom">
            <div id="chats">
                <?php
                // Initial render of the chatroom
                foreach($chatroom->chat->user as $user)
                {
                    echo $user->name . " ". "(";
                    echo $user->message->submissionTime . ")" . ": ";
                    echo $user->message->text;
                    echo "</br>";
                }
                ?>
            </div>
        </div>
            <form action='chatroom.php' method='post' id="submitMessageForm">
            <input type="text" name="messages" id="message">
            <input type="hidden" name="id" id="sessionId" value="<?php echo $_SESSION['id']?>" />
            <input type="hidden" name="file" id="sessionFile" value="<?php echo $_SESSION['file']?>" />
            <button type="submit" name="submitMessage" id="submitButton">Send</button>
        </form>
        <form action="chatrooms.php">
            <button type="submit" name="back">Back to chatroom list</button>
        </form>
    </div>
</body>
<?php
include 'footer.php';
?>
</html>