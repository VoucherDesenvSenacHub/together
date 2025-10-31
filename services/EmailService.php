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

    public function enviarEmailVoluntarioRejeitado($destinatario, $razao_social_ong)
    {
        $assunto = "Notificação do voluntariado - Together";
        $mensagem = "
        <h2>Aviso de Solicitação de Voluntariado</h2>
        <p>Olá!</p>
        <p>Recebemos sua solicitação de voluntariado para <strong><?= $razao_social_ong ?></strong>.</p>
        <p><strong>Infelizmente, sua solicitação foi rejeitada.</strong></p>
        <p>Recomendamos que revise suas informações e tente novamente, caso ainda tenha interesse em participar.</p>
        <p>Se você não realizou essa solicitação, por favor, desconsidere este e-mail.</p>
        <p style='color: #888; font-size: 0.9em;'>Esta é uma mensagem automática. Por favor, não responda a este e-mail.</p>
        ";
        $mailUtil = new EmailUtil();
        $mailUtil->enviar($destinatario, $assunto, $mensagem);
    }

    public function enviarEmailVoluntarioAprovado($destinatario, $razao_social_ong)
    {
        $assunto = "Notificação do voluntariado - Together";
        $mensagem = "
        <h2>Aviso de Solicitação de Voluntariado</h2>
        <p>Olá!</p>
        <p>Recebemos sua solicitação de voluntariado para <strong><?= $razao_social_ong ?></strong>.</p>
        <p><strong>Felizmente, sua solicitação foi aprovada.</strong></p>
        <p>Recomendamos que faça o login novamente.</p>
        <p>Se você não realizou essa solicitação, por favor, desconsidere este e-mail.</p>
        <p style='color: #888; font-size: 0.9em;'>Esta é uma mensagem automática. Por favor, não responda a este e-mail.</p>
        ";
        $mailUtil = new EmailUtil();
        $mailUtil->enviar($destinatario, $assunto, $mensagem);
    }
}
