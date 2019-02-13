<?php
     
     $modulo = 'categorias-sidebar';

     // INCLUDES
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget');
     
     // GATILHOS
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'registrar-estilo');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'registrar-widgets');