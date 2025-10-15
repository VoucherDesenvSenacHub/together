<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Utils\EmailUtil;

$email = new EmailUtil();
$email->enviar('allandossantosfernandes@gmail.com', 'Teste de envio', '<h1>Funcionou!</h1>');

echo "Tentativa de envio concluída.";
