<?php
//Start session to access session variables
session_start();
//Load specific chatroom
$chatroom = simplexml_load_file($_SESSION['file']);

        //Get chatroom log
        foreach($chatroom->chat->user as $user)
        {
            // echo $user->name . " ". "(";
            // echo $user->message->submissionTime . ")" . ": ";
            // echo $user->message->text;
            // echo "</br>";
            echo '<ul class="collection with-header">';
            echo '<li class="collection-header"><h5>'. $user->name . '</h5>' . " " . "(" . $user->message->submissionTime . ")" . ":" . '</li>';
            echo '<li class="collection-item">' . '<h6>' . $user->message->text . '</h6></li>';
            echo "</br>";                    
            echo '</ul>';
        }
    