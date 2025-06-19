<?php 

require_once "./../../components/head.php";
require_once "./../../components/acoes.php";

 ?>

<body>
    <header>
        <?php require_once "./../../components/navbar.php"; ?>
    </header>
    <main class="main-container">
        <!-- Começar aqui -->
        <?php require_once "./../../components/back-button.php" ?>
        <h1 class="titulo-pagina-tabela" >Validação de ONGs</h1>
        <table class="tabela">
                <thead>
                    <tr>
                        <th>Nome da ONG</th>
                        <th>Data de Cadastro</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i =0; $i<=10; $i++): ?>
                    <tr>
                        <td>Nome Ong</td>
                        <td>01/01/2025</td>
                        <td>Aguardando</td>
                        <td class="acoes-validar-usuario">
                            <?php 
                                renderAcao('aceitar'); 
                                renderAcao('recusar'); 
                            ?>
                            <a href="/together/view/pages/visaoSobreaOng.php">
                                <?php renderAcao('visualizar');?> 
                            </a>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>        
    </main>
    <?php require_once './../../components/footer.php'?>

    
        
</body>

