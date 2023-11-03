<?php

namespace App\Table;

use App\Model\PostConcertEvenement;

class PostConcertEvenementTable extends Table{

    protected $table = 'concerts_evenements';
    protected $class = PostConcertEvenement::class;

    public function create(PostConcertEvenement $postConcertEvenement):void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET type_evenement = :type_evenement, location = :location, details_evenement = :details_evenement, created_at = :created_at");
        $ok = $query->execute([
            'type_evenement' => $postConcertEvenement->getTypeEvenement(),
            'location' => $postConcertEvenement->getLocation(),
            'details_evenement' => $postConcertEvenement->getDetailsEvenement(),
            'created_at' => $postConcertEvenement->getCreatedAt()
        ]);

        if($ok === false){
            throw new Exception("Impossible de créer l'enregistrement dans la table {$this->table}");
        }
        $postConcertEvenement->setID($this->pdo->lastInsertId());
    }

    public function update(PostConcertEvenement $postConcertEvenement):void
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET type_evenement = :type_evenement, location = :location, details_evenement = :details_evenement, created_at = :created_at WHERE id = :id");
        $ok = $query->execute([
            'id' => $postConcertEvenement->getID(),
            'type_evenement' => $postConcertEvenement->getTypeEvenement(),
            'location' => $postConcertEvenement->getLocation(),
            'details_evenement' => $postConcertEvenement->getDetailsEvenement(),
            'created_at' => $postConcertEvenement->getCreatedAt()
        ]);

        if($ok === false){
            throw new Exception("Impossible de modifier l'enregistrement $id dans la table {$this->table}");
        }
    }

    public function delete(int $id): void
    {
        
        // Supprimer l'enregistrement de la base de données
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $ok = $query->execute([$id]);

        if (!$ok) {
            throw new Exception("Impossible de supprimer l'enregistrement $id dans la table {$this->table}");
        }
    }
}