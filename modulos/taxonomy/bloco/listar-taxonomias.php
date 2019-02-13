<?php

     
     $lista_taxonomias = new Taxonomy\Componentes\ListarTaxonomias();
     $lista_taxonomias->Executar();
     
     echo $lista_taxonomias->render;
     
     
     