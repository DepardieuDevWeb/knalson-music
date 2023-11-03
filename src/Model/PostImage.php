<?php

namespace App\Model;

use DateTime;

class PostImage{

    private $id;
    private $name;
    private $image;
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

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name):self
    {
        $this->name = $name;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image):self
    {
        if (is_array($image) && isset($image['tmp_name'])) {
            $this->image = $image['tmp_name'];
        } else {
            $this->image = $image;
        }
        return $this;
    }

    // public function getCreatedAt():DateTime
    // {
    //     return new DateTime($this->created_at);
    // }

    // public function setCreatedAt(string $date): self
    // {
    //   $this->created_at = $date;
    //   return $this;
    // }

    public function isNew(): bool
    {
        return $this->id === null || $this->image === null;
    }
}