<?php

namespace App\Validator;

class SortieMusicaleValidator extends AbstractValidator{

    public function __construct(array $data)
    {
        parent::__construct($data); 
        $this->validator->rule('required', ['title_album', 'details_album']);
        $this->validator->rule('lengthBetween', ['title_album','details_album'], 3, 50000);
    }

}