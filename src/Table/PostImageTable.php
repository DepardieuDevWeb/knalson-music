<?php

namespace App\Table;

use App\Model\PostImage;

class PostImageTable extends Table{

    protected $table = 'images';
    protected $class = PostImage::class;

    public function create(PostImage $postImage, $fichierDestination):void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET name = :name, image = :image");
        $ok = $query->execute([
            'name' => $postImage->getName(),
            'image' => $fichierDestination
        ]);
        // 
            
        if($ok === false){
            throw new Exception("Impossible de créer l'enregistrement dans la table {$this->table}");
        }
        $postImage->setID($this->pdo->lastInsertId());
    }

    public function update(PostImage $postImage):void
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET name = :name, image = :image");
        $ok = $query->execute([
            'id' => $postImage->getID(),
            'name' => $postImage->getName(),
            'image' => $$postImage->getImage()
        ]);

        if($ok === false){
            throw new Exception("Impossible de modifier l'enregistrement $id dans la table {$this->table}");
        }
    }

    public function delete(int $id): void
    {
        // Vérifier d'abord si l'enregistrement existe
        $postImage = $this->find($id);

        if ($postImage) {
            // Supprimer le fichier physique du serveur
            $filePath = $postImage['image'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Supprimer l'enregistrement de la base de données
            $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
            $ok = $query->execute([$id]);

            if (!$ok) {
                throw new Exception("Impossible de supprimer l'enregistrement $id dans la table {$this->table}");
            }
        } else {
            // L'enregistrement n'existe pas, vous pouvez gérer cela comme vous le souhaitez,
            // par exemple, définir un message d'erreur ou rediriger l'utilisateur.
            throw new Exception("L'enregistrement avec l'ID $id n'existe pas dans la table {$this->table}");
        }
    }
}