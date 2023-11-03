<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon Site'?></title>
    <link rel="stylesheet" href="style.css">
    <script src="js/validateFormulaire.js" defer></script>
    <script src="https://kit.fontawesome.com/63393e9a9e.js" crossorigin="anonymous"></script>
</head>
<body class="body">
    
    <!-- CONTENU DE CHAQUE PAGE  -->
    <!-- <div class="content-page-contact"> -->
        <?= $content ?>
    <!-- </div> -->
    <!-- CONTENU DE CHAQUE PAGE  -->

    <footer>
        <div class="footer-info">
            <div>
                <h1 class="knalson">knalson <span class="logo-span">music</span></h1>
            </div>
            
            <div class="footer-contact">

                <div class="box">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <p>3, rue d'Arras 44800 Saint-Herblain</p>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <p class="footerParagrapheRouge">06 66 12 31 79</p>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <p class="footerParagrapheRouge">duckgeoffroy@yahoo.com</p>
                </div>
                   
            </div>

            <div class="social">
                <h2>Nous suivre</h2>
                <div class="social-icons">
                    <div class="social-icon"><a href="https://www.facebook.com/duckgeoffroy" target="_blank"><i class="fa-brands fa-facebook-f"></i>Duck Geoffroy</a></div>
                    <div class="social-icon"><a href="https://www.youtube.com/c/geoffroyduck" target="_blank"><i class="fa-brands fa-youtube" style="color: #cd201f;"></i>Duck Geoffroy</a></div>
                    <div class="social-icon"><a href="https://soundcouch.soundcloud.com/#/profile/191706317" target="_blank"><i class="fa-brands fa-soundcloud"></i></a></div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; Copyright 2023 - Knalson Music - Tous droits réservés - <a href="" class="copyrightMentionsLegales">Mentions légales</a></p>
        </div>
    </footer>
</body>
</html>