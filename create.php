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
            <canvas id="grid" width="400" height="400" style="border:1px solid #000000;"></canvas> 
        </div>
    </body>

    <script>
            
            var canvas = document.getElementById("grid");
            var ctx = canvas.getContext('2d');

            var drawGrid = function(w, h) {



            ctx.canvas.width  = w;
            ctx.canvas.height = h;

            for (x=0;x<=w;x+=50) {
                for (y=0;y<=h;y+=50) {
                    ctx.moveTo(x, 0);
                    ctx.lineTo(x, h);
                    ctx.stroke();
                    ctx.moveTo(0, y);
                    ctx.lineTo(w, y);
                    ctx.stroke();
                }
            }

            };

            drawGrid(1000, 1000);
            
        </script>  

</html>