<?php

if(isset($_POST["submit"]))
{
    require_once 'dataBaseHandler.inc.php';
    require_once 'function.inc.php';

    LogOut();

}

else {
    header("location: ../login.php"); //Sends the user back to sign up form
    exit(); //Stops Script from running
}