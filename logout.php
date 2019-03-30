<?php
if (isset($_POST['Logout']))
{
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['user']);
    unset($_SESSION['file']);
    header("location: index.php");
}
?>