<?php require_once './../../components/head.php' ?>

<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <div class="select">
            <div class="selected" data-default="Todos" data-one="option-1" data-two="option-2" data-three="option-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="arrow">
                    <path
                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z">
                    </path>
                </svg>
            </div>
            <div class="options">
                <div title="all">
                    <input id="all" name="option" type="radio" checked="" />
                    <label class="option" for="all" data-txt="Todos"></label>
                </div>
                <div title="option-1">
                    <input id="option-1" name="option" type="radio" />
                    <label class="option" for="option-1" data-txt="Janeiro"></label>
                </div>
                <div title="option-2">
                    <input id="option-2" name="option" type="radio" />
                    <label class="option" for="option-2" data-txt="Fevereiro"></label>
                </div>
                <div title="option-3">
                    <input id="option-3" name="option" type="radio" />
                    <label class="option" for="option-3" data-txt="Março"></label>
                </div>
                <div title="option-4">
                    <input id="option-4" name="option" type="radio" />
                    <label class="option" for="option-4" data-txt="Abril"></label>
                </div>
                <div title="option-5">
                    <input id="option-5" name="option" type="radio" />
                    <label class="option" for="option-5" data-txt="Maio"></label>
                </div>
                <div title="option-6">
                    <input id="option-6" name="option" type="radio" />
                    <label class="option" for="option-6" data-txt="Junho"></label>
                </div>
                <div title="option-7">
                    <input id="option-7" name="option" type="radio" />
                    <label class="option" for="option-7" data-txt="Julho"></label>
                </div>
                <div title="option-8">
                    <input id="option-8" name="option" type="radio" />
                    <label class="option" for="option-8" data-txt="Agosto"></label>
                </div>
                <div title="option-9">
                    <input id="option-9" name="option" type="radio" />
                    <label class="option" for="option-9" data-txt="Setembro"></label>
                </div>
                <div title="option-10">
                    <input id="option-10" name="option" type="radio" />
                    <label class="option" for="option-10" data-txt="Outubro"></label>
                </div>
                <div title="option-11">
                    <input id="option-11" name="option" type="radio" />
                    <label class="option" for="option-11" data-txt="Novembro"></label>
                </div>
                <div title="option-12">
                    <input id="option-12" name="option" type="radio" />
                    <label class="option" for="option-12" data-txt="Dezembro"></label>
                </div>

            </div>
        </div>

        <table>
            <thead>
                <tr class="row-head">
                    <th>Data de Cadastro</th>
                    <th>Nome dos Perfis</th>
                    <th>Tipo de Perfil</th>
                    <th>Visualizar</th>
                </tr>
            </thead>
            <tbody class="body-table">
                <tr>
                    <td class="row-body-table">xx/xx/xxxx</td>
                    <td class="row-body-table">XXXXX</td>
                    <td>Ong</td>
                    <td>
                        <form action="" method="get">
                            <button class="buttom-visibility-ong-status">
                                <img class="exibicao-visualizar-ong" src="../../assests/images/ong/eye.png"
                                    alt="visualizar">
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <?php require_once './../../components/footer.php' ?>
</body>