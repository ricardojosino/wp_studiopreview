<?php

    $pagina = new \Pessoas\Componentes\PaginaConfirmarDeletarCategoria();
    $pagina->Set_IdCategoria($_POST['id_categoria']);
    $pagina->Executar();
    
    echo $pagina->Get_Render();