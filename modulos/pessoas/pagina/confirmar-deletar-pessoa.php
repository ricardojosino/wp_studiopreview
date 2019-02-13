<?php

     $pagina = new \Pessoas\Componentes\PaginaConfirmarDeletarPessoa();
     $pagina->Set_IdPessoa($_POST['id_pessoa']);
     $pagina->Executar();
     
     echo $pagina->Get_Render();