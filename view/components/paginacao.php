<?php
function criarPaginacao(int $quantidadeDePaginas)
{
    $paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    $paginaAtual = max(1, min($paginaAtual, $quantidadeDePaginas));
    ?>
    <nav aria-label="pagination" class="nav-pagination">
        <ul class="pagination">

          
            <li class="<?= $paginaAtual <= 1 ? 'disabled' : '' ?>">
                <a href="?pagina=1">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

           
            <li class="<?= $paginaAtual <= 1 ? 'disabled' : '' ?>">
                <a href="?pagina=<?= max(1, $paginaAtual - 1) ?>">
                    <span aria-hidden="true">&lsaquo;</span>
                </a>
            </li>

          
            <?php for ($i = max(1, $paginaAtual - 2); $i <= min($quantidadeDePaginas, $paginaAtual + 2); $i++): ?>
                <li>
                    <a href="?pagina=<?= $i ?>" <?= $i === $paginaAtual ? 'aria-current="page" class="active"' : '' ?>>
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            
            <li class="<?= $paginaAtual >= $quantidadeDePaginas ? 'disabled' : '' ?>">
                <a href="?pagina=<?= min($quantidadeDePaginas, $paginaAtual + 1) ?>">
                    <span aria-hidden="true">&rsaquo;</span>
                </a>
            </li>

            
            <li class="<?= $paginaAtual >= $quantidadeDePaginas ? 'disabled' : '' ?>">
                <a href="?pagina=<?= $quantidadeDePaginas ?>">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>

        </ul>
    </nav>
    <?php
}
?>
