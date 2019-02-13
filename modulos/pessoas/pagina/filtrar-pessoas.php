<?php

     if ( isset($_POST['nome']) ) :
          $_SESSION['pessoas_pesquisar_nome'] = $_POST['nome'];
     endif;
     
     if ( isset($_POST['id_categoria']) ) :
          $_SESSION['pessoas_pesquisar_nome'] = $_POST['id_categoria'];
     endif;
     
     //\Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'listar-pessoas');