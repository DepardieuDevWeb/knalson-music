<?php

use App\Auth;
use App\Connexion;
use App\Model\PostConcertEvenement;

Auth::check();

$router->layout = 'admin/layouts/default';
$title = 'Concerts & evenements | Knalson Music';

$pdo = Connexion::getPDO();
$query = $pdo->query("SELECT * FROM concerts_evenements ORDER BY id DESC");
$postsConcertsEvenements = $query->fetchAll(PDO::FETCH_CLASS, PostConcertEvenement::class);
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
            <th>Concert ou événement</th>
            <th>Lieu</th>
            <th>Details de l'événement</th>
            <th>Date de l'événement</th>
            <th>
                <a href="<?= $router->url('admin_concerts_evenements_new')?>" class="button-a">Enregistrer</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($postsConcertsEvenements as $postConcertEvenement): ?>
                <tr>
                    <td><?= $postConcertEvenement->getID() ?></td>
                    <td class="table-A"><?= $postConcertEvenement->getTypeEvenement() ?></td>
                    <td class="table-A"><?= $postConcertEvenement->getLocation() ?></td>
                    <td class="table-A"><?= $postConcertEvenement->getDetailsEvenement() ?></td>
                    <td class="table-A"><?= $postConcertEvenement->getCreatedAt() ?></td> 
                    <td class="td-btn-center">
                        <a href="<?= $router->url('admin_concerts_evenements_edit', ['id' => $postConcertEvenement->getID()]) ?>" class="btn-admin editer">Editer</a>
                        <form action="<?= $router->url('admin_concerts_evenements_delete', ['id' => $postConcertEvenement->getID()]) ?>"  method="POST" onsubmit ="return confirm('Voulez-vous vraiment effectuer cette action?')" style="display:inline">
                            <button type="submit" class="supprimer">Supprimer</button>
                        </form>                
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>