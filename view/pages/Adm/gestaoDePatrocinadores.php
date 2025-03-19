<?php require_once './../../components/head.php'?>

<body>
    <header>
        <?php require_once './../../components/navbar.php'?>

    </header>
    <main class="main-container">
        <?php require_once './../../components/back-button.php'?>
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

                <div class="content-info">

                    <div class="logo-patrocinador">
                        <img src="" alt="logo-patrocinador.png">
                    </div>
                    <div class="nome-patrocinador">
                        <h5 class="nome-patrocinador-h5">XXXXXXXXXXXXXXX</h5>
                    </div>

                </div>
                <div class="content-botoes">

                    <div class="div-botao-cancelar">
                        <button class="botao-cancelar-remove-patrocinador" type="button"> Cancelar </button>
                    </div>
                    <div class="div-botao-remover">
                        <button class="botao-remover" type="button"> Remover </button>
                    </div>

                </div>                

            </div>        
        </dialog>
        <dialog class="container-adiciona-patrocinador">
                <div class="content-top">
                    <h1 class="titulo-add-patrocinador">Adicionar Patrocinador</h1>
                    <div class="div-botao-fechar">
                        <button class="botao-fechar">
                            <svg class="icone-fechar-adidiona-patrocinador" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M20 20L4 4m16 0L4 20"/></svg>
                        </button>
                    </div>
                    
                </div>
                <div class="content">
                    <form action="" class="form-adiciona-patrocinador">

                        <div class="div-info-patrocinador">
                                <input type="text" placeholder="Rede Social">
                                <input type="text" placeholder="Nome do patrocinador">

                        </div>
                        <div class="div-info-patrocinio">
                            <div class="data-vencimento">
                                <input placeholder="Data de vencimento" id="data-patrocinio" type="date"  placeholder="Data de vencimento" required>
                            </div>
                            <div class="logo-upload">
                                <label for="logo">Logotipo do patrocinador</label>
                                <input type="file" id="logo" name="logo" accept="image*/" required>
                            </div>
                        </div>
                        
                        <div class="div-botao-adicionar">
                            <button class="botao-enviar" onclick="checkDate()" type="button"> Adicionar </button>
                        </div>

                    </form>

                </div>
                
        </dialog>


    </main>
<?php require_once './../../components/footer.php'?>

</body>

</html>