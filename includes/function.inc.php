<?php

function emptyInputSignup($name,$email,$userID,$password,$passwordRepeat)
{
    $results;
    if(empty($name) || empty($email) || empty($userID) || empty($password) || empty($passwordRepeat)) 
    {
        $results = true;
    }
    else
    {
        $results = false;
    }
    return $results;
}

function emptyInputLogin($username,$password)
{
    $results;
    if(empty($username) || empty($password)) 
    {
        $results = true;
    }
    else
    {
        $results = false;
    }
    return $results;
}

function invalidUid($userID)
{
    $results;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$userID))
    {
        $results = true;
    }
    else
    {
        $results = false;
    }

    return $results;
}

function invalidEmail($email)
{
    $results;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $results = true;
    }
    else{
        $results = false;
    }

    return $results;
}

function passwordsMatch($password,$passwordRepeat)
{
    $results;
    if($password !== $passwordRepeat)
    {
        $results = true;
    }
    else 
    {
        $results = false;
    }

    return $results;
}

function uidExists($conn,$userID,$email)
{
    $results;
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $userID, $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultsData))
    {  
        return $row;
    }
    else {
        $results = false;
        return $results;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$userID,$email,$password)
{
    $sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPass) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $userID, $hasedPassword);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../login.php?success=created");

}

function loginUser($conn, $username, $password)
{
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false)
    {
        header("location: ../login.php?error=invalidUid");
        exit();
    }
    
    $passHashed = $uidExists["usersPass"];

    $checkPass = password_verify($password,$passHashed);

    if($checkPass === false)
    {
        header("location: ../login.php?error=password");
        exit();
    }
    else if($checkPass === true)
    {
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"]; 
        $_SESSION["usersName"] = $uidExists["usersName"];
        $_SESSION["usersEmail"] = $uidExists["usersEmail"];
        $_SESSION["usersUid"] = $uidExists["usersUid"]; 
        header("location: ../index.php");
        exit();
    }

}

function LogOut()
{
    session_start();
    session_unset();
    session_destroy();
    header("location: ../index.php"); //Sends the user back to sign up form
    exit(); //Stops Script from running
}
