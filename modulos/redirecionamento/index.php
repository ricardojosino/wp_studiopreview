<?php

     $modulo = 'redirecionamento';
     
     // AJAX
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'paginas');
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'blocos');
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'gatilhos');
     
     // COMPONENTES DO MODULO
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'pagina-home');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-redirecionamento');
     
     
     
     // GATILHOS
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'widget-redirecionamento');