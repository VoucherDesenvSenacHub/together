<?php require_once "../../components/head.php"; ?>
<?php require_once "../../components/button.php" ?>
<?php require_once "../../components/label.php" ?>
<?php require_once "../../components/input.php" ?>
<?php require_once "../../components/textarea.php" ?>
<?php require_once "../../../model/UsuarioModel.php" ?>

<?php
$id = 1;
$model = new UsuarioModel(); 
$usuario = $model->buscarUsuarioId(1); 
$mensagemErro = null;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $email = $_POST['email'] ?? '';
    $cpf = $_POST['cpf'] ?? '';

    // tirar a mascara
    $cpf = preg_replace('/\D/', '', $cpf); 

    // Oii bb Vitoorrr uwu games 2.0, ent aqui eu tô usando essa função para tirar a máscara e verificar se o CPF é real.  
    function validarCpf($cpf) {
        
        // ver se o cpf não é apenas uma sequencia aleatoria
        if (strlen($cpf) !== 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        // sei la qq é isso eu pesquisei no chat esse cálculo
        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($i = 0; $i < $t; $i++) {
                $soma += $cpf[$i] * (($t + 1) - $i);
            }
            $digito = ((10 * $soma) % 11) % 10;
            if ($cpf[$t] != $digito) {
                return false;
            }
        }
    
        return true;
    }

    // PRECISA DE UMA CAIXA DE WARNING OU ALERT PARA AVISAR QUE DEU CERTO/ERRADO OU QUALQUER OUTRA COISA AO INVES DE ECHO 

    $tipo_perfil = $_POST['tipo_perfil'] ?? '';
    $id_imagem_de_perfil = $_POST['id_imagem_de_perfil'] ?? null;
    
    $sucesso = $model->editarUsuario($id, $nome, $telefone, $email, $cpf, $tipo_perfil, $id_imagem_de_perfil);
    
    // estrutura de IF caso o usuário já tenha um CPF cadastrado ou Telefone cadastrado no banco
    if (!validarCpf($cpf)) {
        echo "CPF inválido.";
    } else {
        $sucesso = $model->editarUsuario($id, $nome, $telefone, $email, $cpf, $tipo_perfil, $id_imagem_de_perfil);
    
        if ($sucesso === true) {
            // caso de tudo certo ele recarrega a página para mostrar as novas edições
            header("Location: editarInformacoes.php");
            exit;
        } elseif ($sucesso === 'cpf_duplicado') {
            echo "CPF já cadastrado para outro usuário.";
        } elseif ($sucesso === 'telefone_duplicado') {
            echo "Telefone já cadastrado para outro usuário.";
        } else {
            echo "Erro ao atualizar o usuário.";
        }
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
                            <?php require_once "./../../components/upload.php" ?>
                        </div>
                        <div class="container-readonly">
                            <div class="container-readonly-primary">
                                <div class="form-row">
                                    <div>
                                        <?= label('nome', 'Nome') ?>
                                        <?= inputRequired('text', 'nome', 'nome', $usuario['nome'] ) ?>
                                    </div>
                                    <div>
                                        <?= label('telefone', 'Telefone') ?>
                                        <?= inputRequired('text', 'telefone', 'telefone', $usuario['telefone']) ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <?= label('cpf', 'CPF') ?>
                                        <?= inputRequired('text', 'cpf', 'cpf', $usuario['cpf']) ?>
                                    </div>
                                    <div>
                                        <?= label('data_nascimento', 'Data de Nascimento') ?>
                                        <?= inputFilter('date', 'data_nascimento', 'data_nascimento') ?>

                                    </div>
                                </div>
                            </div>
                            <div class="container-input-email-voluntario">
                                <?= label('email', 'Email') ?>
                                <?= inputRequired('text', 'email', 'email', $usuario['email']) ?>
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
                                <?= inputDefault('text', 'cep', 'cep') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('cidade', 'Cidade') ?>
                                <?= inputDefault('text', 'cidade', 'cidade') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('estado', 'Estado') ?>
                                <?= inputDefault('text', 'estado', 'estado') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('bairro', 'Bairro') ?>
                                <?= inputDefault('text', 'bairro', 'bairro') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('logradouro', 'Logradouro') ?>
                                <?= inputDefault('text', 'logradouro', 'logradouro') ?>
                            </div>
                            <div class="container-input-endereco-voluntario">
                                <?= label('numero', 'Número') ?>
                                <?= inputDefault('text', 'numero', 'numero') ?>
                            </div>
                        </div>
                        <div class="container-endereco-voluntario">
                            <div class="container-input-endereco-voluntario">
                                <?= label('complemento', 'Complemento') ?>
                                <?= inputDefault('text', 'complemento', 'complemento') ?>
                            </div>
                        </div>
                    </div>
                    <div class="postagem-geral-div-btn">
                        <div class="postagem-geral-btn"><?= botao('salvar', 'Salvar') ?></div>
                        <div class="postagem-geral-btn"><?= botao('cancelar', 'Cancelar') ?></div>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once './../../components/footer.php' ?>
</body>