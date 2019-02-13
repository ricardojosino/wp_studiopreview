<?php
     
     $modulo = 'catalogo-de-produtos';

     // GATILHOS
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'post-type');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'taxonomia');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-config');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'registrar-estilo');
     
     