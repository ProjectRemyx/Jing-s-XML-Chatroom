//Reload chat every second after DOM loaded
$(document).ready(function(){
//Every half a second this function is run 
    setInterval(function(){
        //In our div with id="chats" load our php file that renders chat log
        $('#chats').load('chatroomText.php');
     }, 250)
    });