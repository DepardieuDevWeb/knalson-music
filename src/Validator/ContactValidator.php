<?php

namespace App\Validator;

class ContactValidator extends AbstractValidator{

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validator->rule('required', ['username', 'telephone', 'email', 'email_confirmed', 'message']);
        $this->validator->rule('lengthBetween', ['username', 'telephone', 'message'], 3, 200);
    }
}