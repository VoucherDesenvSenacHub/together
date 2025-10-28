<?php

namespace App\Utils;

use App\Exceptions\EmailException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;


class EmailUtil
{
    private PHPMailer $mailer;

    public function __construct()
    {
        // Garante que o autoload esteja disponível
        if (!class_exists(\PHPMailer\PHPMailer\PHPMailer::class)) {
            require_once __DIR__ . '/../config/autoload.php';
        }

        $this->mailer = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP (Gmail)
            $this->mailer->isSMTP();
            $this->mailer->Host = getenv('EMAIL_HOST');
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = getenv('EMAIL_USERNAME');
            $this->mailer->Password = getenv('EMAIL_PASSWORD');
            $this->mailer->SMTPSecure = getenv('EMAIL_SMTP_SECURE');
            $this->mailer->Port = getenv('EMAIL_PORT');
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->isHTML(true);
            $this->mailer->setFrom(getenv('EMAIL_USERNAME'), getenv('EMAIL_FROM_NAME') ?: 'Suporte');
            $this->mailer->SMTPDebug = 0; // 0 = sem debug, 2 = debug detalhado
            $this->mailer->Debugoutput = 'error_log';

        } catch (PHPMailerException $e) {
            throw new EmailException("Falha ao configurar o PHPMailer: " . $e->getMessage());
        }
    }

    /**
     * Envia um e-mail.
     *
     * @param string $destinatario
     * @param string $assunto
     * @param string $mensagem
     * @throws EmailException
     */
    public function enviar(string $destinatario, string $assunto, string $mensagem): void
    {
        if (!filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
            throw EmailException::invalidEmail($destinatario);
        }

        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($destinatario);
            $this->mailer->Subject = $assunto;
            $this->mailer->Body = $mensagem;

            $this->mailer->send();

        } catch (PHPMailerException $e) {
            throw new EmailException("Erro ao enviar e-mail: " . $e->getMessage());
        }
    }
}