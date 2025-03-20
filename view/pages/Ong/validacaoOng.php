<?php require_once "./../../components/head.php"; ?>

<body>
    <header>
        <?php require_once "./../../components/navbar.php"; ?>
    </header>
    <main class="main-container">
        <!-- Começar aqui -->
        <table class="validacao-voluntario-tabela">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Voluntário</th>
                        <th>Status</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="validacao-voluntario-texto">12/03/2024</td>
                        <td class="validacao-voluntario-texto">João Silva</td>
                        <td class="validacao-voluntario-texto">Aguardando</td>
                        <td>
                            <button class="validacao-voluntario-botao-visualizar">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i class="fa-regular fa-eye validacao-voluntario-icone-visualizar"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="validacao-voluntario-texto">10/03/2024</td>
                        <td class="validacao-voluntario-texto">Maria Oliveira</td>
                        <td class="validacao-voluntario-texto">Aguardando</td>
                        <td>
                            <button class="validacao-voluntario-botao-visualizar">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i class="fa-regular fa-eye validacao-voluntario-icone-visualizar"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="validacao-voluntario-texto">08/03/2024</td>
                        <td class="validacao-voluntario-texto">Carlos Souza</td>
                        <td class="validacao-voluntario-texto">Aguardando</td>
                        <td>
                            <button class="validacao-voluntario-botao-visualizar">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i class="fa-regular fa-eye validacao-voluntario-icone-visualizar"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
    </main>
        
</body>