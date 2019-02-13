<?php

     $formulario = new Pessoas\Componentes\BlocoEditarCategoria();
     $formulario->Executar();
     
     echo $formulario->Get_Render();