<?php 
session_start();
//Error message stored in variable
$error = "";
$showLogin = true;

//If the submit button is pressed
if(isset($_POST['submit']))
{
    //If the name entered is not blank
    if($_POST['name'] != "")
    {
        //Take posted name and put it into variable user
        $user = $_POST['name'];
        //Load our XML file containing user list
        $xml = simplexml_load_file('users.xml');
        //Take a count of number of users
        $userList = $xml->user->count();
        
        //Run a for loop to check the posted user's name against the list
        for($i = 0; $i < $userList; $i++)
        {
            //If find a match, redirect to list of chat rooms
            if($xml->user[$i]->name == $user)
            {
                $_SESSION['user'] = $user;
                $showLogin = false;
                header('Location: chatrooms.php');
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
        $error = "Please enter a name";
    }
}
?>

<!-- Login Form  -->
<div id="login-wrapper" <?php if ($showLogin===false){?>style="display:none"<?php } ?>>
<form action="index.php" method="post">
    <h1>Welcome to Jing's XML chat application</h1>
    <h2>Please enter a name:</h2>
    <input type="text" name="name">
    <input type="submit" name="submit" value="Submit">
</form>
<div id="errMsg"><?php echo $error ?></div>
</div>

