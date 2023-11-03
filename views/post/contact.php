<?php

use App\HTML\Form;
use Valitron\Validator;
use App\Model\UserContact;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Validator\ContactValidator;

$router->layout = 'layouts/nousContDefault';
$title = "Contact | Knalson Music";
$mon_titre = "nous contactez";

$users = new UserContact();
$errors = [];
$succes = false;
$errorEmail = false;
$errosSendMail = false;

if(!empty($_POST)){
    Validator::lang('fr');
    $v = new ContactValidator($_POST);
    $users
            ->setUsername($_POST['username'])
            ->setTelephone($_POST['telephone'])
            ->setEmail($_POST['email'])
            ->setEmailConfirmed($_POST['email_confirmed'])
            ->setMessage($_POST['message'])
    ;

    if ($users->getEmail() === $users->getEmailConfirmed()) {
        if ($v->validate()) {
            $smtpHost = 'smtp.gmail.com';
            $smtpPort = 587;
            $smtpUsername = 'depardieu.nguetebe@gmail.com';
            $smtpPassword = 'azudqifzbgbiqqqu';

            $to = $smtpUsername;
            $subject = 'Demande de contact';
            $message = 'Contenu de la demande de contact';
            
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 3;
            $mail->SMTPOptions = array(
                'ssl' => array( 
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            try {
                $mail->isSMTP();
                $mail->Host = $smtpHost;
                $mail->SMTPAuth = true;
                $mail->Username = $smtpUsername;
                $mail->Password = $smtpPassword;

                $mail->Port = $smtpPort;
                $mail->SMTPSecure = 'tls';
                
            
                $mail->setFrom($_POST['email'], $_POST['username']);
                $mail->addReplyTo($_POST['email'], $_POST['username']);
                $mail->addAddress('depardieu.nguetebe@gmail.com', 'Knalson Music');
                $mail->Subject = $subject;
                $mail->Body = $_POST['message'];
                $mail->send();
                $succes = true;
            } catch (Exception $e) {
                $errosSendMail = true;
            }
        } else {
            $errors = $v->errors();
        }
    } else {
        $errorEmail=  true;
    }
}

$form = new Form($users, $errors);
?>


<div class="content-page-accueil">
    <section class="contact">
        <div class="contact-title">
            <h1>Contactez-nous</h1>
        </div>

        <div class="contactFlex">
            <div class="contactInfo">
                <p>Pour toute demande d'information, de devis ou de prestation, n'hesitez pas à prendre contact avec notre groupe par téléphone. Nous sommes à votre disposition tout au long de la semaine pour discuter avec vous afin d'intégrer vos événements et festivals, ou de produire nos perfomances musicales et chorégraphiques dans le cadre d'un concert.</p>

                <p>Vous pouvez également nous joindre en utilisant le formulaire de contact à votre disposition ci-contre. Nous vous répondrons avec soin dans les plus brefs delais.</p>

                <div class="nos_cordonnees">
                    <h1>Coordonnées Knalson Music</h1>
                    
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-phone"></i></div>
                        <p class="footerParagrapheRouge">06 66 12 31 79</p>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                        <p class="footerParagrapheRouge">duckgeoffroy@yahoo.com</p>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                        <p>3, rue d'Arras 44800 Saint-Herblain</p>
                    </div>
                </div>
            </div>
    
            <div class="formulaire__de__contact">
                <?php if($errorEmail) : ?>
                    <div class="alert alert-danger">
                        Erreur lors de l'envoi de l'e-mail
                    </div>
                <?php endif ?>

                <?php if($errorEmail) : ?>
                    <div class="alert alert-danger">
                            Les emails ne correspondent pas, merci de corriger vos erreurs
                    </div>
                <?php endif ?>

                <?php if(!empty($errors)): ?>
                    <div class="alert alert-danger">
                        Votre demande n'a pas pu etre envoyé, merci de corriger vos erreurs
                    </div>
                <?php endif ?>

                <?php if($succes) : ?>
                    <div class="alert alert-succes">
                        E-mail envoyé avec succès !
                    </div>
                <?php endif ?>

                <form action="" method="post">
                    <?= $form->input('username', 'Nom et prénom', 'text')?>
                    <?= $form->input('telephone', 'Téléphone', 'text')?>
                    <?= $form->input('email', 'Adresse mail', 'email')?>
                    <?= $form->input('email_confirmed', 'Adresse mail (confirmer)', 'email')?>
                    <?= $form->textarea('message', 'Votre message')?>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </section>
</div>

