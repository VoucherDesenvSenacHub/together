<?php require_once './../../services/AutenticacaoService.php';
AutenticacaoService::validarAcessoLogado(['Usuario']);  ?>
<?php require_once "../../view/components/head.php";
require_once "./../components/button.php";
require_once "./../components/input.php";
require_once "./../components/label.php";
require_once "./../components/select.php";
require_once "./../components/selectEndereco.php";
require_once "./../components/alert.php";
require_once "./../../model/CategoriaOngModel.php";

$categoriaModel = new CategoriaOngModel();
$categorias = $categoriaModel->getAll();
?>

<body class="body-login">

    <?php
    // Popup do session
    if (isset($_SESSION['type'], $_SESSION['message'])) {
        showPopup($_SESSION['type'], $_SESSION['message']);
        unset($_SESSION['type'], $_SESSION['message']);
    }

    if (!isset($_SESSION['step'])) {
        $_SESSION['step'] = 1;
    }
    ?>

    <div class="container-login">
        <div class="login-icon-group">
            <?php $_SESSION['step'] === 2 ? '' : require_once './../components/back-button.php' ?>
        </div>


        <div class="conteudo-login">

            <div class="logo-login">
                <img src="../assets/images/components/logoTogetherLogin.png" alt="logo" class="logo-imagem-login">
            </div>

            <div class="box-login">

                <form class="login" method="POST" action="">
                    <h1 class="titulo-login">Cadastrar ONG</h1>

                    <?php if ($_SESSION['step'] === 1): ?>
                        <div class="step active">
                            <div class="container-input-login">
                                <div>
                                    <?= label('cnpj', 'CNPJ') ?>
                                    <?= inputRequired('text', 'cnpj', 'cnpj', $_SESSION['cnpj'] ?? '') ?>
                                </div>
                                <div>
                                    <?= label('razao_social', 'Razão Social') ?>
                                    <?= inputRequired('text', 'razao_social', 'razao_social', $_SESSION['razao_social'] ?? '') ?>
                                </div>
                                <div>
                                    <?= label('telefone', 'Telefone') ?>
                                    <?= inputRequired('text', 'telefone', 'telefone', $_SESSION['telefone'] ?? '') ?>
                                </div>
                                <div>
                                    <?= label('id_categoria', 'Categoria da ONG') ?>
                                    <?= selectCategoriasOng('id_categoria', 'id_categoria', $categorias, $_SESSION['id_categoria'] ?? null) ?>
                                </div>
                                <div class="botao-login group-btn-cadastro-ong">
                                    <?= botao('next', 'Próximo', name: 'step_action', value: 'next', formaction: '/together/controller/OngCadastrarController.php') ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($_SESSION['step'] === 2): ?>
                        <div class="step active">
                            <div class="container-input-login">
                                <div>
                                    <?= label('cep', 'CEP') ?>
                                    <?= inputRequired('text', 'cep', 'cep') ?>
                                </div>
                                <div>
                                    <?= label('logradouro', 'Logradouro') ?>
                                    <?= inputRequired('text', 'logradouro', 'logradouro') ?>
                                </div>

                                <div>
                                    <?= label('bairro', 'Bairro') ?>
                                    <?= inputRequired('text', 'bairro', 'bairro') ?>
                                </div>
                                <div>
                                    <?= label('estado', 'Estado') ?>
                                    <?php renderSelectEstado($endereco['estado'] ?? '',); ?>
                                </div>
                                <div>
                                    <?= label('cidade', 'Cidade') ?>
                                    <?php renderSelectCidade($endereco['estado'] ?? '', $endereco['cidade'] ?? ''); ?>
                                </div>
                                <div class="cadastrar-ong-row-endereco">
                                    <div class="numero">
                                        <?= label('numero', 'Número') ?>
                                        <?= inputRequired('number', 'numero', 'numero') ?>
                                    </div>
                                    <div class="complemento" > 
                                        <?= label('complemento', 'Complemento') ?>
                                        <?= inputDefault('text', 'complemento', 'complemento') ?>
                                    </div>
                                </div>

                                <div class="botao-login group-btn-cadastro-ong">
                                    <?= botaoFormNoValide('prev', 'Voltar', name: 'step_action', value: 'prev', formaction: '/together/controller/OngCadastrarController.php') ?>
                                    <?= botao('salvar', 'Enviar', name: 'step_action', value: 'salvar', formaction: '/together/controller/OngCadastrarController.php') ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>
    <!-- Não Apagar -->
    <script src="/together/view/assets/js/pages/mascara.js"></script>
    <script src="/together/view/assets/js/components/selectEndereco.js"></script>
</body>

</html>