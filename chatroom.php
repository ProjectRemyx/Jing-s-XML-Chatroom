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
                    echo '<ul class="collection with-header">';
                    echo '<li class="collection-header"><h5>'. $user->name . '</h5>' . " " . "(" . $user->message->submissionTime . ")" . ":" . '</li>';
                    echo '<li class="collection-item">' . '<h6>' . $user->message->text . '</h6></li>';
                    echo "</br>";                    
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
        <div id="userList">
            <?php
            include 'userList.php';
            ?>
        </div>
        <form action='chatroom.php' method='post' id="submitMessageForm">
            <div class="input-field col s6">
                <textarea id="message" name="messages" class="materialize-textarea"></textarea>
                <label for="textarea1">Type your message here.</label>
                <button id="sendButton" class="btn waves-effect waves-light" type="submit" name="submitMessage">Send
                <i class="material-icons right">send</i>
                <!-- <input type="text" name="messages" id="message">
                <label for="messages">Type your message here.</label> -->
            </div>
            <input type="hidden" name="id" id="sessionId" value="<?php echo $_SESSION['id']?>" />
            <input type="hidden" name="file" id="sessionFile" value="<?php echo $_SESSION['file']?>" />
            </button>
        </form>
        <div id="backButtonContainer">
        <button class="btn waves-effect waves-light" onclick="window.location.href='chatrooms.php';">Back to list
            <i class="material-icons left">arrow_back</i>
        </button>
        </div>
    </div>
</body>
<?php
include 'footer.php';
?>

</html>