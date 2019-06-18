<?php
$xml = simplexml_load_file('Chatrooms/chatroomsList.xml');

foreach($xml->chatroom as $item)
{  
    echo '<div class="row">';
    echo '<div class="col s12 m6">';
    echo '<div class="card blue-grey darken-1">';
    echo '<div class="card-content white-text">';
    echo '<span class="card-title">'. $item['id'] . ". " . $item->chatroomName . '</span>';
    echo '<p class="chatroom-description">' . $item->chatroomDescription . '</p>';
    echo '</div>';
    echo '<div class="card-action">';
    echo '<form action="setSession.php" method="post">';
    echo '<input type="hidden" name="id" value="'.$item['id'].'"/>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="submit">Enter
            <i class="material-icons right">send</i>
            </button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';                
}
?>