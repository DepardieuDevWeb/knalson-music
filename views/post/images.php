<?php

use App\Connexion;
use App\Model\PostImage;

$title = "Nos images";
$mon_titre = "Knalson Music";
$mon_paragraphe = "Enregistrements de nos performances à saint-herblain et aù dela des frontières</span>";

$pdo = Connexion::getPDO();

$query = $pdo->query("SELECT * FROM images");
$postsImages = $query->fetchAll(PDO::FETCH_CLASS, PostImage::class);
?>

<section class="display-flex-center partieAdmin">
    <div class="card-content-for-image">
        <div class="card-image reveal">
            <?php for($i = 0; $i <= 10; $i++):?>
                <div class="card-image-content">
                    <img src="img/KnalsonMusic-saint-herblain-020.jpg" alt="" class="reveal-1">
                    <p>Oui</p>
                </div>
            <?php endfor ?>
        </div>
    </div>
</section>