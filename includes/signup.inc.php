<?php

if(isset($_POST["submit"]))
{

    $name = $_POST["name"];
    $email = $_POST["email"];
    $userID = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeatPassword"];

    require_once 'dataBaseHandler.inc.php';
    require_once 'function.inc.php';

    if(emptyInputSignup($name,$email,$userID,$password,$passwordRepeat) !== false) //If any fields are empty
    {
        header("location: ../signup.php?error=emptyinput"); //Sends the user back to sign up form
        exit(); //Stops Script from running
    }

    if(invalidUid($userID) !== false) //If any fields are empty
    {
        header("location: ../signup.php?error=invalidUid"); //Sends the user back to sign up form
        exit(); //Stops Script from running
    }
    if(invalidEmail($email) !== false) //If any fields are empty
    {
        header("location: ../signup.php?error=invalidEmail"); //Sends the user back to sign up form
        exit(); //Stops Script from running
    }
    if(passwordsMatch($password,$passwordRepeat) !== false) //If any fields are empty
    {
        header("location: ../signup.php?error=passwordsDontMatch"); //Sends the user back to sign up form
        exit(); //Stops Script from running
    }
    if(uidExists($conn,$userID,$email) !== false) //If any fields are empty
    {
        header("location: ../signup.php?error=usernameTaken"); //Sends the user back to sign up form
        exit(); //Stops Script from running
    }

    createUser($conn,$name,$userID,$email,$password);

}
else{
    header("location: ../signup.php"); //Sends the user back to sign up form
    exit(); //Stops script from running
}