<?php

     $pagina = new \Home\Componentes\ListarFerramentasNaHome();
     $pagina->Executar();
     
     \Spw\Componentes\Funcoes::Show($pagina->render);
     
     
     
     