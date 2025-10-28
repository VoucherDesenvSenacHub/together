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



    public function MensagemEMail($destinatario, $link)
    {
        $mailUtil = new EmailUtil();
        $assunto = "Redefinição de Senha - Together";
        $mensagem = "
            <h2>Olá!</h2>
            <p>Recebemos uma solicitação para redefinir sua senha.</p>
            <p>Clique no link abaixo para criar uma nova senha. Esse link é válido por 1 hora.</p>
            <p><a href='{$link}' target='_blank'>Redefinir minha senha</a></p>
            <br>
            <p>Se você não solicitou a redefinição, ignore este e-mail.</p>
        ";
        $mailUtil->enviar($destinatario, $assunto, $mensagem);
    }

}