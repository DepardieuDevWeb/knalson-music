<?php

namespace App\Model;

class PostSortieMusicale{
    
    private $id;
    private $title_album;
    private $details_album;
    private $created_at;

    public function getID():?int
    {
        return $this->id;
    }

    public function setID(int $id):self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitleAlbum()
    {
        return $this->title_album;
    }

    public function setTitleAlbum(string $title_album):self
    {
        $this->title_album = $title_album;
        return $this;
    }

    public function getDetailsAlbum()
    {
        return $this->details_album;
    }

    public function setDetailsAlbum(string $details_album):self
    {
        $this->details_album = $details_album;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $date):self
    { 
        $this->created_at = $date;
        return $this;
    }
}