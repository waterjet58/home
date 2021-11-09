<?php
    session_start();
?>

<div class="nav-wrapper">
                <div class="left-side">
                    <div class="nav-link-wrapper">
                        <a href="index.php">Home</a>
                    </div>
                    
                    <?php
                        if(isset($_SESSION["usersUid"]) === false)
                        {
                            echo "<div class='nav-link-wrapper'>
                            <a href='login.php'>Login</a>
                            </div>";
                        }

                        if(isset($_SESSION["usersUid"]) === true)
                        {
                            echo "<div class='nav-link-wrapper'>
                                    <a href='profile.php'>Profile</a>
                                  </div>";
                        }

                        if(isset($_SESSION["usersUid"]) === true)
                        {
                            echo "<div class='nav-link-wrapper'>
                                    <a href='create.php'>Create</a>
                                  </div>";
                        }
                    ?>
                
                </div>
                
                <div class="right-side">
                    <?php
                        if(isset($_SESSION["usersUid"]))
                        {
                            $var = $_SESSION['usersUid'];
                            echo "<div class=\"nav-text-user\"> Welcome! "."{$var}"."</div>";
                        }
                    ?>

                    <div class="nav-text">
                        <div>HOME BUILDER</div>
                    </div>
                </div>

</div>