<?php

use App\Connexion;
use App\Model\PostSortieMusicale;
use App\Model\PostConcertEvenement;

$title= 'Nos dates à venir';
$mon_titre = "Knalson Music";
$mon_paragraphe = "Concerts et événements à vénir à Saint-herblain et aù dela des frontières";

$pdo = Connexion::getPDO();
$queryConcertEvenement = $pdo->query("SELECT * FROM concerts_evenements");
$concertEvenements = $queryConcertEvenement->fetchAll(PDO::FETCH_CLASS, PostConcertEvenement::class);

$querySortiesMusicales = $pdo->query("SELECT * FROM sorties_musicales");
$sortiesMusicales = $querySortiesMusicales->fetchAll(PDO::FETCH_CLASS, PostSortieMusicale::class);

?>
<section class="concerts-evenements">
    <div>
        <p>
            Retrouvez sur cette page l'ensemble de nos représentations à vénir dans tous types de mileux,
        </p>
        <p>
            et d'événements. Pour ne manquer aucune opportunité de danserau rythme d'une musique 
        </p>
        <p>
            folkorique, moderne et envoutante, pensez à consulter régulièrement les mises à jour. 
        </p>
    </div>
    <div class="concerts-evenements-flex-center">
        <div class="concerts-evenements-flex-div">
            <h2 class="concerts-evenements-flex-center-title">Concerts et événements</h2>
            <?php foreach($concertEvenements as $concertEvenement) :?>
                <div class="card-items reveal reveal-visible">
                    <div class="card-items-description reveal-2">
                        <h2><?= $concertEvenement->getTypeEvenement() ?></h2>
                        <p><?= $concertEvenement->getLocation() ?></p>
                        <p><?= $concertEvenement->getCreatedAt() ?></p>
                        <p><?= $concertEvenement->getDetailsEvenement() ?></p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        <div class="concerts-evenements-flex-div">
            <h2 class="concerts-evenements-flex-center-title">Sortie musicale</h2>
            <?php foreach($sortiesMusicales as $sortieMusicale) :?>
                <div class="card-items reveal reveal-visible">
                    <div class="card-items-description reveal-2">
                        <h2><?= $sortieMusicale->getTitleAlbum() ?></h2>
                        <p><?= $sortieMusicale->getDetailsAlbum() ?></p>
                        <p><?= $sortieMusicale->getCreatedAt() ?></p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>