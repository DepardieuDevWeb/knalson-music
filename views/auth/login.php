<?php

use App\Connexion;
use App\HTML\Form;
use App\Model\UserAdmin;
use App\Table\Exception\NotFoundException;

$router->layout = 'admin/layouts/default_login';
$style = 'style.css';
$title = 'Se connecter | Groupe Knalson Music';

$user = new UserAdmin();

$errors = [];

if(!empty($_SESSION['auth'])){
    header('location: ' . $router->url('admin_page_accueil'));
}

if(!empty($_POST)){
    $user->setEmail($_POST['email']);
    $errors['password'] = ['Identifiant ou mot de passe incorrect'];

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $pdo = Connexion::getPDO();
        $query = $pdo->prepare("SELECT * FROM user_admin WHERE email = ?");
        $query->execute([$_POST['email']]);
        $fecth = $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetch();
    
        if($result === false){
            throw new NotFoundException('user_admin', $_POST['email']);
        }
        try{
            if (password_verify($_POST['password'], $result['password'])){
                session_start();
                $_SESSION['auth'] = $result['id'];
                header('location: ' . $router->url('admin_page_accueil'));
                exit();
            }
        }catch(NotFoundException $e){

        }
    }
}

$form = new Form($user, $errors)
?>


<section class="connexion">

    <div class="formulaire">
        <h1 class="se-connecter">Se connecter</h1>

        <?php if(isset($_GET['forbidden'])):?>
            <div class="alert alert-danger">
                Vous ne pouvez pas accéder à cette page 
            </div>
        <?php endif ?>

        <form action="<?= $router->url('login') ?>" method="post">
            <?= $form->input('email', 'Email', 'email') ?>
            <?= $form->input('password', 'Mot de passe', 'password') ?>
            <button type="submit">Se connecter</button>
        </form>

    </div> 
</section>