<?php

use App\Connexion;
use App\Table\PostSortieMusicaleTable;

$pdo = Connexion::getPDO();
$PostSortieMusicaleTable = new PostSortieMusicaleTable($pdo);
$delete = $PostSortieMusicaleTable->delete($params['id']);

header('location:' . $router->url('admin_sortie_musicales') . '?delete=1');