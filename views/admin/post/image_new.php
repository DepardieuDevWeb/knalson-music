<?php

use App\HTML\Form;
use App\Connexion;
use Valitron\Validator;
use App\Model\PostImage;
use App\Table\PostImageTable;
use App\Validator\ImageValidator;

$router->layout = "admin/layouts/default_login";
$title = 'Nouvelle image | Knalson Music';
$style = "../../style.css";

$pdo = Connexion::getPDO();
$errors = [];
$postImage = new PostImage();

if(!empty($_POST) && !empty($_FILES)){
    Validator::lang('fr');
    $postImageTable = new PostImageTable($pdo);
    $v = new ImageValidator($_POST, $postImageTable, $postImage->getID());
    $postImage
        ->setName($_POST['name'])
        ->setImage($_FILES['image']);

// ...
$nouveauChemin = '../uploads/images/';

// ...
$fileName = uniqid() . '_' . $_FILES['image']['name'];
$destinationPath = $nouveauChemin . $fileName;

    // Vérifier s'il y a des erreurs lors de l'upload
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        die('Erreur lors de l\'upload du fichier.');
    }

    // Obtenir le chemin complet du fichier temporaire
    $tmpPath = $_FILES['image']['tmp_name']; 

    // Générer un nom de fichier unique pour éviter les conflits
    $fileName = uniqid() . '_' . $_FILES['image']['name'];
    $destinationPath = $nouveauChemin . $fileName;

    // Déplacer le fichier temporaire vers le répertoire de destination avec le nouveau nom

        if($v->validate()){
            if (move_uploaded_file($tmpPath, $destinationPath)) {
                $postImage->setImage($nouveauChemin . $fileName);
                $fichierDestination = $nouveauChemin . $fileName;
                echo 'Chemin de destination : ' . $fichierDestination;
            $postImageTable->create($postImage, $fichierDestination);
            echo 'Le fichier a été téléchargé avec succès.';
            header('Location: ' . $router->url('admin_images', ['id' => $postImage->getID()]) . '?enregistre=1');
            exit();
        }else{
            die('Erreur lors du déplacement du fichier.');
        }
    }else{
        $errors = $v->errors();
    }
}

$form = new Form($postImage, $errors);
?>

<section class="les-formulaires">
    <div class="formulaire new-edit">

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            L'image n'a pas pu etre enregistré, merci de corriger vos erreurs
        </div>
    <?php endif ?>

    <h1>Enregistrer une image</h1>
    <?php require '_form_image.php' ?>
    </div>
</section>