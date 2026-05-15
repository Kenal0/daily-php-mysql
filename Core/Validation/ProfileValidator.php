<?php

namespace Core\Validation;

use Core\Validator;

Class ProfileValidator
{
    protected $errors = [];

    public function validate (string $name, array $file): bool
    {
        $min = 2;
        $max = 35;
        if (!Validator::name($name, $min, $max)) {
            $this->errors['name'] = "Name must be between {$min} and {$max} characters long and contain only letters.";
        }

        if (!empty($file['name'])) {
            if (!Validator::file($file)) {
                $this->errors['errorAvatar'] = 'The file is too large or has an invalid extension.';
            }
        }

        return empty($this->errors);
    }

    public function getErrors (): array
    {
        return $this->errors;
    }
}