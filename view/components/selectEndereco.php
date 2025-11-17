<?php
require_once "select.php";

function renderSelectEstado(string $estadoSelecionado = '') {
    $caminhoJson = __DIR__ . '/../../data/enderecos.json';
    $data = json_decode(file_get_contents($caminhoJson), true);
    $estados = $data['estados'] ?? [];

    $opcoesEstados = [];
    foreach ($estados as $estado) {
        $opcoesEstados[$estado['sigla']] = $estado['nome'];
    }

   
    echo "<script>window.estados = " . json_encode($estados) . ";</script>";

   
    echo selectDefault('estado', 'estado', $opcoesEstados, $estadoSelecionado);
}

function renderSelectCidade(string $estadoSelecionado = '', string $cidadeSelecionada = '') {
    $caminhoJson = __DIR__ . '/../../data/enderecos.json';
    $data = json_decode(file_get_contents($caminhoJson), true);
    $estados = $data['estados'] ?? [];

    $opcoesCidades = [];
    if ($estadoSelecionado) {
        foreach ($estados as $estado) {
            if ($estado['sigla'] === $estadoSelecionado) {
                foreach ($estado['cidades'] as $cidade) {
                    $opcoesCidades[$cidade] = $cidade;
                }
                break;
            }
        }
    }

    echo selectDefault('cidade', 'cidade', $opcoesCidades, $cidadeSelecionada);
}
