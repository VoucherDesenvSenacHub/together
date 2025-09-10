<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>
<?php require_once "../../components/select.php" ?>
<?php require_once "../../components/selectEndereco.php" ?>
<?php require_once "../../../controller/EnderecoController.php" ?>

<?php
$enderecoController = new EnderecoController();
$endereco = $enderecoController->endereco();
// $controller->salvarEdicao();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    // Monta array do endereço vindo do formulário
    $endereco = [
        'id' => $_POST['id'], // tem que garantir que o id vem do form, talvez input hidden
        'logradouro' => $_POST['logradouro'] ?? '',
        'numero' => $_POST['numero'] ?? '',
        'cep' => $_POST['cep'] ?? '',
        'complemento' => $_POST['complemento'] ?? '',
        'bairro' => $_POST['bairro'] ?? '',
        'cidade' => $_POST['cidade'] ?? '',
        'estado' => $_POST['estado'] ?? ''
    ];

    // Instancia sua model (ajuste conforme seu código)
    require_once '../../../model/EnderecoModel.php';
    $enderecoModel = new EnderecoModel();

    // Chama o método editar
    $sucesso = $enderecoModel->editar($endereco);

    if ($sucesso) {
        // Redireciona ou mostra mensagem de sucesso
        header('Location: /caminho/para/pagina_de_sucesso.php');
        exit;
    } else {
        echo "<p>Erro ao salvar as informações.</p>";
    }
}
?>


<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container main-min">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Editar Informações</h1>
            <div class="formulario-perfil">
                <form action="" method="POST" class="postagem-geral-form editar-informacoes-form">
                    <div class="container-perfil-voluntario">
                        <div class="div-logo">
                            <div class='formulario-imagem-preview'>
                                <?php require_once "./../../components/upload.php" ?>
                            </div>
                        </div>
                        <div class="container-readonly">
                            <div class="container-readonly-primary">
                                <div class="form-row">
                                    <div>
                                        <?= label('razao-social', 'Razão Social') ?>
                                        <?= inputReadonly('text', 'razao-social', 'razao-social', 'Jhon F. Kennedy') ?>
                                    </div>
                                    <div>
                                        <?= label('telefone', 'Telefone') ?>
                                        <?= inputReadonly('text', 'telefone', 'telefone', '+55 (67) 9 9999-9999') ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <?= label('cnpj', 'CNPJ') ?>
                                        <?= inputReadonly('text', 'cnpj', 'cnpj', '12.345.678/0001-95') ?>
                                    </div>
                                    <div>
                                        <!-- <?= label('tipo_ong', 'Data de Nascimento') ?>
                                        <?= inputFilter('date', 'data_nascimento', 'data_nascimento') ?> -->

                                        <?= label('ods', 'Tipo da Ong') ?>
                                        <?= selectReadonly('ods', 'ods', [
                                            "Erradicação da pobreza",
                                            "Fome zero e agricultura sustentável",
                                            "Saúde e bem-estar",
                                            "Educação de qualidade",
                                            "Igualdade de gênero",
                                            "Água potável e saneamento",
                                            "Energia limpa e acessível",
                                            "Trabalho decente e crescimento econômico",
                                            "Indústria, inovação e infraestrutura",
                                            "Redução das desigualdades",
                                            "Cidades e comunidades sustentáveis",
                                            "Consumo e produção responsáveis",
                                            "Ação contra a mudança global do clima",
                                            "Vida na água",
                                            "Vida terrestre",
                                            "Paz, justiça e instituições eficazes",
                                            "Parcerias e meios de implementação"
                                        ]) ?>

                                    </div>
                                </div>
                            </div>
                            <div class="container-input-email-voluntario">
                                <?= label('email', 'Email') ?>
                                <?= inputReadonly('text', 'email', 'email', 'jhon.f.kennedy@email.com') ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-endereco container-readonly-secondary">
                        <div class="titulo-endereco-voluntario">
                            <h1>Endereço</h1>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('cep', 'CEP') ?>
                                <?= inputReadonly('text', 'cep', 'cep', '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?php renderSelectEstado($endereco['estado'] ?? ''); ?>
                            </div>

                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?php renderSelectCidade($endereco['estado'] ?? '', $endereco['cidade'] ?? ''); ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputReadonly('text', 'bairro', 'bairro', '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputReadonly('text', 'logradouro', 'logradouro', '') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputReadonly('text', 'numero', 'numero', '') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputReadonly('text', 'complemento', 'complemento', '') ?>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-div-btn">
                        <?= botao('salvar', 'Salvar', 'btnSalvar', '', 'submit', 'salvar') ?>
                        <div class="postagem-geral-btn"><?= botao('cancelar', 'Cancelar') ?></div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>