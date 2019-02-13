<?php

     $modulo = "home";
     
     // REGISTRAR COMPONENTES
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('home', 'listar-ferramentas');
     
     // REGISTRAR AJAX
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'teste');
     