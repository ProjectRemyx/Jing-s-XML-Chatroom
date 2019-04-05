<?php
//Start session to access session variables
session_start();
//Load specific chatroom
$chatroom = simplexml_load_file($_SESSION['file']);

        //Get chatroom log
        foreach($chatroom->chat->user as $user)
        {
            echo $user->name . " ". "(";
            echo $user->message->submissionTime . ")" . ": ";
            echo $user->message->text;
            echo "</br>";
        }
    