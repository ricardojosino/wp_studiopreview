<?php

     $aplicativos = new \Aplicativos\Componentes\ListarAplicativos();
     $aplicativos->Executar();
     
     \Spw\Componentes\Funcoes::Show($aplicativos->render);