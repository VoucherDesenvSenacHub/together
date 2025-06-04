<?php
function renderAcao($action, $extraClasses = '', $id = '') {
    // Define os ícones, classes de estilo e estilos inline
    $icons = [
        'visualizar' => ['eye', 'fa-regular', 'color: #000000;'],
        'editar'     => ['pen-to-square', 'fa-solid', ''],
        'deletar'    => ['trash', 'fa-solid', ''],
        'baixar'     => ['download','fa-solid','color: #000000;'],
        'aceitar'    => ['check','fa-solid','color: var(--cor-botao-salvar);'],
        'recusar'    => ['xmark', 'fa-solid', 'color: var(--cor-botao-excluir);']
    ];

    if (isset($icons[$action])) {
        [$iconName, $styleClass, $inlineStyle] = $icons[$action];
        echo "<i id=\"$id\" class=\"{$styleClass} fa-{$iconName} acao {$extraClasses}\"" . 
             (!empty($inlineStyle) ? " style=\"{$inlineStyle}\"" : "") . 
             "></i>";   
    } else {
        echo '';
    }
}
