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
            require_once __DIR__ . '/../../vendor/autoload.php';
        }

        $this->mailer = new PHPMailer(true);


        try {
            // Configurações do servidor SMTP (Gmail)
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = getenv('EMAIL_USERNAME');
            $this->mailer->Password = getenv('EMAIL_PASSWORD');
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->isHTML(true);
            $this->mailer->setFrom(getenv('EMAIL_USERNAME'), 'SUPORTE'); // Nome do remetente
            $this->mailer->SMTPDebug = 2; // mostra saída detalhada
            $this->mailer->Debugoutput = 'error_log'; // manda o log pro log de erros do PHP


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
