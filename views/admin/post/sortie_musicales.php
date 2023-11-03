<?php

use App\Auth;
use App\Connexion;
use App\Model\PostSortieMusicale;

Auth::check();

$router->layout = 'admin/layouts/default';
$title = 'Sorties musicales | Knalson Music';

$pdo = Connexion::getPDO();
$query = $pdo->query("SELECT * FROM sorties_musicales ORDER BY id DESC");
$posts_sorties_musicales = $query->fetchAll(PDO::FETCH_CLASS, PostSortieMusicale::class);
?>
<section class="color-black">
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

    <?php if(isset($_GET['enregistre'])): ?>
        <div class="alert alert-succes">
        L'enregistrement à bien été enregistré  
        </div>
    <?php endif ?>

    <table>
        <thead>
            <th>#</th>
            <th>Titre de l'album</th>
            <th>Date de sortie</th>
            <th>Details</th>
            <th>
                <a href="<?= $router->url('admin_sortie_musicales_new')?>" class="button-a">Enregistrer</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($posts_sorties_musicales as $post_sortie_musicale): ?>
                <tr>
                    <td><?= $post_sortie_musicale->getID() ?></td>
                    <td class="table-A"><?= $post_sortie_musicale->getTitleAlbum() ?></td> 
                    <td class="table-A"><?= $post_sortie_musicale->getCreatedAt() ?></td> 
                    <td class="table-A"><?= $post_sortie_musicale->getDetailsAlbum() ?></td>
                    <td class="td-btn-center">
                        <a href="<?= $router->url('admin_sortie_musicales_edit', ['id' => $post_sortie_musicale->getID()]) ?>" class="btn-admin editer">Editer</a>
                        <form action="<?= $router->url('admin_sortie_musicales_delete', ['id' => $post_sortie_musicale->getID()]) ?>"  method="POST" onsubmit ="return confirm('Voulez-vous vraiment effectuer cette action?')" style="display:inline">
                            <button type="submit" class="supprimer">Supprimer</button>
                        </form>                
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>