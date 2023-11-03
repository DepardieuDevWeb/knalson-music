<?php

namespace App\Model;

use DateTime;

class PostConcertEvenement{
    
    private $id;
    private $type_evenement;
    private $location;
    private $details_evenement;
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

    public function getTypeEvenement()
    {
        return $this->type_evenement;
    }

    public function setTypeEvenement(string $type_evenement):self
    {
        $this->type_evenement = $type_evenement;
        return $this;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation(string $location):self
    {
        $this->location = $location;
        return $this;
    }

    public function getDetailsEvenement()
    {
        return $this->details_evenement;
    }

    public function setDetailsEvenement(string $details_evenement):self
    {
        $this->details_evenement = $details_evenement;
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