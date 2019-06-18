<?php 
require_once 'googleLoginConfig.php';
session_start();
//Error message stored in variable
$error = "";
$showLogin = true;
$loginURL = $gClient->createAuthUrl();

//If the submit button is pressed
if(isset($_POST['submit']))
{
    //If the name entered is not blank
    if($_POST['name'] != "" && $_POST['password'] != "")
    {
        //Take posted name and put it into variable user
        $user = $_POST['name'];
        //Load our XML file containing user list
        $xml = simplexml_load_file('Users/users.xml');
        //Take a count of number of users
        $userList = $xml->user->count();
        
        //Run a for loop to check the posted user's name against the list
        for($i = 0; $i < $userList; $i++)
        {
            //If find a match, redirect to list of chat rooms
            if($xml->user[$i]->name == $user)
            {
                if(password_verify($_POST['password'], $xml->user[$i]->password))
                {
                    $_SESSION['user'] = $user;
                    $showLogin = false;
                    header('Location: chatrooms.php');
                }
                else
                {
                    $error = "Incorrect password";
                }
            
            }
            //Else set an error message
            else
            {
                $error = "Not a valid user";
            }
        }
        
    }
    else
    {
        $error = "You must enter a name and a password";
    }
}
?>