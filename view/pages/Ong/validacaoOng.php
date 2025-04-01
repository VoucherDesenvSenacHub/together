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
                                    <i class="fa-regular fa-eye validacao-ong-icone-visualizar"></i>
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
                                    <i class="fa-regular fa-eye validacao-ong-icone-visualizar"></i>
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
                                    <i class="fa-regular fa-eye validacao-ong-icone-visualizar"></i>   
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <dialog class="container-valida-ong">
                <div class="container-formulario">
                    <form class="form-valida-ong" action="">
                        <div class="cabecalho-formulario">
                            <div class="titulo-formulario">
                                <h4 class="subtitulo-nome" >Nome</h4>
                                <h1 class="titulo-nome" >XXXXXXXXXXXX</h1>
                            </div>
                            <div class="container-botao-fechar-dialog">
                                <span class="botao-fechar-dialog" >X</span> 
                            </div>
                        </div>                        
                        <div class="conteudo-formulario">
                            <label for="" class="label-cnpj">CNPJ</label>
                            <input type="text" class="input-cnpj" placeholder="xxxxxxxxxxxxx">

                        <div class="container-data-telefone">

                            <div class="container-data">

                            <label for="" class="label-data-fundacao">Data de fundação</label>
                            <input type="date" class="input-data-fundacao">

                            </div>

                            <div class="container-telefone">

                            <label for="" class="label-telefone">Telefone</label>
                            <input type="" class="input-telefone" placeholder="+55 (xx) xxxxx-xxxx">
                            
                            </div>

                        </div>                       


                            <label for="" class="label-endereco">Endereço</label>
                            <input type="text" class="input-endereco" placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx">
                            <div class="container-conselho-fiscal-e-tipo-ong">
                                <div class="container-conselho-fiscal">
                                    <label for="" class="label-conselho-fiscal">Conselho fiscal</label>
                                    <div>
                                    <label for="input-conselho-fiscal" class="label-input-conselho-fiscal">
                                            <span class="material-symbols-outlined">
                                                attach_file
                                            </span>
                                    </label>
                                    <input placeholder="" type="file" class="input-conselho-fiscal">
                                    </div>

                                   
                                </div>
                                <div class="container-tipo-ong">
                                    <label for="" class="label-tipo-ong">Tipo da ONG</label>
                                    <input type="text" class="input-tipo-ong" placeholder="xxxxxxxxxxx">
                                
                                </div>
                            </div>
                            <div class="container-logo-ong-e-email">
                                <div class="container-logo-ong">
                                    <label for="" class="label-logo-ong">Logo da ONG</label>
                                    <label for="input-logo-ong" class="label-logo-ong-input-plaeholder">
                                            <span class="material-symbols-outlined">
                                                attach_file
                                            </span>
                                    </label>
                                    <input placeholder="" type="file" class="input-logo-ong">
                                </div>
                                <div class="container-email">
                                    <label for="" class="label-email">E-mail</label>
                                    <input type="text" class="input-email" placeholder="xxxxxxxxxxxxx@xxxxx.xxx.xx">
                                </div>
                            </div>
                        </div> 

                        <div class="botoes-formulario">
                            <button class="botao-cancelar-formulario" type="button" > Cancelar</button>
                            <button class="botao-enviar-formulario" type="submit" >Enviar</button>
                        </div>                     
                    </form>
                </div>
            </dialog>

            <dialog class="container-observacao-ong">
                <div class="container-observacao">
                    <form class="form-observacao-ong" action="">
                        <div  class="cabecalho-observacao" >  
                            <div class="titulo-observacao">
                                <h4 class="observacao-nome" >Observação</h4>
                            </div>
                            <div class="container-botao-fechar-observacao">
                            <span class="botao-fechar-dialog-observacao">
                                X
                            </span>
                            </div>
                            

                        </div>
                        <div class="container-observacao">
                                <input type="text" class="input-observacao" placeholder="Digite sua observação:">
                            </div>
                        <div class="botao-observacao">
                            <button class="botao-enviar-observacao" type="submit" >Enviar</button>
                        </div>  

                    </form>
                
                </div>

            </dialog>

        
    </main>
    <?php require_once './../../components/footer.php'?>

    
        
</body>

