<?php

namespace App\Exceptions;

use Exception;

class EmailException extends Exception
{
   
    public function __construct(string $message = "E-mail inválido.", int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function invalidEmail(string $email): self
    {
        return new self("O e-mail '{$email}' é inválido.");
    }
}
