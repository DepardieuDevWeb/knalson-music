<?php 
$router->layout = 'admin/layouts/default_login';
?>

<section class="admin-page-accueil">
    <div>
        <h1 class="title-animation">Merci d'etre passé</h1> 
    </div>
    <div>
        <a href="<?= $router->url('home') ?>" class="lien-animation">Aller sur la page d'accueil</a>
    </div>
</section>