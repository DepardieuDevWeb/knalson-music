<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon Site'?></title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js" defer></script>
    <script src="js/menu-hamburger.js" defer></script>
    <script src="https://kit.fontawesome.com/63393e9a9e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css" integrity="sha512-UiVP2uTd2EwFRqPM4IzVXuSFAzw+Vo84jxICHVbOA1VZFUyr4a6giD9O3uvGPFIuB2p3iTnfDVLnkdY7D/SJJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="body">
    <header>
        <nav class="navbar">
                
            <div class="navbar-menu">
                <li class="li-lien"><a href="<?= $router->url('accueil')?>" class="liens active-lien-color">Accueil</a></li>
                <li class="li-lien"><a href="<?= $router->url('prestations')?>" class="liens">Nos prestations</a></li>
                <div class="dropdown li-lien">
                    <button class="menu-btn-lien-a">
                        <span>Nos images et videos</span>
                        <!-- <i class="fa-solid fa-angle-down icon-height-moins" style="font-size: 20px; margin-left: 10px; color:#fff;"></i> -->
                    </button>
    
                    <div class="sous-menu">
                        <a href="<?= $router->url('images')?>" class="liens">Nos images</a>
                        <a href="<?= $router->url('videos')?>" class="liens">Nos videos</a>
                    </div>
                </div>
                <li class="li-lien"><a href="<?= $router->url('evenements')?>" class="liens">Nos dates à venir</a></li>
                <li class="li-lien"><a href="<?= $router->url('contact')?>" class="liens">Contact</a></li>
            </div>

            <div class="navbar-menu-social">
                <a href="https://www.facebook.com/duckgeoffroy" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.youtube.com/c/geoffroyduck" target="_blank"><i class="fa-brands fa-youtube" style="color: #cd201f;"></i></a>
                <a href="https://soundcouch.soundcloud.com/#/profile/191706317" target="_blank"><i class="fa-brands fa-soundcloud"></i></a>
            </div>
        </nav>
        <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
            <span class="line l1"></span>
            <span class="line l2"></span>
            <span class="line l3"></span>
        </button>

        <div class="header-presentation reveal">
            <h1 class="reveal-1"><?= $mon_titre ?? '' ?></h1>
            <p class="reveal-2"><?= $mon_paragraphe ?? '' ?></p>
        </div>
    </header>
    
    <!-- CONTENU DE CHAQUE PAGE  -->
    <div class="content-page-accueil">
        <?= $content ?>
    </div>
    <!-- CONTENU DE CHAQUE PAGE  -->

    <footer class="">
        <div class="footer-info reveal">
            <div class="reveal-1">
                <!-- <h1 class="knalson">knalson <span class="logo-span">music</span></h1>
                <p class="groupe-music">Groupe de musique</p> -->
                <img src="img/IMG-20230827-WA0140.png" alt="">
            </div>
            
            <div class="footer-contact">

                <div class="box">
                    <div class="icon reveal-1"><i class="fa-solid fa-location-dot"></i></div>
                    <p class="reveal-2">3, rue d'Arras 44800 Saint-Herblain</p>
                </div>

                <div class="box">
                    <div class="icon reveal-1"><i class="fa-solid fa-phone"></i></div>
                    <p class="footerParagrapheRouge reveal-2">06 66 12 31 79</p>
                </div>

                <div class="box">
                    <div class="icon reveal-1"><i class="fa-solid fa-envelope"></i></div>
                    <p class="footerParagrapheRouge reveal-2">duckgeoffroy@yahoo.com</p>
                </div>
                   
            </div>

            <div class="social">
                <h2 class="reveal-1">Nous suivre</h2>
                <div class="social-icons">
                    <div class="social-icon reveal-2"><a href="https://www.facebook.com/duckgeoffroy" target="_blank"><i class="fa-brands fa-facebook-f"></i>Duck Geoffroy</a></div>
                    <div class="social-icon reveal-3"><a href="https://www.youtube.com/c/geoffroyduck" target="_blank"><i class="fa-brands fa-youtube" style="color: #cd201f;"></i>Duck Geoffroy</a></div>
                    <div class="social-icon reveal-4"><a href="https://soundcouch.soundcloud.com/#/profile/191706317" target="_blank"><i class="fa-brands fa-soundcloud"></i></a></div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; Copyright 2023 - Knalson Music - Tous droits réservés - <a href="" class="copyrightMentionsLegales">Mentions légales</a></p>
        </div>
    </footer>
    <script src="js/lien-active.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/intObserver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js" integrity="sha512-UU0D/t+4/SgJpOeBYkY+lG16MaNF8aqmermRIz8dlmQhOlBnw6iQrnt4Ijty513WB3w+q4JO75IX03lDj6qQNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>