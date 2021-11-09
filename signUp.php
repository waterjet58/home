<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
            <section>
                <div class="signUpBox">
                    
                    <div class="formBox">
                        <h2>Sign Up</h2>
                        <form action="includes/signup.inc.php" method="post">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" name="email">
                            </div>

                            <div class="inputBox">
                                <span>Full Name</span>
                                <input type="text" name="name">
                            </div>

                            <div class="inputBox">
                                <span>Username</span>
                                <input type="text" name="username">
                            </div>

                            <div class="inputBox">
                                <span>Password</span>
                                <input type="password" name="password">
                            </div>

                            <div class="inputBox">
                                <span>Repeat Password</span>
                                <input type="password" name="repeatPassword">
                            </div>

                            <div class="inputBox">
                            <input type="submit" value="Sign Up" name="submit">
                            </div>      

                        </form>
                        
                        <?php
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "emptyinput")
                                echo "<div class=\"wrong\">Fill in all fields!</div>";
                            }
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "invalidUid")
                                echo "<div class=\"wrong\">Enter a valid Username!</div>";
                            }
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "invalidEmail")
                                echo "<div class=\"wrong\">Enter a valid Email!</div>";
                            }
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "passwordsDontMatch")
                                echo "<div class=\"wrong\">Passwords do not match!</div>";
                            }
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "usernameTaken")
                                echo "<div class=\"wrong\">Username/Email already taken!</div>";
                            }
                        ?>
                        

                    </div>

                </div>

            </section>


        </div>    

    </body>

</html>