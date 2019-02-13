<?php

     $icon = new \Spw\Componentes\Wp\AdicionarEstilo();
     $icon->Set_NomeDaTransacao('fontawesome');
     $icon->Set_Versao('5.2.0');
     $icon->Set_InserirNoLadoAdmin();
     $icon->Set_Src( \Spw\Componentes\Biblioteca\Patch::UrlBiblioteca() . 'fontawesome-free-5.2.0-web/css/all.min.css' );
     $icon->Executar();