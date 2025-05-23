<?php
require_once './../../components/head.php';

require_once "./../../components/acoes.php";
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
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
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
                        <?php for ($i = 0; $i<10; $i++):
                            ?>
                         <tr>
                            <td>XXXXXXXXX</td>
                            <td>XXXXXXXX</td>
                            <td>XX/XX/XXXXX</td>
                            <td>
                                <?php renderAcao('visualizar'); ?>
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