<?php

namespace App\Services;
use App\Utils\EmailUtil;
use App\Exceptions\EmailException;

require_once __DIR__ . "/../utils/EmailUtil.php";

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
    public function enviarEmailRedefinirSenha($destinatario, $link)
    {
        $assunto = "Redefinição de Senha - Together";
        $mensagem = "
        <h2>Olá!</h2>
        <p>Recebemos uma solicitação para redefinir sua senha.</p>
        <p>Clique no link abaixo para criar uma nova senha. Esse link é válido por 1 hora.</p>
        <p><a href='{$link}' target='_blank'>Redefinir minha senha</a></p>
        <br>
        <p>Se você não solicitou a redefinição, ignore este e-mail.</p>
        ";
        $mailUtil = new EmailUtil();
        $mailUtil->enviar($destinatario, $assunto, $mensagem);
    }
}