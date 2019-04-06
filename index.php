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
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<?php
include 'header.php';
?>
<body>
    <main>
        <div class="row">
            <div id="intro">
                <div class="col s12"><span class="flow-text" id="intro-banner">Jing's Chatroom</span></div>
            </div>
        </div>
        <div class="row">
            <!-- Login Form  -->
            <div class="col s5 push-s7" id="login-wrapper" <?php if ($showLogin===false){?>style="display:none"
                <?php } ?>>
                <form action="index.php" method="post">
                    <div id="login-title"><span class="flow-text">Welcome!</span></div>
                    <label for="name">Name</label>
                    <input type="text" name="name">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <div id="error-message"><?php echo $error ?></div>
                    <div id="submitContainer">
                        <!-- <input type="submit" name="submit" value="Login"> -->
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Login
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <input type="button" class="btn red lighten-1"
                        onclick="window.location = '<?php echo $loginURL ?>';" id="googleSignInBtn"
                        value="Google Sign-in">
                </form>
            </div>
            <div class="col s7 pull-s5">
                <img src="img/PikachuRaichu.jpg" alt="Raichu and Pikachu" id="login-graphic">

            </div>
        </div>
    </main>
</body>
<?php
include 'footer.php';
?>
</html>