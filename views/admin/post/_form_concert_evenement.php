<form action="" method="POST" class="form-group">
    <?= $form->input('type_evenement', 'Concert ou evenement', 'text') ?>
    <?= $form->input('location', 'Lieu', 'text') ?>
    <?= $form->textarea('details_evenement', 'Details sur le concert ou l\'evenement') ?>
    <?= $form->input('created_at', 'Date du concert ou de l\'evenement', 'text') ?>
    <button type="submit" class="submit">
        <?php if($postConcertEvenement->getID() !== null): ?>
            Modifier
        <?php else: ?>
            Enregistrer
        <?php endif ?>
    </button>
</form>
