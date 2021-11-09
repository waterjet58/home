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
                        <h2>Forgot Password</h2>
                        <form action="includes/forgotCredentials.inc.php" method="post">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" name="email">
                            </div>

                            <div class="inputBox">
                            <input type="submit" value="Submit" name="submit">
                            </div>      

                        </form>              

                    </div>

                </div>

            </section>

        </div>    

    </body>

</html>