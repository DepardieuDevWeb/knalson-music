<?php 

use App\Auth;
use App\Connexion;
use App\HTML\Form;
use Valitron\Validator;
use App\Model\PostSortieMusicale;
use App\Table\PostSortieMusicaleTable;
use App\Validator\SortieMusicaleValidator;

Auth::check();

$router->layout = "admin/layouts/default_login";
$style = "../../style.css";
$title = 'Nouvelle sortie musicale | Knalson Music';

$pdo = Connexion::getPDO();
$postSortieMusicale = new PostSortieMusicale();
$postSortieMusicaleTable = new PostSortieMusicaleTable($pdo);

$errors = [];
$succes = false;

if(!empty($_POST)){
    Validator::lang('fr');
    $v = new SortieMusicaleValidator($_POST);
    $postSortieMusicale
                ->setTitleAlbum($_POST['title_album'])
                ->setDetailsAlbum($_POST['details_album'])
                ->setCreatedAt($_POST['created_at']);

    if($v->validate()){
        $postSortieMusicaleTable->create($postSortieMusicale);
        $succes = true;
        header('Location: ' . $router->url('admin_sortie_musicales', ['id' => $postSortieMusicale->getID()]) . '?enregistre=1');
    }else{
        $errors = $v->errors();
    }
}

$form = new Form($postSortieMusicale, $errors);
?>

<section class="les-formulaires">
    <div class="formulaire new-edit">

        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">
                Erreur lors de l'enregistrement, merci de corriger vos erreurs
            </div>
        <?php endif ?>

        <h1 class="les-formulaires-h1">Enregistrer un nouvel album</h1>
        <?php require '_form_sortie_musicale.php' ?>
    </div>
</section>