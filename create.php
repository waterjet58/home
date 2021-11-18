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
        <div style="margin-left:auto;margin-right:auto;text-align:center">
            <div class="toolbar-container">
                <div class="toolbar-item">ok</div>
                <div class="toolbar-item">ok</div>
                <div class="toolbar-item">ok</div>
                <div class="toolbar-item">ok</div>
                <div class="toolbar-item">ok</div>
            </div>  
                <canvas id="grid" style="position: absolute; left: 0; top: 130; z-index: 0; border:1px solid #000000;"></canvas> 
                <canvas id="rooms" width = 2500 height = 1200 style="position: absolute; left: 0; top: 130; z-index: 1; border:1px solid #000000;"></canvas> 
                <script src = "drawGrid.js"></script>
                <script src = "Room.js"></script>
                <script src = "drawRooms.js"></script>
        </div>
    </body>

    

</html>