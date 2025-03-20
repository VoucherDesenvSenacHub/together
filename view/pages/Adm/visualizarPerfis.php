<?php require_once './../../components/head.php'?>

<body>
<?php require_once './../../components/navbar.php'?>
    <main class="main-container">
    <table>
                    <thead>
                        <tr class="row-head">
                            <th>Data de Cadastro</th>
                            <th>Nome dos Perfis</th>
                            <th>Tipo de Perfil</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody class="body-table">
                        <tr>
                            <td class="row-body-table">xx/xx/xxxx</td>
                            <td class="row-body-table">XXXXX</td>
                            <td >Ong</td>
                            <td>
                                <form action="" method="get">
                                    <button class="buttom-visibility-ong-status">
                                        <img class="exibicao-visualizar-ong" src="../../assests/images/ong/eye.png" alt="visualizar">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
    </main>
<?php require_once './../../components/footer.php'?>
</body>