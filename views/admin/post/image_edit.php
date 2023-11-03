<?php

$router->layout = "admin/layouts/default_login";
$title = 'Editer l\'image| Knalson Music';

use App\HTML\Form;
use App\Validator;
use App\Connexion;
use App\Model\PostImage;
use App\Table\PostImageTable;
use App\Validator\ImageValidator;


$pdo = Connexion::getPDO();
$postImageTable = new PostImageTable($pdo);
$query = $pdo->prepare("SELECT * FROM images WHERE id = :id");
$query->execute(['id' => $params['id']]);
$query->setFetchMode(PDO::FETCH_CLASS, PostImage::class);
$postImage = $query->fetch(); 

$errors = [];
$success = false;

if(!empty($_POST)){
    Validator::lang('fr');
    $v = new ImageValidator($_POST);
    $postImage
            ->setName($_POST['name'])
            ->setImage($_FILES['image']);

    // Vérifier si un nouveau fichier a été téléchargé
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Supprimer l'ancien fichier (facultatif)
        if (file_exists($postImage->getImage())) {
            unlink($postImage->getImage());
        }
    }

    // Déplacer le nouveau fichier vers le répertoire permanent
    $nouveauChemin = '../uploads/images/';
    $fileName = uniqid() . '_' . $_FILES['image']['name'];
    $destinationPath = $nouveauChemin . $fileName;

    if($v->validate()){
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destinationPath)) {
            $postImage->setVideoURL($nouveauChemin . $fileName);
        } else {
            die('Erreur lors du déplacement du fichier.');
        }
        $postImageTable->update($postImage);
        $success = true;
    }else{
        $errors = $v->errors();
    }
}
$form = new Form($postImage, $errors);
?>

<section class="les-formulaires">
    <div class="formulaire new-edit">
        <?php if($success): ?>
            <?php header('location: ' . $router->url('admin_images'). '?edit=1') ?>
            <div class="alert alert-succes">
                
            </div>
        <?php endif ?>

        <?php if(isset($_GET['enregistre'])): ?>
            <div class="alert alert-succes">
                L'image a bien été modifié
            </div>
        <?php endif ?>

        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">
            L'image n'a pas pu etre modifié, merci de corriger vos erreurs
            </div>
        <?php endif ?>

        <h1>Editer l'image': <?= $postImage->getName() ?></h1>
        <!-- Affiche le nom du fichier actuel si disponible -->
        <?php if ($postImage->getImage()): ?>
            <p>Fichier image actuel: <?= basename($postImage->getImage()) ?></p>
        <?php endif ?>
        <?php require '_form_image.php' ?>
    </div>
</section>