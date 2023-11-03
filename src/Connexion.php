<?php

namespace App;

use PDO;

class Connexion{

    public static function getPDO():PDO
    {
        return $pdo = new PDO('mysql:dbname=knalsonmusic;host=127.0.0.1', 'root', null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}