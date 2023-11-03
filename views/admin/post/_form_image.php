<form action="" method="POST" class="form-group" enctype="multipart/form-data">
    <?= $form->fileInput('image', 'Nouvelle image (laissez vide pour conserver l\'actuel) :', 'image') ?>
    <?= $form->input('name', 'Nom du fichier', 'text') ?>
    <button type="submit" class="submit">
        <?php if($postImage->getID() !== null): ?>
            Modifier
        <?php else: ?>
            Enregistrer
        <?php endif ?>
    </button>
</form>
