<?php

class PagamentoException{
    public function validar(array $dados){

        $nome = $dados['nome'];
        $numero = $dados['numero'];
        $validade = trim($dados['validade']);
        $cvv = $dados['cvv'];
        $valor = $dados['valor'];
        $idOng = $dados['idOng'];

        // Verificar campos obrigatórios
        if (empty($nome) || empty($numero) || empty($validade) || empty($cvv)) {
            throw new Exception("Por favor, preencha todos os campos obrigatórios.");
        }

        if(empty($idOng) || !is_numeric($idOng) || $idOng <= 0) {
            throw new Exception("ONG inválida. Por favor, selecione uma ONG válida para a doação.");
        }

        // Nome: letras e espaços (com acentos), até 100 caracteres
        if (!preg_match("/^[\p{L}\s]+$/u", $nome) || strlen($nome) > 100) {
            throw new Exception("Nome inválido. Deve conter apenas letras e espaços, com no máximo 100 caracteres.");
        }

        // Número do cartão: 16 dígitos
        if (strlen($numero) !== 16 || !ctype_digit($numero)) {
            throw new Exception("Número do cartão inválido. Deve conter exatamente 16 dígitos numéricos.");
        }

        // Validade: formato e ano mínimo
        if (!preg_match("/^(0[1-9]|1[0-2])\/(\d{2})$/", $validade, $matches)) {
            throw new Exception("Validade inválida. Formato correto: MM/AA.");
        }

        $mes = (int)$matches[1];
        $ano = (int)$matches[2];


        $anoAtual = (int)date("y");
        $mesAtual = (int)date("m");

        if ($ano < $anoAtual || ($ano === $anoAtual && $mes < $mesAtual)) {
            throw new Exception("Cartão vencido. Use um cartão com validade futura.");
        }


        // CVV: exatamente 3 dígitos
        if (!preg_match("/^\d{3}$/", $cvv) || strlen($cvv) !== 3 || !ctype_digit($cvv)) {
            throw new Exception("CVV inválido. Deve conter exatamente 3 dígitos.");
        }
        
        if (!is_numeric($valor) || $valor <= 0) {
            throw new Exception("Valor inválido. Deve ser um número positivo.");
        }

        if (!$this->numeroValido($numero)) {
            throw new Exception("Número do cartão inválido.");
        }
    }


    private function numeroValido($numero) {
        $numero = preg_replace('/\D/', '', $numero);
        $soma = 0;
        $par = false;

        for ($i = strlen($numero) - 1; $i >= 0; $i--) {
            $digito = (int)$numero[$i];

            if ($par) {
                $digito *= 2;
                if ($digito > 9) {
                    $digito -= 9;
                }
            }

            $soma += $digito;
            $par = !$par;
        }

        return $soma % 10 === 0;
}
}