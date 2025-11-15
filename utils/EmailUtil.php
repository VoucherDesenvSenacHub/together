<?php

namespace App\Utils;

require_once __DIR__ . "/../config/autoload.php";

use App\Exceptions\EmailException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

require_once __DIR__ . "/../exceptions/EmailException.php";

class EmailUtil
{
    private PHPMailer $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        try {
            
            $this->mailer->isSMTP();
            $this->mailer->Host = $_ENV['EMAIL_HOST'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $_ENV['EMAIL_USERNAME'];
            $this->mailer->Password = $_ENV['EMAIL_PASSWORD'];
            $this->mailer->SMTPSecure = $_ENV['EMAIL_SMTP_SECURE'];
            $this->mailer->Port = (int) $_ENV['EMAIL_PORT'];
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->isHTML(true);
            $this->mailer->setFrom($_ENV['EMAIL_USERNAME'], $_ENV['EMAIL_FROM_NAME'] ?: 'Suporte');
            $this->mailer->SMTPDebug = 0;

        } catch (PHPMailerException $e) {
            throw new EmailException("Falha ao configurar o PHPMailer: " . $e->getMessage());
        }
    }

    /**
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