# 📦 Projeto PHP com PHPMailer e Symfony Dotenv

Este é um projeto PHP que utiliza **PHPMailer** para envio de e-mails e **Symfony Dotenv** para gerenciamento seguro de variáveis de ambiente.  
O gerenciamento de dependências é feito com o **Composer local** (`composer.phar`)

## 🚀 Requisitos

- PHP 8.1 ou superior
- Composer local (`composer.phar` na raiz do projeto)

## ⚙️ Instalação

clonar o repositorio

# instalar o composer

php composer.phar install

Criar um arquivo .env para colocar suas variáveis de ambiente

# Exemplo:

EMAIL_HOST=smtp.gmail.com

EMAIL_USER=seuemail@gmail.com

EMAIL_PASS=sua_senha_de_app

EMAIL_PORT=587

# Dependências

PHPMailer php composer.phar require phpmailer/phpmailer

Symfony Dotenv php composer.phar require symfony/dotenv
