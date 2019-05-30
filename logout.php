<?php
require_once 'googleLoginConfig.php';
session_start();
// if (isset($_POST['Logout']))
// {
//     session_destroy();
//     unset($_SESSION['id']);
//     unset($_SESSION['user']);
//     unset($_SESSION['file']);

//     //Logout for google api login
//     unset($_SESSION['access_token']);
//     $gClient->revokeToken();
//     header("location: index.php");
// }

if(isset($_SESSION['id']))
{
    unset($_SESSION['id']);
    unset($_SESSION['user']);
    unset($_SESSION['email']);
    
    //Logout for google api login
    unset($_SESSION['access_token']);
    $gClient->revokeToken();
    
    session_destroy();
    header("location: index.php");
}
else
{
    header("location: index.php");
}
?>