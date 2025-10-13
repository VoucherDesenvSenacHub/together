<?php

namespace App\Services;

use App\Utils\EmailUtil;
use App\Exceptions\EmailException;


class EmailService
{
    /**
     * Envia um e-mail utilizando o EmailUtil.
     *
     * @param string $destinatario
     * @param string $assunto
     * @param string $mensagem
     * @throws EmailException
     */
    public static function enviarEmail(string $destinatario, string $assunto, string $mensagem): void
    {
        try {
            $emailUtil = new EmailUtil();
            $emailUtil->enviar($destinatario, $assunto, $mensagem);
        } catch (EmailException $e) {
            //registro de logs, reformatar mensagem, etc.
            throw new EmailException("Falha ao enviar o e-mail: " . $e->getMessage());
        }
    }
}
