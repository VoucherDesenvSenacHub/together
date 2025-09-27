<?php
require_once "./../components/head.php";
require_once "./../components/button.php";
require_once "./../components/acoes.php";
require_once './../components/alert.php';
require_once './../../model/OngModel.php'
    ?>

<?php
$ongModel = new OngModel();

$idOngUrl = $_GET['id'] ?? null; // ONG sendo visualizada
$idUsuarioLogado = $_SESSION['id'] ?? null;
$perfilLogado = $_SESSION['perfil'] ?? null;


// Se for uma ONG logada, descubra o ID da ONG dela
$idOngDoUsuario = null;
if ($perfilLogado === 'Ong' && $idUsuarioLogado) {
    $dadosOngDoUsuario = $ongModel->verificarUsuarioTemOng($idUsuarioLogado);
    $idOngDoUsuario = $dadosOngDoUsuario['id_ong'] ?? null;
}

// Se não veio ID na URL e o usuário logado é uma ONG, usa o ID da própria ONG
if (!$idOngUrl && $perfilLogado === 'Ong') {
    $idOngUrl = $idOngDoUsuario;
}

// Agora sim, carregue os dados da página
$pagina = $ongModel->mostrarInformacoesPaginaOng($idOngUrl);
$voluntarios = $ongModel->filtroDataHoraVoluntarios($idOngUrl);
$doacoes = $ongModel->filtroDataHoraDoacoes($idOngUrl);
$imagemPerfil = $ongModel->pegarImagemPerfilPaginaOng($idOngUrl);
var_dump($imagemPerfil )
?>

<?php if (isset($_SESSION['perfil'])) { ?>
    <?php if ($_SESSION['perfil'] === 'Administrador') { ?>
        <style>
            .span-msg {
                display: block;
            }
        </style>
        <?php
        $urlDoacao = '';
        $urlVoluntario = ''
            ?>
        <?php if ($_SESSION['perfil'] === 'Administrador') { ?>
            <?php $usuario = 'Administrador' ?>
        <?php } ?>

    <?php } ?>
    <?php if ($_SESSION['perfil'] === 'Ong') { ?>
        <style>
            .sessionOng {
                display: block;
            }
        </style>
    <?php } ?>
    <?php if ($_SESSION['perfil'] === 'Usuario' || $_SESSION['perfil'] === 'Ong') { ?>
        <?php
        $urlDoacao = '/together/view/pages/Usuario/pagamento_Usuario.php';
        $urlVoluntario = '/together/index.php?msg=voluntarioenviado'
            ?>
    <?php } ?>
<?php } else { ?>
    <?php
    $urlDoacao = "/together/view/pages/login.php";
    $urlVoluntario = '/together/view/pages/login.php'
        ?>
<?php } ?>

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
                        <a class="sessionOng icon-sobreaong"
                            href="/together/view/pages/Ong/editarPaginaOng.php"><?= renderAcao('editar') ?></a>

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
                                <?= botao('primary', 'Fazer Doação', '', $urlDoacao); ?>
                                <?= botao('primary', 'Voluntariar-se', '', $urlVoluntario); ?>
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

                                <?php for ($i = 0; $i < 5; $i++) { ?>

                                    <li class="adm-ong-vision-post-card">
                                        <div class="adm-ong-vision-post-img-moldure">
                                            <img class="adm-ong-vision-post-img"
                                                src="./../assests/images/Adm/adm-vision-ong-post1.png" alt="">
                                        </div>
                                        <div class="adm-ong-vision-post-text-div">
                                            <h1>Instagram</h1>
                                            <p>https://www.instagram.com > PratoCheio</p>
                                            <h3><a
                                                    href="https://www.instagram.com/ongmissaoafrica/p/CsHzIbtPSp8/?img_index=1">Compartilhando
                                                    Alimento, Nutrindo Esperança: Sua Doação Faz a Diferença na Vida dos
                                                    Moradores de Rua</a></h3>
                                            <div class="icon-visao-sobre-ong">
                                                <a class="sessionOng" href=""><?= renderAcao('deletar') ?></a>
                                                <a class="sessionOng"
                                                    href="/together/view/pages/Ong/editarPostagemOng.php"><?= renderAcao('editar') ?></a>
                                            </div>
                                        </div>
                                    </li>

                                    <?php
                                    if ($i < 4) {
                                        echo "<hr>";
                                    } else {
                                        echo "";
                                    }

                                    ?>

                                <?php } ?>

                            </div>
                            <div class="adm-ong-vision-social-area">
                                <div class="adm-ong-vision-social-title">
                                    <h1>Nossas Redes Sociais</h1>
                                </div>

                                <div class="adm-ong-vision-perfil-area">
                                    <div class="adm-ong-vision-area-div-perfil">
                                        <img class="adm-ong-vision-perfil-default-icon"
                                            src="./../assests/images/Adm/instagram.png" alt="">
                                        <h1>@PratoCheioOfc</h1>
                                    </div>
                                    <div class="adm-ong-vision-area-div-perfil">
                                        <img class="adm-ong-vision-perfil-default-icon"
                                            src="./../assests/images/Adm/facebook.png" alt="">
                                        <h1>@PratoCheioOfc</h1>
                                    </div>
                                    <div class="adm-ong-vision-area-div-perfil">
                                        <img class="adm-ong-vision-perfil-default-icon"
                                            src="./../assests/images/Adm/X.png" alt="">
                                        <h1>@PratoCheioOfc</h1>
                                    </div>
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