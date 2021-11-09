<?php
include_once 'header.php';
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Home</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
            <div class="content-wrapper" >
                <div class="content-items-wrapper">
                    <div class="content-item-wrapper">
                        <div class="content-img-background" style="background-image:url(images/Home2.jpg)"></div>
                        <div class="img-text-wrapper">
                            <div class="subtitle">
                                Build your own dream home using Home Builder
                            </div>
                        </div>
                    </div>
                    <div class="content-item-wrapper">
                        <div class="content-img-background" style="background-image:url(images/Home4.jpg)"></div>
                        <div class="img-text-wrapper">
                            <div class="subtitle">
                                Beautiful Home built using Home Builder
                            </div>
                        </div>
                    </div>
                    <div class="content-item-wrapper">
                        <div class="content-img-background" style="background-image:url(images/Home3.jpg)"></div>
                        <div class="img-text-wrapper">
                            <div class="subtitle">
                                Beautiful Home built using Home Builder  
                           </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        
        </div>    
    
    </body>

    <script>
        const contentItems = document.querySelectorAll('.content-item-wrapper')

        contentItems.forEach(contentItem => {
            contentItem.addEventListener('mouseover', () => {
                contentItem.childNodes[1].classList.add('img-darken')
            })
        })
        contentItems.forEach(contentItem => {
            contentItem.addEventListener('mouseout', () => {
                contentItem.childNodes[1].classList.remove('img-darken')
            })
        })
    </script>
</html>