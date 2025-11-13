<?php

class ValidarSenhaService
{
    public static function validarSenha(string $senha, string $confirmarSenha)
    {

        if (empty($senha) || empty($confirmarSenha)) {
            $erro = "Preencha todos os campos.";
            return $erro;
        }

        if (strlen($senha) < 8) {
            $erro = "A senha deve ter no mínimo 8 caracteres.";
            return $erro;
        }

        if ($senha !== $confirmarSenha) {
            $erro = "As senhas digitadas não coincidem.";
            return $erro;
        }

        if (!preg_match('/[A-Z]/', $senha)) {
            $erro = "A senha deve ter no mínimo 1 letra maiúscula.";
            return $erro;
        }

        if (!preg_match('/[a-z]/', $senha)) {
            $erro = "A senha deve ter no mínimo 1 letra minúscula.";
            return $erro;
        }

        if (!preg_match('/[0-9]/', $senha)) {
            $erro = "A senha deve ter no mínimo 1 número.";
            return $erro;
        }

        if (!preg_match('/[\W_]/', $senha)) {
            $erro = "A senha deve ter no mínimo 1 caractere especial.";
            return $erro;
        }

        if (preg_match('/\s/', $senha)) {
            $erro = "A senha não pode conter espaços.";
            return $erro;
        }

        return true;
    }
}
