<?php

     $pagina = new \Spw\Componentes\Wp\SubMenuPage();
     $pagina->Set_SlugDeVinculo('edit.php?post_type=spw-imoveis');
     $pagina->Set_SlugDoMenu('imoveis-config');
     $pagina->Set_TituloDaPagina('Configuração');
     $pagina->Set_TituloDoMenu('Configuração');
     $pagina->Set_Modulo('imoveis');
     $pagina->Set_Modulo_Pagina('config');
     $pagina->Executar();