<?php

namespace App\Validator;

class ConcertEvenementValidator extends AbstractValidator{

    public function __construct(array $data)
    {
        parent::__construct($data); 
        $this->validator->rule('required', ['type_evenement', 'location', 'details_evenement']);
        $this->validator->rule('lengthBetween', ['type_evenement', 'location'], 3, 255);
        $this->validator->rule('lengthBetween', ['details_evenement'], 3, 50000);
    }

}