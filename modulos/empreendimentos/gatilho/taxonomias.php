<?php

     $tax_categorias = new \Spw\Componentes\Wp\Taxonomia();
     $tax_categorias->Set_PostType('spw-empreendimentos');
     $tax_categorias->Set_Taxonomia('spw-empreendimentos-categoria');
     $tax_categorias->Set_AtivarHierarquia('Y');
     $tax_categorias->Set_AtivarQueryVar('Y');
     $tax_categorias->Set_Rewrite('Y');
     $tax_categorias->Set_Slug('categoria-de-empreendimentos');
     $tax_categorias->Set_ExibirNoMenuDashboard('Y');
     $tax_categorias->Set_ExibirNoMenuDoSite('Y');
     $tax_categorias->Set_ExibirNaColunaAdmin('Y');
     $tax_categorias->Set_Labels_Nome('Categorias');
     $tax_categorias->Set_Labels_NomeSingular('Categoria');
     $tax_categorias->Set_Labels_NomeDoMenu('Categorias');
     $tax_categorias->Set_Labels_AdicionarNovo('Inserir categoria');
     $tax_categorias->Set_Labels_AdicionarNovoItem('Inserir categoria');
     $tax_categorias->Set_Labels_EditarItem('Editar');
     $tax_categorias->Set_Labels_VisualizarItem('Visualizar');
     $tax_categorias->Executar();