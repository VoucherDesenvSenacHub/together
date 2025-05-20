<?php
function renderAcao($action, $extraClasses = '') {
    // Define os ícones, classes de estilo e estilos inline
    $icons = [
        'visualizar' => ['eye', 'fa-regular', 'color: #000000;'],
        'editar'     => ['pen-to-square', 'fa-solid', ''],
        'deletar'    => ['trash', 'fa-solid', ''],
        'baixar'     => ['down-long','fa-solid','color: #000000;']
    ];

    if (isset($icons[$action])) {
        [$iconName, $styleClass, $inlineStyle] = $icons[$action];
        echo "<i class=\"{$styleClass} fa-{$iconName} acao {$extraClasses}\"" . 
             (!empty($inlineStyle) ? " style=\"{$inlineStyle}\"" : "") . 
             "></i>";
    } else {
        echo '';
    }
}
