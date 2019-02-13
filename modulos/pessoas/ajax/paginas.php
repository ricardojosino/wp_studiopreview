<?php

     // PAGINAS
     function pagina_home()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'home');
          exit();
     }
     
     
     // PESSOAS
     
     function pagina_listar_pessoas()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'listar-pessoas');
          exit();
     }


     function pagina_confirmar_deletar_pessoa()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'confirmar-deletar-pessoa');
          exit();
     }
     
     function pagina_filtrar_pessoas()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'filtrar-pessoas');
          exit();
     }
     
     
     function pagina_editar_pessoa()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'editar-pessoa');
          exit();
     }

     
     // CATEGORIA
     
     function pagina_listar_categorias()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'listar-categorias');
          exit();
     }
     
     
     function pagina_editar_categoria()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'editar-categoria');
          exit();
     }


     function pagina_confirmar_deletar_categoria()
     {
          \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'confirmar-deletar-categoria');
          exit();
     }

     
     // REGISTRAR NO WP
     $ajax = new \Spw\Componentes\Wp\RegistrarFuncaoAjax();
     $ajax->Set_NomeDaFuncao('pagina_home');
     $ajax->Set_NomeDaFuncao('pagina_listar_pessoas');
     $ajax->Set_NomeDaFuncao('pagina_editar_pessoa');
     $ajax->Set_NomeDaFuncao('pagina_confirmar_deletar_pessoa');
     $ajax->Set_NomeDaFuncao('pagina_filtrar_pessoas');
     $ajax->Set_NomeDaFuncao('pagina_listar_categorias');
     $ajax->Set_NomeDaFuncao('pagina_editar_categoria');
     $ajax->Set_NomeDaFuncao('pagina_confirmar_deletar_categoria');
     $ajax->Executar();
