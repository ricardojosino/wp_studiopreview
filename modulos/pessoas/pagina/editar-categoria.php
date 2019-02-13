<?php

     $formulario = new Pessoas\Componentes\BlocoEditarCategoria();
     $formulario->Set_IdCategoria($_POST['id_categoria']);
     $formulario->Executar();
     
     echo $formulario->Get_Render();