<?php

     $menu = new \Spw\Componentes\Wp\MenuPage();
     $menu->Set_PaginaDoModulo('pessoas', 'home');
     $menu->Set_TituloDaPagina('Pessoas');
     $menu->Set_TituloDoMenu('Pessoas');
     $menu->Set_WpPage('spw-pessoas');
     $menu->Set_Posicao(5);
     $menu->Set_Id('pagina');
     $menu->Executar();