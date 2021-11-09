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

                <div class="profileImageBox">
                    <img src="Images/Home1.jpg">
                </div>
    
                <div class="profileBox">
                    
                    <div class="formBox">
                        <h2>Profile</h2>

                        <?php
                            echo "<div class='profile-Text'> Username: "."{$_SESSION['usersUid']}"."</div>";
                            echo "<div class='profile-Text'> Name: "."{$_SESSION['usersName']}"."</div>";
                            echo "<div class='profile-Text'> Email: "."{$_SESSION['usersEmail']}"."</div>";
                        ?>

                        <form action="includes/profile.inc.php" method="post">
                            <div class="inputBox">
                            <input type="submit" value="Log Out" name="submit">
                            </div>
                        </form>
    

                    </div>
    
                </div>
    
            </section>

            

        </div>    

    </body>

</html>