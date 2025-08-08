<?php require_once "../../view/components/head.php" ?>
<?php include "../components/card.php"; ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>

<link rel="stylesheet" href="../assests/css/reset.css">
<link rel="stylesheet" href="../assests/css/style.css">
<link rel="stylesheet" href="../assests/css/pages/copyright.css">


<?php
    $vetor = [
        [
            "nome" => "Eduardo Serafim",
            "github" => "https://github.com/eduardoserafiim",
            "linkedin" => "https://www.linkedin.com/in/eduardo-serafim-821649305/",
            "imagem" => "../assests/images/Copyright/serafim.png"
        ],
        [
            "nome" => "Henrico Queiroz",
            "github" => "https://github.com/HenricQ",
            "linkedin" => "https://www.linkedin.com/in/henrico-queiroz-725007325/",
            "imagem" => "../assests/images/Copyright/queiroz.png"
        ],
        [
            "nome" => "Vitor Galvão",
            "github" => "https://github.com/vitorgalvao0",
            "linkedin" => "https://www.linkedin.com/in/vitor-galv%C3%A3o-299891317/",
            "imagem" => "../assests/images/Copyright/galvao.png"
        ],
        [
            "nome" => "Antônio Victor",
            "github" => "https://github.com/AntonioV1ctor",
            "linkedin" => "https://www.linkedin.com/in/antoniov1ctor/",
            "imagem" => "../assests/images/Copyright/victor.png"
        ],
        [
            "nome" => "Luan Mendes",
            "github" => "https://github.com/LuanMendesMoura",
            "linkedin" => "https://www.linkedin.com/in/luan-m-26b8342bb/",
            "imagem" => "../assests/images/Copyright/mendes.png"
        ],
        [
            "nome" => "Gabrielle Faustino",
            "github" => "https://github.com/GabrielleFaus",
            "linkedin" => "https://www.linkedin.com/in/gabrielle-faustino-025aa1264/",
            "imagem" => "../assests/images/Copyright/faustino.png"
        ],
        [
            "nome" => "Rogério Vicente",
            "github" => "https://github.com/rogeriovc",
            "linkedin" => "?=usuarioNãoPossuiLinkedin",
            "imagem" => "../assests/images/Copyright/vicente.png"
        ],       
    ]

?>
<body>
    <div class="global">
        <div class="login-icon-group">  
            <?php require_once './../components/back-button.php' ?>
        </div>
        <div class="container">
            <?php foreach($vetor as $item)
            {
                echo cardCopyright($item['imagem'], $item['nome'], $item['github'], $item['linkedin']);
            }
            ?>    
        </div>
    </div>
    <script src="https://kit.fontawesome.com/67403b1896.js" crossorigin="anonymous"></script>
</body>
</html>