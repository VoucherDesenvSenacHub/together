<?php

namespace App\Exceptions;

use Exception;

class EmailException extends Exception
{
    /**
     * Cria uma nova exceção relacionada a e-mails.
     */
    public function __construct(string $message = "E-mail inválido.", int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Exceção para e-mail inválido.
     */
    public static function invalidEmail(string $email): self
    {
        return new self("O e-mail '{$email}' é inválido.");
    }
}
