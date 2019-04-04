<?php
session_start();
$xml = simplexml_load_file('Chatrooms/chatroomsList.xml');

foreach($xml->chatroom as $item)
{  
    echo '<h1>' . $item['id'] . ". " . $item->chatroomName . '</h1>';
    echo '<h2>' . $item->chatroomDescription . '</h2>';
    echo '<form action="setSession.php" method="post">';
    echo '<input type="hidden" name="id" value="'.$item['id'].'"/>';
    echo '<input type="submit" name="submit" value="Enter">';
    echo '</form>';
    
}

?>

<form action="logout.php" method="post">
<div><label>Done Chatting?</label></div>
<button type="submit" name="Logout">Logout</button>
</form>