<?php require_once "./../../components/head.php";
 ?>

<body>
    <header>
        <?php require_once "./../../components/navbar.php"; ?>
    </header>
    <main class="main-container">
        <!-- Começar aqui -->
        <?php require_once "./../../components/back-button.php" ?>
        <h1 class="validacao-ong-h1" >Validação de ONGs</h1>
        <table class="validacao-ong-tabela">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome das ONGs</th>
                        <th>Status</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="validacao-ong-texto">12/03/2024</td>
                        <td class="validacao-ong-texto">João Silva</td>
                        <td class="validacao-ong-texto">Aguardando</td>
                        <td>
                            <button class="validacao-ong-botao-visualizar">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i class="fa-regular fa-eye validacao-ong-icone-visualizar"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="validacao-ong-texto">10/03/2024</td>
                        <td class="validacao-ong-texto">Maria Oliveira</td>
                        <td class="validacao-ong-texto">Aguardando</td>
                        <td>
                            <button class="validacao-ong-botao-visualizar">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i class="fa-regular fa-eye validacao-ong-icone-visualizar"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="validacao-ong-texto">08/03/2024</td>
                        <td class="validacao-ong-texto">Carlos Souza</td>
                        <td class="validacao-ong-texto">Aguardando</td>
                        <td>
                            <button class="validacao-ong-botao-visualizar">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i class="fa-regular fa-eye validacao-ong-icone-visualizar"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
    </main>
        
</body>