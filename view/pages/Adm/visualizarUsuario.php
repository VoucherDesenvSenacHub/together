<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/alert.php'; ?>
<?php require_once './../../components/paginacao.php'; ?>
<?php require_once './../../../model/AdmModel.php'; ?>

<?php
// verifica se o perfil é de administrador
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'Administrador') {
    header('Location: /together/view/pages/login.php');
    exit;
}

// mostra popup de erro se existir
if (isset($_SESSION['erro'], $erro)) {
    showPopup($_SESSION['erro'], $erro);
    unset($_SESSION['erro'], $erro);
}

// Instancia o modelo
$admModel = new AdmModel();

// Pega os dados do formulário de filtro
$nome_usuario = isset($_POST['nome_usuario']) ? trim($_POST['nome_usuario']) : '';
$data_inicio = !empty($_POST['data-inicio']) ? $_POST['data-inicio'] : null;
$data_fim = !empty($_POST['data-final']) ? $_POST['data-final'] : null;

//  Chama a nova função de filtro em vez de listar todos
$ListarUsuarios = $admModel->filtrarUsuarios($nome_usuario, $data_inicio, $data_fim);

// página atual e quantidade de páginas vindo do controller
$pagina = isset($pagina) ? $pagina : 1;
$quantidadeDePaginas = isset($quantidadeDePaginas) ? $quantidadeDePaginas : 1;
?>

<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <form action="" class="form-filtro-data">
                <div class="superior-pagina-tabela">
                    <h1 class="titulo-pagina">Usuários Cadastrados</h1>
                </div>
            </form>
            <div class="formulario-perfil">
                <form action="visualizarUsuario.php" method="POST">
                    <div class="filtro">
                        <div class="bloco-datas">
                            <div class="filtro-por-mes">
                                <?= label('data-inicio', 'Período') ?>
                                <?= inputFilter('date', 'data-inicio', 'data-inicio', '', $data_inicio) ?>
                            </div>
                            <div class="filtro-por-mes">
                                <?= label('data-final', '&nbsp;') ?>
                                <?= inputFilter('date', 'data-final', 'data-final', '', $data_fim) ?>
                            </div>
                            <div class="filtro-por-mes">
                                <?= label('data-final', '&nbsp;') ?>
                                <?= botao('primary', '✔') ?>
                            </div>
                        </div>

                        <div class="bloco-pesquisa">
                            <?= label('pesquisar', '&nbsp;') ?>
                            <?= inputFilter('text', 'nome_usuario', 'nome_usuario', 'Pesquisar Nome', $nome_usuario) ?>
                        </div>
                </form>
            </div>

            <div class="table-mobile">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Data de Cadastro</th>
                            <th>Nome</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ListarUsuarios)) { ?>
                            <?php foreach ($ListarUsuarios as $usuario) { ?>
                                <tr>
                                    <td><?= date("d/m/Y", strtotime($usuario['dt_criacao'])) ?></td>
                                    <td><?= $usuario['nome'] ?></td>
                                    <td>
                                        <a href="visaoDoUsuario.php?id=<?= $usuario['id'] ?? '' ?>">
                                            <?= renderAcao('visualizar') ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="3" style="text-align:center;">Nenhum usuário encontrado.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <?php if ($quantidadeDePaginas > 1) { ?>
                <?php criarPaginacao($quantidadeDePaginas); ?>
            <?php } ?>

        </div>
        </div>
    </main>

    <?php require_once './../../components/footer.php' ?>
</body>