<?php

use App\Auth;
use App\Connexion;
use App\Model\PostImage;

Auth::check();

$router->layout = 'admin/layouts/default';
$title = 'Images | Knalson Music';

$pdo = Connexion::getPDO();

$query = $pdo->query("SELECT * FROM images");
$postsImages = $query->fetchAll(PDO::FETCH_CLASS, PostImage::class);

?>
<section class="display-flex-center partieAdmin">
    <div class="card-content-for-image">

        <?php if(isset($_GET['enregistre'])): ?>
            <div class="alert alert-succes">
                L'image à bien été enregistré
            </div>
        <?php endif ?>

        <?php if(isset($_GET['delete'])): ?>
        <div class="alert alert-succes">
            L'enregistrement a bien été supprimé
        </div>
    <?php endif ?>

    <?php if(isset($_GET['edit'])): ?>
        <div class="alert alert-succes">
        L'enregistrement à bien été modifié  
        </div>
    <?php endif ?>

        <div class="btn-save-image">
            <a href="<?= $router->url('admin_post_image_new')?>" class="button-a">Enregistrer une nouvelle image</a>
        </div>

        <div class="card-image">
            <?php for($i = 0; $i <= 10; $i++):?>
                <div class="card-image-content">
                    <img src="img/KnalsonMusic-saint-herblain-020.jpg" alt="">
                    <div class='btn-edit-supp-image'>
                        <a href="<?= $router->url('admin_post_image_edit', ['id' => 'ff']) ?>" class="btn-admin editer">Editer</a>
                        <form action="<?= $router->url('admin_post_image_delete', ['id' => 'ff']) ?>"  method="POST" onsubmit ="return confirm('Voulez-vous vraiment effectuer cette action?')" style="display:inline">
                            <button type="submit" class="supprimer">Supprimer</button>
                        </form>                
                    </div>
                </div>
            <?php endfor ?>
        </div>

        <div class="card-image">
            <?php forEach($postsImages as $postImage):?>
                <div class="card-image-content">
                    <img src="<?= $postImage->getImage() ?>" alt="">
                    <p><?= $postImage->getName() ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>