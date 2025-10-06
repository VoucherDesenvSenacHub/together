<?php

namespace App\Utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Exceptions\EmailException;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../exceptions/EmailException.php';

class EmailUtil
{
    private PHPMailer $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP (Gmail)
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = 'email@gmail.com';
            $this->mailer->Password = 'SenhaApp';
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->isHTML(true);
            $this->mailer->setFrom('seuemail@gmail.com', 'Name'); // Nome do remetente

        } catch (Exception $e) {
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

        } catch (Exception $e) {
            throw new EmailException("Erro ao enviar e-mail: " . $e->getMessage());
        }
    }
}
