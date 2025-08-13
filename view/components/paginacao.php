<?php
function criarPaginacao(int $quantidadeDePaginas)
{
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    ?>
    <nav aria-label="pagination" class="nav-pagination">
        <ul class="pagination">
            <li class="<?= $paginaAtual <= 1 ? 'disabled' : '' ?>">
                <a href="?pagina=<?= max(1, $paginaAtual - 1) ?>">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="visuallyhidden">Página anterior</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $quantidadeDePaginas; $i++): ?>
                <li>
                    <a href="?pagina=<?= $i ?>"
                       <?= $i === $paginaAtual ? 'aria-current="page" class="active"' : '' ?>>
                        <span class="visuallyhidden">Página </span><?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
            <li class="<?= $paginaAtual >= $quantidadeDePaginas ? 'disabled' : '' ?>">
                <a href="?pagina=<?= min($quantidadeDePaginas, $paginaAtual + 1) ?>">
                    <span class="visuallyhidden">Próxima página</span>
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>

        </ul>
    </nav>
<?php
}
?>
