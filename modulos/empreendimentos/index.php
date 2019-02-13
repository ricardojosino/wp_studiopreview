<?php

     $modulo = 'empreendimentos';
     
     // AJAX
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'paginas');
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'blocos');
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'gatilhos');
     
     // COMPONENTES DO MODULO
     
     
     
     // GATILHOS
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'admin-pre-get-post');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'post-type');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'taxonomias');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-dados-empreendimento');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-galeria');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-planta');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-tour-virtual');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-script');
     
     
     