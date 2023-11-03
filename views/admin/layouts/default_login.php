<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $style ?? "style.css"?>">
    <title><?= $title ?? 'Knalson Music' ?></title>
</head>
<body>
    <main class="main_admin">
        <?= $content ?>
    </main>
</body>
</html>