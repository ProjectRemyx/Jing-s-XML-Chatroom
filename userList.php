<?php
$xml = simplexml_load_file('Users/users.xml');

    foreach($xml->user as $user)
    {
        echo '<ul class="collection">';
        echo '<li class="collection-item">' . '<h6>' . $user->name . '</h6></li>';
        echo "</br>";                    
        echo '</ul>';
    }
?>