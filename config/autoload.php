<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$env = __DIR__ . '/../.env';

if (file_exists($env)) {
    $dotenv = new Dotenv();
    $dotenv->load($env);
}