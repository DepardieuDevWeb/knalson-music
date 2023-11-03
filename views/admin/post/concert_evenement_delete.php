<?php

use App\Connexion;
use App\Table\PostConcertEvenementTable;

$pdo = Connexion::getPDO();
$postConcertEvenementTable = new PostConcertEvenementTable($pdo);
$delete = $postConcertEvenementTable->delete($params['id']);

header('location:' . $router->url('admin_concerts_evenements') . '?delete=1');