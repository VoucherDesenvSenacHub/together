<?php
namespace App\Controllers;

use App\Services\EmailService;
use App\Exceptions\EmailException;

class EmailController
{
    public function enviar(string $destinatario, string $assunto, string $mensagem): void
    {
        try {
            EmailService::enviarEmail($destinatario, $assunto, $mensagem);
        } catch (EmailException $e) {
            throw new EmailException("Erro ao enviar o e-mail: " . $e->getMessage());
        }
    }
}
