<?php
require_once "./../components/head.php";
require_once "./../components/button.php";
require_once "./../components/acoes.php";
require_once './../components/alert.php';
require_once './../../model/OngModel.php';
require_once './../../model/PostagemModel.php';
require_once './../../model/UsuarioModel.php';
?>

<?php
$ongModel = new OngModel();
$postagemModel = new PostagemModel();
$usuarioModel = new UsuarioModel();

// Converte IDs da URL em inteiros para evitar erro de tipo
$idOngUrl = isset($_GET['id']) ? intval($_GET['id']) : null;
$idUsuarioLogado = $_SESSION['id'] ?? null;
$perfilLogado = $_SESSION['perfil'] ?? null;
$idPostagem = isset($_GET['id_postagem']) ? intval($_GET['id_postagem']) : null;

// Debug: Verifica se o ID da ONG está presente
if (!$idOngUrl) {
    die("Erro: ID da ONG não foi fornecido na URL. Acesse: visaoSobreaOng.php?id=1");
}

$idOngDoUsuario = null;
if ($perfilLogado === 'Ong' && $idUsuarioLogado) {
    $dadosOngDoUsuario = $ongModel->verificarUsuarioTemOng($idUsuarioLogado);
    $idOngDoUsuario = isset($dadosOngDoUsuario['id_ong']) ? intval($dadosOngDoUsuario['id_ong']) : null;
}


if (!$idOngUrl && $perfilLogado === 'Ong') {
    $idOngUrl = $idOngDoUsuario;
}

// ONG só pode acessar sua própria página

$mostrarEdicao = false;
if ($perfilLogado === 'Ong') {
    if ($idOngUrl === $idOngDoUsuario) {
        $mostrarEdicao = true; // pode editar sua própria página
    }
}

// Carrega informações da página
$postagens = $postagemModel->getByOng($idOngUrl);
$pagina = $ongModel->mostrarInformacoesPaginaOng($idOngUrl);
$voluntarios = $ongModel->filtroDataHoraVoluntarios($idOngUrl);
$doacoes = $ongModel->filtroDataHoraDoacoes($idOngUrl);
$imagemPerfil = $ongModel->pegarImagemPerfilPaginaOng($idOngUrl);

// Verifica o status de voluntariado do usuário logado
$statusVoluntario = null;
if ($perfilLogado === 'Usuario' && $idUsuarioLogado) {
    $statusVoluntario = $usuarioModel->verificarStatusVoluntario($idUsuarioLogado, $idOngUrl);
}
?>

<?php
$perfil = $_SESSION['perfil'] ?? null;
$usuario = $perfil ?? 'Visitante';

// URLs e estados dos botões
$urlDoacao = "/together/view/pages/login.php";
$urlVoluntario = "/together/view/pages/login.php";
$btnVoluntarioDisabled = false;
$btnVoluntarioText = 'Voluntariar-se';
$btnVoluntarioClass = 'primary';

// Ajusta comportamento conforme perfil logado
switch ($perfil) {
    case 'Administrador':
        $spanMsgVisivel = true;
        $urlDoacao = '';
        $urlVoluntario = '';
        break;

    case 'Ong':
        $sessionOngVisivel = true;
        $urlDoacao = '/together/view/pages/Usuario/pagamento_Usuario.php';
        $urlVoluntario = '/together/index.php?msg=voluntarioenviado';
        break;

    case 'Usuario':
        $urlDoacao = '/together/view/pages/Usuario/pagamento_Usuario.php?id_ong=' . $idOngUrl;
        
        // Verifica status do voluntariado
        if ($statusVoluntario) {
            if ($statusVoluntario['status_validacao'] == 1) {
                // Já é voluntário aprovado
                $btnVoluntarioText = 'Você é Voluntário';
                $btnVoluntarioDisabled = true;
                $btnVoluntarioClass = 'secondary';
            } else {
                // Solicitação pendente
                $btnVoluntarioText = 'Solicitação Pendente';
                $btnVoluntarioDisabled = true;
                $btnVoluntarioClass = 'secondary';
            }
        } else {
            // Pode se voluntariar
            $urlVoluntario = '#';
        }
        break;
        
    default:
        // Visitante não logado
        break;
}
?>

<?php if (!empty($spanMsgVisivel)): ?>
<style>.span-msg { display: block; }</style>
<?php endif; ?>

<?php if (!empty($sessionOngVisivel)): ?>
<style>.sessionOng { display: block; }</style>
<?php endif; ?>

<?php
// Popup do session
if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}
?>

<body>
    <?php require_once './../components/navbar.php' ?>

    <main class="main-container">
        <?php require_once './../components/back-button.php' ?>

        <div class="adm-ong-vision-container">

            <form method="POST" action="" class="adm-ong-vision-form-box">
                <div class="adm-ong-vision-area-limiter">
                    <div class="adm-ong-vision-filter-tags">
                        <div class="adm-ong-group-filter-tag">
                            <i id="adm-ong-vision-icon-default" class="fa-solid fa-tag fa-rotate-90"></i>
                            <h3 id="adm-ong-vision-filter-tag-title" class="adm-ong-vision-default-text">Fome Zero e
                                Agricultura Sustentavel</h3>
                        </div>
                        <?php if ($mostrarEdicao): ?>
                            <a class="icon-sobreaong"
                                href="/together/view/pages/Ong/editarPaginaOng.php"><?= renderAcao('editar') ?></a>
                        <?php endif; ?>
                    </div>

                    <div class="adm-ong-vision-title-options">
                        <div class="adm-ong-vision-title-img-div">
                            <img class="adm-ong-vision-img" src="<?= $imagemPerfil ?>" alt="Imagem da ONG">
                        </div>
                        <div class="adm-ong-vision-title-div">
                            <strong class="adm-ong-vision-title">
                                <?= $pagina['titulo'] ?? 'Página da ONG' ?>
                            </strong>
                            <div class="adm-ong-vision-subtitle">
                                <p id="adm-ong-vision-title-description" class="adm-ong-vision-default-text">
                                    <?= $pagina['subtitulo'] ?? '' ?>
                                </p>
                            </div>

                            <div class="adm-ong-vision-button-div">
                                <?php if ($perfil === 'Usuario'): ?>
                                    <!-- Botão de Doação -->
                                    <a href="<?= $urlDoacao ?>" style="text-decoration: none;">
                                        <?= botao('primary', 'Fazer Doação', '', ''); ?>
                                    </a>
                                    
                                    <!-- Botão de Voluntariado -->
                                    <?php if (!$btnVoluntarioDisabled): ?>
                                        <form id="formVoluntariar" method="POST" action="/together/controller/voluntarioController.php" style="display: inline; margin: 0;">
                                            <input type="hidden" name="action" value="voluntariar">
                                            <input type="hidden" name="id_ong" value="<?= $idOngUrl ?>">
                                            <button type="submit" class="botao botao-primary" onclick="document.getElementById('formVoluntariar').submit();">Voluntariar-se</button>
                                        </form>
                                    <?php else: ?>
                                        <button type="button" class="botao botao-secondary" disabled style="opacity: 0.6; cursor: not-allowed;"><?= $btnVoluntarioText ?></button>
                                    <?php endif; ?>
                                    
                                <?php elseif (empty($perfil)): ?>
                                    <!-- Visitante não logado -->
                                    <a href="<?= $urlDoacao ?>" style="text-decoration: none;">
                                        <?= botao('primary', 'Fazer Doação', '', ''); ?>
                                    </a>
                                    <a href="<?= $urlVoluntario ?>" style="text-decoration: none;">
                                        <?= botao('primary', 'Voluntariar-se', '', ''); ?>
                                    </a>
                                    
                                <?php else: ?>
                                    <!-- Admin ou ONG -->
                                    <?= botao('primary', 'Fazer Doação', '', $urlDoacao); ?>
                                    <?= botao('primary', 'Voluntariar-se', '', $urlVoluntario); ?>
                                <?php endif; ?>
                            </div>

                            <span class="span-msg">Não é possível executar essa ação como <?= $usuario ?>!</span>
                            
                            <div>
                                <p id="adm-ong-vision-text-alert" class="adm-ong-vision-default-text"><i>* Sua doação
                                        será feita diretamente para o Instituto Benfeitoria, que irá repassar os valores
                                        às organizações beneficiadas.</i></p>
                            </div>
                        </div>
                    </div>

                    <div class="adm-ong-vision-about-location-div">
                        <i id="adm-ong-vision-icon-default" class="fa-solid fa-location-dot"></i>
                        <h3 id="adm-ong-vision-about-location-title" class="adm-ong-vision-default-text">Campo Grande -
                            MS R. Jardim Botânico 288</h3>
                    </div>

                    <div class="adm-ong-vision-about-div">
                        <p class="adm-ong-vision-default-text">
                            <?= $pagina['descricao'] ?? 'Nenhuma descrição disponível.' ?>
                        </p>
                    </div>

                    <div class="adm-ong-vision-post-container">
                        <div class="adm-ong-vision-post-title-div">
                            <h1 class="adm-ong-vision-title-text">Postagens da ONG</h1>
                        </div>
                        <div class="adm-ong-vision-post-box">
                            <div class="adm-ong-vision-post-area">
                                <?php if ($postagens): ?>
                                    <?php foreach ($postagens as $post): ?>
                                        <li class="adm-ong-vision-post-card">
                                            <div class="adm-ong-vision-post-img-moldure">
                                                <img class="adm-ong-vision-post-img" src="<?= $post['imagem'] ?>"
                                                    alt="Imagem do post">
                                            </div>
                                            <div class="adm-ong-vision-post-text-div">
                                                <h1><?= $post['titulo'] ?></h1>
                                                <p><?= $post['descricao'] ?></p>
                                                <?php if ($post['link']): ?>
                                                    <h3><a href="<?= $post['link'] ?>">Saiba mais</a></h3>
                                                <?php endif; ?>
                                                <div class="icon-visao-sobre-ong">
                                                    <?php if ($mostrarEdicao): ?>
                                                        <a
                                                            href="/together/view/pages/Ong/editarPostagemOng.php"><?= renderAcao('editar') ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>Nenhuma postagem disponível.</p>
                                <?php endif; ?>
                            </div>

                            <div class="adm-ong-vision-social-area">
                                <div class="adm-ong-vision-social-title">
                                    <h1>Nossas Redes Sociais</h1>
                                </div>

                                <div class="adm-ong-vision-perfil-area">
                                    <?php if (!empty($pagina['instagram'])): ?>
                                        <div class="adm-ong-vision-area-div-perfil">
                                            <img class="adm-ong-vision-perfil-default-icon"
                                                src="./../assets/images/Adm/instagram.png" alt="Instagram">
                                            <h1>
                                                <a href="<?= htmlspecialchars($pagina['instagram']) ?>" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <?= htmlspecialchars($pagina['instagram_nome'] ?? $pagina['instagram']) ?>
                                                </a>
                                            </h1>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($pagina['facebook'])): ?>
                                        <div class="adm-ong-vision-area-div-perfil">
                                            <img class="adm-ong-vision-perfil-default-icon"
                                                src="./../assets/images/Adm/facebook.png" alt="Facebook">
                                            <h1>
                                                <a href="<?= htmlspecialchars($pagina['facebook']) ?>" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <?= htmlspecialchars($pagina['facebook_nome'] ?? $pagina['facebook']) ?>
                                                </a>
                                            </h1>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($pagina['twitter'])): ?>
                                        <div class="adm-ong-vision-area-div-perfil">
                                            <img class="adm-ong-vision-perfil-default-icon"
                                                src="./../assets/images/Adm/X.png" alt="Twitter">
                                            <h1>
                                                <a href="<?= htmlspecialchars($pagina['twitter']) ?>" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <?= htmlspecialchars($pagina['twitter_nome'] ?? $pagina['twitter']) ?>
                                                </a>
                                            </h1>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php require_once "../../view/components/footer.php"; ?>
</body>

</html>