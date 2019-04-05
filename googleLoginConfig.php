<?php
require_once "GoogleAPI/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("1011071193304-2i87qe5fq6o2bsk5b7ka10m0k74l8t7p.apps.googleusercontent.com");
$gClient->setClientSecret("wjEKC1xMND-Ggns8YbOJDu3_");
$gClient->setApplicationName("XMLChatroom");
$gClient->setRedirectUri("http://localhost:8080/XMLChatroom/googleCallback.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
