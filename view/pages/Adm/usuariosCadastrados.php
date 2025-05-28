<?php

require_once './../../components/head.php';

require_once "./../../components/acoes.php";

$meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

$tiposUsuarios = ['Usuário', 'Ong', 'Adm'];


?>

<body>
    
    <?php
    
        require_once './../../components/navbar.php';
    
    ?>

    <main class="main-container">
    <?php
    
        require_once './../../components/back-button.php';
    
    ?>
        <!-- <div class="usuarios-cadastrados-background"> -->
            <div class="titulo-pagina-tabela">
                <h1>Ongs e Usuários Cadastrados</h1>
            </div>
                <form action="" class="formulario-usuarios-cadastrados">
                    <div class="formulario-buscar-usuarios">                
                        <div class="elementos-formulario">
                            <!-- <label for="" class="formulario-label">Nome</label> -->
                            <input type="text" class="formulario-input" placeholder="Nome">
                        </div>
                        <div class="elementos-formulario">
                            <!-- <label for="" class="formulario-label">Tipo de cadastro</label> -->
                            <select name="tipos-cadastros" id="tipos-cadastros" class="formulario-select">
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuário</option>
                                    <option value="3">Ong</option>
                            </select>
                        </div>
                        <div class="elementos-formulario">
                            <!-- <label for="" class="formulario-label">Mês</label> -->
                            <select name="meses" id="meses" class="formulario-select">
                                <?php for ($i = 0; $i < count($meses); $i++):  ?>
                                <option value="<?= $i ?>"><?= $meses[$i] ?></option>
                                <?php 
                                endfor; 
                                ?>
                            </select>
                        </div>
                        <div class="elementos-formulario">
                            <!-- <label for="" class="formulario-label">Ano</label> -->
                            <select name="anos" id="anos" class="formulario-select">
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                    </div>
                    <div class="botao-pesquisar-usuarios">
                        <button class="botao botao-primary">Buscar</button>
                    </div>
                </form>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo de cadastro</th>
                            <th>Data de cadastro</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i<=10; $i++):
                            ?>
                         <tr>
                            <td>XXXXXXXXX</td>
                            <td><?php
                            echo $tiposUsuarios[($i%3)];
                            ?></td>
                            <td>XX/XX/XXXX</td>
                            <td>
                                <?php if($tiposUsuarios[($i%3)] == 'Ong'):   ?>
                                    <a href="./../Adm/visaoSobreaOng.php">
                                        <?php renderAcao('visualizar'); ?></a>
                                <?php else: ?>
                                    <a href="./../Adm/visaoDoUsuario.php">
                                        <?php renderAcao('visualizar'); ?></a>
                               <?php endif; ?>
                            </td>
                         </tr>
                        <?php
                        endfor;
                        ?>
                    </tbody>
                </table>
                <?php
                
                    require_once './../../components/footer.php';

                ?>
        <!-- </div> -->
    </main>
</body>

<?php

require_once './../../components/footer.php';


?>