<form action="" method="POST" class="form-group">
    <?= $form->input('title_album', 'Titre de l\'album', 'text') ?>
    <?= $form->textarea('details_album', 'Details sur l\'album') ?>
    <?= $form->input('created_at', 'Date de sortie de l\'album', 'text') ?>
    <button type="submit" class="submit">
        <?php if($postSortieMusicale->getID() !== null): ?>
            Modifier
        <?php else: ?>
            Enregistrer
        <?php endif ?>
    </button>
</form>
