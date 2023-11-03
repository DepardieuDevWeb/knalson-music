<?php 

use App\Auth;
use App\Connexion;
use App\HTML\Form;
use Valitron\Validator;
use App\Model\PostConcertEvenement;
use App\Table\PostConcertEvenementTable;
use App\Validator\ConcertEvenementValidator;

Auth::check();

$router->layout = "admin/layouts/default_login";
$style = "../../style.css";
$title = 'Nouvelle sortie musicale | Knalson Music';

$pdo = Connexion::getPDO();
$postConcertEvenement = new PostConcertEvenement();
$postConcertEvenementTable = new PostConcertEvenementTable($pdo);

$errors = [];
$succes = false;

if(!empty($_POST)){
    Validator::lang('fr');
    $v = new ConcertEvenementValidator($_POST);
    $postConcertEvenement
                ->setTypeEvenement($_POST['type_evenement'])
                ->setLocation($_POST['location'])
                ->setDetailsEvenement($_POST['details_evenement'])
                ->setCreatedAt($_POST['created_at']);

    if($v->validate()){
        $postConcertEvenementTable->create($postConcertEvenement);
        $succes = true;
        header('Location: ' . $router->url('admin_concerts_evenements', ['id' => $postConcertEvenement->getID()]) . '?enregistre=1');
    }else{
        $errors = $v->errors();
    }
}

$form = new Form($postConcertEvenement, $errors);
?>

<section class="les-formulaires">
    <div class="formulaire new-edit">

        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">
                Erreur lors de l'enregistrement, merci de corriger vos erreurs
            </div>
        <?php endif ?>

        <h1 class="les-formulaires-h1">Enregistrer un nouvel album</h1>
        <?php require '_form_concert_evenement.php' ?>
    </div>
</section>