<?php require_once "./../../components/head.php"; ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <div class="validacao_voluntario_container">
        <div class="div_title">
            <h1 class="title">Validação de Voluntários</h1>
        </div>
        <div class="list_voluntarios">

            <table class="table">
                <thead>
                    <th>Data</th>
                    <th>Voluntário</th>
                    <th>Status</th>
                    <th>Visualizar</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text">12/03/2024</td>
                        <td class="text">João Silva</td>
                        <td class="text">Aguardando <i id="ampulheta" class="fa-solid fa-hourglass-half"></i></td>
                        <td>
                            <button class="eye_icon_button">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i id="eye_icon" class="fa-regular fa-eye"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text">10/03/2024</td>
                        <td class="text">Maria Oliveira</td>
                        <td class="text">Aguardando <i id="ampulheta" class="fa-solid fa-hourglass-half"></i></td>
                        <td>
                            <button class="eye_icon_button">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i id="eye_icon" class="fa-regular fa-eye"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text">08/03/2024</td>
                        <td class="text">Carlos Souza</td>
                        <td class="text">Aguardando <i id="ampulheta" class="fa-solid fa-hourglass-half"></i></td>
                        <td>
                            <button class="eye_icon_button">
                                <span class="material-symbols-outlined">
                                    <a href="https://google.com"><i id="eye_icon" class="fa-regular fa-eye"></i></a>
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>
