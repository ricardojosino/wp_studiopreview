<?php
     
     define('SPW_PESSOAS_TITULO', 'Pessoas');
     
     // INCLUDES
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('post-type', 'carregar-post-types');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('post-type', 'pagina-home');

     $carregar_post_types = new \PostType\Componentes\CarregarPostTypes();
     $carregar_post_types->Executar();