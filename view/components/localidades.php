<?php
function getEstadosDoJson($caminhoJson = null) {
    if (!$caminhoJson) {
        $caminhoJson = __DIR__ . '/../../data/enderecos.json'; 
    }

    if (!file_exists($caminhoJson)) {
        echo "Arquivo JSON não encontrado: $caminhoJson";
        return [];
    }

    $jsonString = file_get_contents($caminhoJson);
    $dados = json_decode($jsonString, true);

    if ($dados === null) {
        echo "Erro ao decodificar JSON: " . json_last_error_msg();
        return [];
    }

    return $dados; // array completo dos estados
}

function getCidadesDoJson($estadoSigla, $caminhoJson = null) {
    $estados = getEstadosDoJson($caminhoJson);

    foreach ($estados as $estado) {
        if (isset($estado['sigla']) && $estado['sigla'] === $estadoSigla) {
            return $estado['cidades'] ?? [];
        }
    }

    return [];
}
?>
