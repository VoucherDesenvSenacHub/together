<?php 

    /**
     
     * 
     * @param string $imagem 
     * @param string $titulo 
     * @param string $descricao
     * 
     * @return string 
     */

  function cardOng($imagem,$titulo,$descricao,$idOng = "") {
    return 
    "
    <div class='card-group'>
        <div class='card-top'>
            <img class='card-image' src='$imagem' alt='Imagem da Ong'>
        </div>
        <div class='card-bottom'>
            <div class='card-info'>
                <h3 class='card-title'>$titulo</h3>
                <p class='card-description'>$descricao</p>
            </div>
            <a class='card-btn' href='/together/view/pages/visaoSobreaOng.php?id=$idOng'>" .
                botao('primary','Descobrir') .
            "</a>
        </div>
    </div>
    ";
  }

  function cardSobreNos($titulo,$descricao) {
    return 
    "
    <div class='sobre-nos-card'>
        <h2>$titulo</h2>
        <p>$descricao</p>
    </div>
    ";
  }

  function cardCopyright($imagem, $nome, $github = '', $linkedin = '') {
    $semGithub = empty($github) || $github === "?=usuarioNãoPossuiGithub";
    $semLinkedin = empty($linkedin) || $linkedin === "?=usuarioNãoPossuiLinkedin";

    return "
    <div class='card-group'>
        <div class='card-top'>
            <img class='card-image' src='$imagem' alt='Imagem do Dev'>
        </div>
        <div class='card-bottom'>
            <div class='card-info'>
                <h3 class='card-title'>$nome</h3>
                <div id='linksCopyright'>
                    <div class='text-align'>
                        <i class='fa-brands fa-github fa-2xl'></i>  
                        " . (
                            !$semGithub
                            ? "<a class='card-btn' href='$github' target='_blank'>
                            Github
                            </a>"
                            : "<span class='card-btn'>Não disponível</span>"
                        ) . "
                    </div>
                    <div class='text-align'>
                        <i class='fa-brands fa-square-linkedin fa-2xl'></i>
                        " . (
                            !$semLinkedin
                            ? "<a class='card-btn' href='$linkedin' target='_blank'>
                                LinkedIn
                                </a>"
                            : "<span class='card-btn'>Não disponivel</span>"
                        ) . "
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
    }
?>