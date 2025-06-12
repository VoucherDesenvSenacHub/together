<?php 

    /**
     * Renderiza um componente de card
     * 
     * @param string $imagem - é através do imagem que colocamos a imagem desse card com o PHP;
     * @param string $titulo - é utilizado para atribuir título ao card;
     * @param string $descricao - é utilizado para adicionar uma pequeno texto uma descrição;
     * 
     * @return string - HTML para renderizar o card;
     */

  function cardOng($imagem,$titulo,$descricao) {
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
            <div class='card-btn'>" .
                botao('primary','Descobrir','','/together/view/pages/visaoSobreaOng.php') .
            "</div>
        </div>
    </div>
    ";
  }

  function cardSobreNos($titulo,$descricao,$descricao2 = "",$descricao3 = "") {
    return 
    "
    <div class='sobre-nos-card'>
        <h2>$titulo</h2>
        <p>$descricao</p>
        <p>$descricao2</p>
        <p>$descricao3</p>
    </div>
    ";
  }

?>