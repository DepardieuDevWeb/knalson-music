<?php

namespace App\Table;

use DateTimeInterface;
use App\Model\PostSortieMusicale;

class PostSortieMusicaleTable extends Table{

    protected $table = 'sorties_musicales';
    protected $class = PostSortieMusicale::class;

    public function create(PostSortieMusicale $postSortieMusicale):void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET title_album = :title_album, details_album = :details_album, created_at = :created_at");
        $ok = $query->execute([
            'title_album' => $postSortieMusicale->getTitleAlbum(),
            'details_album' => $postSortieMusicale->getDetailsAlbum(),
            'created_at' => $postSortieMusicale->getCreatedAt()
        ]);

        if($ok === false){
            throw new Exception("Impossible de créer l'enregistrement dans la table {$this->table}");
        }
        $postSortieMusicale->setID($this->pdo->lastInsertId());
    }

    public function update(PostSortieMusicale $postSortieMusicale):void
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET title_album = :title_album, details_album = :details_album, created_at = :created_at WHERE id = :id");
        $ok = $query->execute([
            'id' => $postSortieMusicale->getID(),
            'title_album' => $postSortieMusicale->getTitleAlbum(),
            'details_album' => $postSortieMusicale->getDetailsAlbum(),
            'created_at' => $postSortieMusicale->getCreatedAt()
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