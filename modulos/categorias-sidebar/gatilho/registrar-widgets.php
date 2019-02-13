<?php

     $widget_categorias = new \Spw\Componentes\Wp\Widget_Registrar();
     $widget_categorias->Set_AdicionarWidget( '\CategoriasSidebar\Componentes\Categorias' );
     $widget_categorias->Executar();