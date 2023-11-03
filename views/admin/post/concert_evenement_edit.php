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
$title = 'Concerts et evenements | Knalson Music';

$pdo = Connexion::getPDO();
$postConcertEvenement = new PostConcertEvenement();
$postConcertEvenementTable = new PostConcertEvenementTable($pdo);

$errors = [];
$succes = false;

$query = $pdo->prepare("SELECT * FROM concerts_evenements WHERE id = :id");
$query->execute(['id' => $params['id']]);
$query->setFetchMode(PDO::FETCH_CLASS, PostConcertEvenement::class);
$postConcertEvenement = $query->fetch(); 

if(!empty($_POST)){
    Validator::lang('fr');
    $v = new ConcertEvenementValidator($_POST);
    $postConcertEvenement
                ->setTypeEvenement($_POST['type_evenement'])
                ->setLocation($_POST['location'])
                ->setDetailsEvenement($_POST['details_evenement'])
                ->setCreatedAt($_POST['created_at']);

    if($v->validate()){
        $postConcertEvenementTable->update($postConcertEvenement);
        $succes = true;
        header('Location: ' . $router->url('admin_concerts_evenements', ['id' => $postConcertEvenement->getID()]) . '?edit=1');
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

        <h1 class="les-formulaires-h1">Modifier l'evenement <?= $postConcertEvenement->getTypeEvenement() ?></h1>
        <?php require '_form_concert_evenement.php' ?>
    </div>
</section>