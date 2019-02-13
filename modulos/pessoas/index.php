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
     
     
     $controlador_paginas = new \Spw\Componentes\Modulo\ControladorDePaginas();
     $controlador_paginas->Set_WpPage('spw-pessoas');
     $controlador_paginas->Set_PaginaInicial('pessoas', 'home');
     $controlador_paginas->Executar();
     
     $menu = new \Spw\Componentes\Wp\MenuPage();
     $menu->Set_ConteudoDaPagina($controlador_paginas->render);
     $menu->Set_TituloDaPagina('Pessoas');
     $menu->Set_TituloDoMenu('Pessoas');
     $menu->Set_WpPage('spw-pessoas');
     $menu->Set_Posicao(5);
     $menu->Set_Id('pagina');
     $menu->Executar();
     
     
     
     