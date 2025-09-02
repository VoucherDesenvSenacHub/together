<?php include "../components/card.php"; ?>
<?php require_once "../../view/components/head.php" ?>
<?php require_once "./../components/button.php" ?>
<?php require_once "./../components/input.php" ?>
<?php require_once "./../../model/DevModel.php" ?>

<link rel="stylesheet" href="../assests/css/reset.css">
<link rel="stylesheet" href="../assests/css/style.css">
<link rel="stylesheet" href="../assests/css/pages/copyright.css">

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