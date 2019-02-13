<?php
     
     $modulo = 'aplicativos';

     // COMPOENTES
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'listar-aplicativos');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'icone-instalacao');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'registrar-aplicativos-no-banco-de-dados');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'carregar-apps-instalados');
     
     
     // REGISTROS AJAX
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'botao-instalacao');