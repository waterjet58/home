<?php

if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'dataBaseHandler.inc.php';
    require_once 'function.inc.php';

    if(emptyInputLogin($username,$password) !== false) //If any fields are empty
    {
        header("location: ../login.php?error=emptyinput"); //Sends the user back to sign up form
        exit(); //Stops Script from running
    }

    loginUser($conn, $username,$password);

}

else {
    header("location: ../login.php"); //Sends the user back to sign up form
    exit(); //Stops Script from running
}