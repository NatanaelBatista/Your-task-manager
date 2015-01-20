<div class="footer-areas">
   <a href="?controlePageAnterior&pagina=<?php echo ($_GET["pagina"] - 1) < 0 ? $_GET["pagina"] = 0 : $_GET["pagina"] - 1 ; ?>" class="link-pagination anterior" title="Ir para página anterior"></a>
   <a href="?controlePageProximo&pagina=<?php echo ($_GET["pagina"] + 1) > $totalDePaginas ? $_GET["pagina"] = $totalDePaginas : $_GET["pagina"] + 1;?>" class="link-pagination proximo" title="Ir para a proxima página"></a>
   <?php echo $paginaAtual . " de " . $totalDePaginas; ?>
   <div class="div-hide"></div>
</div>