<?php

namespace App\HTML;

class Form{

    private $data;
    private $errors;

    public function __construct($data, array $errors){
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input(string $key, string $label, string $type)
    {
        $value = $this->getValue($key);
        return <<<HTML
            <div class="champs-formulaire input">
                <label for="field{$key}">{$label}</label>
                <input type="{$type}" id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}" value="{$value}" required>
                {$this->getErrorFeedback($key)}
            </div>
HTML;
    }

    public function textarea(string $key, string $label)
    {
        $value = $this->getValue($key);
        return <<<HTML
            <div class="champs-formulaire textarea">
                <label for="{$key}">{$label}</label>
                <textarea type="text" class="{$this->getInputClass($key)}" name="{$key}" id="{$key}" required>{$value}</textarea>
                {$this->getErrorFeedback($key)}
            </div>
HTML;
    }

    public function fileInput(string $key, string $label, string $natureFichier)
    {
        $fileInput = '';
        $value = $this->getValue($key);

        if (!$this->data->isNew() && !empty($value)) {
            $fileInput .= '<div class="champs-formulaire file">';
            $fileInput .= '<p>Fichier (' . $natureFichier . ') actuel : ' . basename($value) . '</p>';
            $fileInput .= '</div>';
        }

        $fileInput .= '<div class="champs-formulaire file">';
        $fileInput .= '<label for="field' . $key . '">' . $label . '</label>';
        $fileInput .= '<input type="file" id="field' . $key . '" class="' . $this->getInputClass($key) . '" name="' . $key . '">';
        // " accept=".mp3"
        $fileInput .= $this->getErrorFeedback($key);
        $fileInput .= '</div>';

        return $fileInput;
    }
    
    private function getValue(string $key):?string
    {
        if (is_array($this->data)) {
            return isset($this->data[$key]) ? $this->data[$key] : null;
        }
    
        $method = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        $value = $this->data->$method();
        
        return $value;
    }

    private function getInputClass(string $key):string
    {
        $inputClass = "form-control";
        if(isset($this->errors[$key])){
            $inputClass .= " is-invalid";
        }
        return $inputClass; 
    }

    private function getErrorFeedBack(string $key):string
    {
        if(isset($this->errors[$key])){
            return '<div class="invalid-feedback">'. implode('<br>', $this->errors[$key]) .'</div>';
         }
         return '';
    }

}