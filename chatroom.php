<?php
$id = $_POST['id'];

$file = "chatroom".$id.".xml";
$chatroom = simplexml_load_file($file);
$messageCount = $chatroom->chat->user->count();
// echo $messageCount;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div id="chatroom">
      <div id="chats">
        <?php
        foreach($chatroom->chat->user as $user)
        {
            echo "</br>";
            echo $user->name;
            echo "</br>";
            echo $user->message->submissionTime;
            echo "</br>";
            echo $user->message->text;
            echo "</br>";
        }
        ?>
      </div>
</div>
<form>
    <input type="text" name="messages" id="message">
    <button type="submit" id="submitButton">Send</button>
</form>

</body>
</html>