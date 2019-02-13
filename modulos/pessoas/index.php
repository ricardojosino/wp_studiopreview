<?php

     $modulo = 'pessoas';
     
     // AJAX
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'paginas');
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'blocos');
     \Spw\Componentes\Modulo\IncluirArquivo::Ajax($modulo, 'gatilhos');
     
     // COMPONENTES DO MODULO
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('pessoas', 'pagina-home');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('pessoas', 'pagina-listar-categorias');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('pessoas', 'pagina-listar-categorias');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('pessoas', 'pagina-editar-categoria');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('pessoas', 'pagina-confirmar-deletar-categoria');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('pessoas', 'pagina-listar-pessoas');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('pessoas', 'pagina-editar-pessoa');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('pessoas', 'pagina-confirmar-deletar-pessoa');
     
     
     
     // GATILHOS
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'menu-page');
     
     
     
     