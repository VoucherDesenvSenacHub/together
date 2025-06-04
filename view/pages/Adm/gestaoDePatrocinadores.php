<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>

<body>
    <header>
<<<<<<< HEAD
        <?php require_once './../../components/navbar.php'?>

    <section class="sec1">
        <div class="lista-patrocinadores texto-gradient">  
            <h1 class="">Lista Patrocinadores</h1>
      
            <ul>
                <li>
                    <div>
                        <img src="" alt="logo imagem">
                    <p>XXXXXXXXXXXXX</p>
                    </div>
                    <label class="container-check">
                        <input checked="checked" type="checkbox">
                        <div class="checkmark"></div>
                    </label>
                </li>
                <li>
                    <div>
                        <img src="" alt="logo imagem">
                    <p>XXXXXXXXXXXXX</p>
                    </div>
                    <label class="container-check">
                        <input checked="checked" type="checkbox">
                        <div class="checkmark"></div>
                    </label>
                </li>
                <li>
                    <div>
                        <img src="" alt="logo imagem">
                    <p>XXXXXXXXXXXXX</p>
                    </div>
                    <label class="container-check">
                        <input checked="checked" type="checkbox">
                        <div class="checkmark"></div>
                    </label>
                </li>
                <li>
                    <div>
                        <img src="" alt="logo imagem">
                    <p>XXXXXXXXXXXXX</p>
                    </div>
                    <label class="container-check">
                        <input checked="checked" type="checkbox">
                        <div class="checkmark"></div>
                    </label>
                </li>
                <li>
                    <div>
                        <img src="" alt="logo imagem">
                    <p>XXXXXXXXXXXXX</p>
                    </div>
                    <label class="container-check">
                        <input checked="checked" type="checkbox">
                        <div class="checkmark"></div>
                    </label>
                </li>
            </ul>
        </div>
    </section>
    <section class="sec2">
        <div class="btn-delete-add">
            <div>
                <label class="container-ad">
                    <div class="deletar-patrocinador">
                        <span class="uil--trash"></span>
                    </div>
                </label>
            </div>
            <div>
                <label class="container-ad">
                    <div class="adicionar-patrocinador">
                        <span class="uil--plus"></span>
                    </div>
                </label>
            </div>
        </div>
        </section>
    </section>
    <dialog class="container-remove-patrocinador">
        <div class="content-top">
            <h1 class="titulo-remove-patrocinador">Remover Patrocinador</h1>
            <div class="div-botao-fechar">
                <button class="botao-fechar">
                    <svg class="icone-fechar-remove-patrocinador" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M20 20L4 4m16 0L4 20"/></svg>
                </button>
            </div>
            
        </div>
        <div class="content">
=======
        <?php require_once './../../components/navbar.php' ?>
    </header>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="container-botao-patrocinadores">
            <div class="titulo-pagina-tabela">
                <h1>Patrocinadores</h1>
            </div>
            <div class="filtro-botao-patrocinador">
                <?= inputFilter('text', 'filtroPatrocinador', 'filtroPatrocinador', "BUSCAR") ?>
                <div class="div-btn-patrocinador">
                    <?= botao('primary', 'Novo', 'abrir-patrocinadores') ?>
                </div>
            </div>
        </div>
>>>>>>> 2962f672661f301bfcac8bcf3c0ecb2b31315a55

        <table class="tabela">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++): ?>
                    <tr>
                        <td>
                            <img src="\together\view\assests\images\Adm\image.png" alt="" class="logo-patrocinador">
                        </td>
                        <td class="nome-patrocinador">Senac Hub Academy</td>
                        <td>
                            <div class="acoes-container">
                                <?= renderAcao('editar', '', 'abrir-patrocinadores') ?>
                                <?= renderAcao('deletar') ?>
                            </div>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <div class="modal-overlay" id="modal-overlay-patrocinadores">
            <div class="modal-content">
                <div class="inserir-patrocinadores">
                    <div class="inputs-patrocinadores">
                        <div>
                            <?= label('patrocinador', 'Patrocinador') ?>
                            <?= inputRequired('text', 'patrocinador', 'patrocinador') ?>
                        </div>
                        <div>
                            <?= label('redePatrocinador', 'Rede Social') ?>
                            <?= inputRequired('text', 'redePatrocinador', 'redePatrocinador') ?>
                        </div>
                    </div>
                    <div>
                        <?php require_once './../../components/upload.php' ?>
                    </div>
                </div>
                <div class="botao-modal-patrocinadores">
                    <div class="modal-botoes">
                        <?= botao('primary', 'Cancelar', 'fechar-patrocinadores') ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once './../../components/footer.php' ?>

    
</body>
</html>
