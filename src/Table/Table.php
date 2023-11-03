<?php

namespace App\Table;

use PDO;

abstract class Table{

    protected $pdo;
    protected $table = null;
    protected $class = null;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id ");
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->table);
        $result = $query->fetch();
        if($result === false){
            throw new \Exception('Votre rechereche pas abouti');
        }

        return $result;
    }
}