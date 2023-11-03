<?php
use App\Auth;
use App\Connexion;

Auth::check();


$router->layout = 'admin/layouts/default_login';
$title = 'Administration Groupe Knalson Music';

$pdo = Connexion::getPDO();

$id = $_SESSION['auth'] ?? null;

if($id === null){
    return null;
}

$query = $pdo->prepare("SELECT * FROM user_admin WHERE id = ?");
$query->execute([$id]);
$query->setFetchMode(PDO::FETCH_ASSOC);
$user = $query->fetch();
// var_dump($user);
?>


<section class="admin-page-accueil">
    <div>
        <h1 class="title-animation">Bienvenue sur la page administration de Knalson Music</h1>
        <p class="paragraphe-animation">Vous êtes connectés en tant que <?= $user['username'] ?></p>
    </div>
    <div>
        <a href="<?= $router->url('admin_concerts_evenements') ?>" class="lien-animation">Concerts & evenements</a>
        <span class="baton"></span>
        <a href="<?= $router->url('admin_sortie_musicales') ?>" class="lien-animation">Sortie musicales</a>
        <span class="baton"></span>
        <a href="<?= $router->url('admin_images') ?>" class="lien-animation">Images</a>
    </div>
</section>