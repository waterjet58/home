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

                <div class="imageBox">
                    <img src="Images/SamHouston.png">
                </div>
    
                <div class="loginBox">
                    
                    <div class="formBox">
                        <h2>Login</h2>
                        <form action="includes/login.inc.php" method="post">
                            <div class="inputBox">
                                <span>Username/Email</span>
                                <input type="text" name="username">
                            </div>
    
                            <div class="inputBox">
                                <span>Password</span>
                                <input type="password" name="password">
                            </div>

                            <div class="inputBox">
                            <input type="submit" value="Sign In" name="submit">
                            </div>

                        </form>
    
                        <?php
                            if(isset($_GET["success"]))
                            {
                                if($_GET["success"] == "created")
                                echo "<div class=\"wrong\">Account Created!</div>";
                            }
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "emptyinput")
                                echo "<div class=\"wrong\">Fill in all fields!</div>";
                            }
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "invalidUid")
                                echo "<div class=\"wrong\">Incorrect Username/Email</div>";
                            }
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "password")
                                echo "<div class=\"wrong\">Password incorrect</div>";
                            }
                            if(isset($_GET["error"]))
                            {
                                if($_GET["error"] == "stmt")
                                echo "<div class=\"wrong\">Something went wrong, try again!</div>";
                            }
                        ?>
                        
    
                        <div class="inputBox">
                           <p>Don't have an account? <a href="signUp.php">Sign up</a> </p>
                        </div>

                        <div class="inputBox">
                            <p>Forgot username/password? <a href="forgotCredentials.php">Go Here</a> </p>
                         </div>


                    </div>
    
                </div>
    
            </section>

            

        </div>    

    </body>

</html>