<?php
session_start();
use App\Services\EmailService;
use App\Exceptions\EmailException;

try {
    $destinatario = $_POST['email'] ?? '';
    $assunto = "Assunto do e-mail";
    $mensagem = "Corpo do e-mail em HTML ou texto";

    EmailService::enviarEmail($destinatario, $assunto, $mensagem);

    $_SESSION['type'] = 'sucesso';
    $_SESSION['message'] = "E-mail enviado com sucesso!";
    exit;

} catch (EmailException $e) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = $e->getMessage();
    exit;
}

?>