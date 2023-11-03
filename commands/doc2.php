<?php
$pdo = new PDO('mysql:dbname=knalsonmusic;host=127.0.0.1', 'root', null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// $pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
// $pdo->exec('TRUNCATE TABLE users');
// $pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$password = password_hash('dep@rdieu97', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user_admin SET username ='Nguetebe Pascal Shadrac Depardieu', email='depardieu.nguetebe@gmail.com', password='$password'");

$password = password_hash('Schadrac1', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user_admin SET username ='Nguetebe Miambama Dhuckque Geoffroy', email='Dhuckque2@gmail.com', password='$password'");
//php commands/doc.php