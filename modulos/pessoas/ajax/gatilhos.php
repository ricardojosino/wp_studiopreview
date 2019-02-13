<?php

     // GATILHOS
     function gatilho_inserir_pessoa()
     {
          \Spw\Componentes\Modulo\Executar::Gatilho('pessoas', 'inserir-pessoa');
          exit();
     }
     
     
     function gatilho_excluir_pessoa()
     {
          \Spw\Componentes\Modulo\Executar::Gatilho('pessoas', 'excluir-pessoa');
          exit();
     }
     
     
     function gatilho_atualizar_pessoa()
     {
          \Spw\Componentes\Modulo\Executar::Gatilho('pessoas', 'atualizar-pessoa');
          exit();
     }
     
     
     function gatilho_limpar_filtro_pessoa()
     {
          \Spw\Componentes\Modulo\Executar::Gatilho('pessoas', 'limpar-filtro-pessoa');
          exit();
     }
     
     
     function gatilho_inserir_categoria()
     {
          \Spw\Componentes\Modulo\Executar::Gatilho('pessoas', 'inserir-categoria');
          exit();
     }
     
     
     function gatilho_atualizar_categoria()
     {
          \Spw\Componentes\Modulo\Executar::Gatilho('pessoas', 'atualizar-categoria');
          exit();
     }

     function gatilho_excluir_categoria()
     {
          \Spw\Componentes\Modulo\Executar::Gatilho('pessoas', 'excluir-categoria');
          exit();
     }
     
     
     // REGISTRAR NO WP
     $ajax = new \Spw\Componentes\Wp\RegistrarFuncaoAjax();
     $ajax->Set_NomeDaFuncao('gatilho_inserir_pessoa');
     $ajax->Set_NomeDaFuncao('gatilho_excluir_pessoa');
     $ajax->Set_NomeDaFuncao('gatilho_atualizar_pessoa');
     $ajax->Set_NomeDaFuncao('gatilho_limpar_filtro_pessoa');
     $ajax->Set_NomeDaFuncao('gatilho_inserir_categoria');
     $ajax->Set_NomeDaFuncao('gatilho_atualizar_categoria');
     $ajax->Set_NomeDaFuncao('gatilho_excluir_categoria');
     $ajax->Executar();