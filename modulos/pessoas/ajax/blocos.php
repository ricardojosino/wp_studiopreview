<?php

     // BLOCOS
     function bloco_exibir_mensagem()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Bloco('pessoas', 'exibir-mensagem');
          exit();
     }
     
     
     function bloco_painel_lista_contatos()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Bloco('pessoas', 'lista-contatos---painel-lista-contatos');
          exit();
     }
     
     
     function bloco_nova_categoria()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Bloco('pessoas', 'form-pessoa---inserir-categoria');
          exit();
     }
     
     function bloco_lista_de_categoria()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Bloco('pessoas', 'form-pessoa---listar-categorias');
          exit();
     }
     
     function bloco_painel_categorias()
     {
          $painel = new \Pessoas\Componentes\PaginaListarCategorias();
          $painel->Executar();
          
          echo $painel->Get_RenderPainelConteudo();
          exit();
     }
     
     
     
     // REGISTRAR NO WP
     $ajax = new \Spw\Componentes\Wp\RegistrarFuncaoAjax();
     $ajax->Set_NomeDaFuncao('bloco_painel_lista_contatos');
     $ajax->Set_NomeDaFuncao('bloco_nova_categoria');
     $ajax->Set_NomeDaFuncao('bloco_lista_de_categoria');
     $ajax->Set_NomeDaFuncao('bloco_exibir_mensagem');
     $ajax->Set_NomeDaFuncao('bloco_painel_categorias');
     $ajax->Set_NomeDaFuncao('bloco_formulario_categoria');
     $ajax->Executar();