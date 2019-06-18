<?php
//Start the session
session_start();

//Load our file
$chatroom = simplexml_load_file($_SESSION['file']);
$messageCount = $chatroom->chat->user->count();

//Code is run when submit button is pressed
// if(isset($_REQUEST['submitMessage']))
if ($_SERVER["REQUEST_METHOD"] == "POST")
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
// header('Location: chatroom.php');
}
?>