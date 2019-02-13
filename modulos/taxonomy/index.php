<?php

     $modulo = 'taxonomy';
     
     // AJAX
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'paginas');
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'blocos');
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'gatilhos');
     
     // COMPONENTES DO MODULO
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'listar-taxonomias');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'registrar-taxonomias');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-taxonomias');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-template-01');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-template-02');
     
     
     // GATILHOS
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'registrar-estilo');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'registrar-taxonomias');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'registrar-widgets');