<?php

namespace App\Validator;

use App\Table\PostImageTable;

class ImageValidator extends AbstractValidator{

    public function __construct(array $data, PostImageTable $table)
    {
        parent::__construct($data); 
        $this->validator->rule('required', ['name']);
        $this->validator->rule('lengthBetween', ['name'], 3, 200);
    }

}