<?php
session_start();
//This code has been moved to setSession.php
// $_SESSION['id']= $_POST['id'];
// $_SESSION['file'] = "chatroom".$_SESSION['id'].".xml";

$chatroom = simplexml_load_file($_SESSION['file']);
$messageCount = $chatroom->chat->user->count();
// echo $messageCount;

//Submit a chat message
if(isset($_REQUEST['submitMessage']))
{
$xml = new DOMDocument("1.0", "UTF-8");
$xml->load($_SESSION['file']);

//Specify the root of the XML doc
$root = $xml->getElementsByTagName("chat")->item(0);

//Create our child of root
$user = $xml->createElement("user");
//Give our user element an id
$userAttribute = $xml->createAttribute('id');

//Value for the created attribute
$userAttribute->value = $_SESSION['id'];
//Append to the element
$user->appendChild($userAttribute);
//Append to the document
$root->appendChild($user);

//Create our user's elements
$name = $xml->createElement("name", $_SESSION['user']);
$message = $xml->createElement("message");
$submissionTime = $xml->createElement("submissionTime", date("M,d,Y h:i:s A"));
$text = $xml->createElement("text", $_POST['messages']);

//Add child elements to users
$user->appendChild($name);
$message->appendChild($submissionTime);
$message->appendChild($text);
$user->appendChild($message);

//Save the file
$xml->save($_SESSION['file']);
header('Location: chatroom.php');
}
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
            echo $user->name . " ". "(";
            echo $user->message->submissionTime . ")" . ": ";
            echo $user->message->text;
            echo "</br>";
        }
        ?>
      </div>
</div>
<form action="chatroom.php" method="post">
    <input type="text" name="messages" id="message">
    <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>"/>    
    <input type="hidden" name="file" value="<?php echo $_SESSION['file']?>"/>
    <button type="submit" name="submitMessage" id="submitButton">Send</button>
</form>
<form action="chatrooms.php">
<button type="submit" name="back">Back to chatroom list</button>
</form>

</body>
</html>