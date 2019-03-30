<?php
session_start();

//Separation of concerns, set our session variables in this file
//So that reloading chatroom.php does not throw variable errors due to $_POST
$_SESSION['id']= $_POST['id'];
$_SESSION['file'] = "chatroom".$_SESSION['id'].".xml";
header('Location: chatroom.php');
