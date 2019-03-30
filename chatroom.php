<?php
$id = $_POST['id'];

$file = "chatroom".$id.".xml";
$chatroom = simplexml_load_file($file);
$messageCount = $chatroom->chat->user->count();
// echo $messageCount;

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
