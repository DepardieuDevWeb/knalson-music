<?php
require '../vendor/autoload.php';
use App\Router;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new Router(dirname(__DIR__) . '/views');
$router
    ->get('/', 'post/index', 'home')
    ->get('/accueil', 'post/index', 'accueil')
    ->get('/nos-prestations', 'post/prestations', 'prestations')
    ->get('/nos-dates-a-venir', 'post/evenements', 'evenements')
    ->get('/images', 'post/images', 'images')
    ->get('/videos', 'post/videos', 'videos')
    ->match('/contact', 'post/contact', 'contact')


    // login
    ->match('/se-connecter', 'auth/login', 'login')
    ->post('/se-deconnecter', 'auth/logout', 'logout')

    
    //admin
    ->get('/admin', 'admin/post/index', 'admin_page_accueil')
    ->get('/admin_aurevoir', 'admin/post/index_aurevoir', 'admin_page_aurevoir')
    
    // images
    ->get('/admin_images', 'admin/post/images', 'admin_images')
    ->match('/admin_images/post/new', 'admin/post/image_new', 'admin_post_image_new')
    ->match('/admin_images/post/[i:id]', 'admin/post/image_edit', 'admin_post_image_edit')
    ->post('/admin_images/post/[i:id]/delete', 'admin/post/image_delete', 'admin_post_image_delete')

    // concerts et evenements
    ->get('/admin_concerts_evenements', 'admin/post/concerts_evenements', 'admin_concerts_evenements')
    ->match('/admin_concerts_evenements/post/new', 'admin/post/concert_evenement_new', 'admin_concerts_evenements_new')
    ->match('/admin_concerts_evenements/post/[i:id]', 'admin/post/concert_evenement_edit', 'admin_concerts_evenements_edit')
    ->post('/admin_concerts_evenements/post/[i:id]/delete', 'admin/post/concert_evenement_delete', 'admin_concerts_evenements_delete')
    
    // sortie musicales
    ->get('/admin_sortie_musicales', 'admin/post/sortie_musicales', 'admin_sortie_musicales')
    ->match('/admin_sortie_musicales/post/new', 'admin/post/sortie_musicale_new', 'admin_sortie_musicales_new')
    ->match('/admin_sortie_musicales/post/[i:id]', 'admin/post/sortie_musicale_edit', 'admin_sortie_musicales_edit')
    ->post('/admin_sortie_musicales/post/[i:id]/delete', 'admin/post/sortie_musicale_delete', 'admin_sortie_musicales_delete')

    ->run();
