<?php
/**
* Essa função faz a páginação dos dados e recebe como argumento um vetor
* contendo os dados provindos de alguma tabela...
*/
function paginacao($vetor, $quantidade) 
{
    $atual = (isset($_GET['pg'])) ? intval($_GET['pg']) : 1;
    $paginaArquivo = array_chunk($vetor, $quantidade);
    $contar = count($paginaArquivo);
    $resultado = $paginaArquivo[$atual-1];
    
      foreach($resultado as $listar) 
      {
          printf('%s', $listar);
      }
  
        $menos = $atual-1;
        $mais = $atual;
        if ($atual != $contar) 
        {
           $mais = $atual + 1;
           $menos = $atual - 1;
        }
        if ($atual == $contar) 
        {
           $mais = $atual;
        }
        if ($atual == 1) 
        {
           $menos = 1;
        }
      
        printf('<a href="?pg=%s" class="btn">Anterior</a>', $menos);
        printf('<a href="?pg=%s" class="btn">Proximo</a>', $mais);
        echo " Página " .$atual . " de " . $contar;
      
}