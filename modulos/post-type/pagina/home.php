<?php
    
     $pagina = new \PostType\Componentes\PaginaHome();
     $pagina->Executar();
     
     \Spw\Componentes\Funcoes::Show($pagina->render);