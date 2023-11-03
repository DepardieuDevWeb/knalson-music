<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $style ?? "style.css"?>">
    <script src="js/menu-hamburger.js" defer></script>
    <title><?= $title ?? 'Administration Groupe Knalson Music' ?></title>
</head>
<body>
    <header class="header">
        <div class="navbar-admin">
            <div class="navbar-admin-left">
                <a href="<?= $router->url('accueil')?>" class="knalson-title-page-default">KNALSON <span class="knalson">Music</span></a>
            </div>

            <div class="navbar-admin-right navbar-menu">
                <li class="li-lien"><a href="<?= $router->url('admin_images')?>" class="">Images</a></li>
                <li class="li-lien"><a href="<?= $router->url('admin_concerts_evenements')?>" class="">Concerts et evenements</a></li>
                <li class="li-lien"><a href="<?= $router->url('admin_sortie_musicales')?>" class="">Sorties musicales</a></li>
                <form action="<?= $router->url('logout') ?>" method="post">
                    <button type="submit" class="btn btn-logout">Se deconnecter</button>    
                </form>
            </div>

            <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
            </button>
        </div>
</header>
    <main class="content-page-accueil">
        <?= $content ?>
    </main>
</body>
</html>