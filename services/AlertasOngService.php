<?php

require_once __DIR__ . "/../model/OngModel.php";
require_once __DIR__ . "/../view/components/alert.php";

class AlertasOngService
{
    public static function alertaDadosIncompletos()
    {
        if (!isset($_SESSION['id']) || $_SESSION['perfil'] !== 'Ong') {
            return;
        }

        $ongModel = new OngModel();
        $ong = $ongModel->buscarOngPorIdUsuario($_SESSION['id']);

        $imagemPerfil = $ong['id_imagem'] ?? null;
        $endereco = $ong['id_endereco'] ?? null;

        if (empty($imagemPerfil) && empty($endereco)) {
            showPopup('atencao', 'Adicione um endereço e imagem de perfil');
        }
        elseif (empty($imagemPerfil)) {
            showPopup('atencao', 'Adicione uma imagem de perfil');
        }
        elseif (empty($endereco)) {
            showPopup('atencao', message: 'Adicione um endereço');
        }   
    }
}
