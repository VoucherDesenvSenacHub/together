<?php
require_once __DIR__ . "/../model/DevModel.php";

$devModel = new DevModel();
$devList = $devModel->devBuscarTudo();

$vetor = [];

foreach ($devList as $dev) {
    $vetor[] = [
        "nome" => $dev["nome"],
        "linkedin" => $dev["linkedin"],
        "github" => $dev["github"],
        "imagem" => $dev["imagem"]
    ];
}
?>