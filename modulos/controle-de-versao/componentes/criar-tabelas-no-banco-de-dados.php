<?php

     namespace ControleDeVersao\Componentes;
     
     
     class CriarTabelaNoBancoDeDados
     {
          
          //01
          
          
          //02
          
          
          
          //03
          protected function CriarTabela()
          {
               $tabela = new \Spw\Componentes\Mysql\CriarTabela();
               $tabela->Set_NomeDaTabela('spw_controle_versao');
               $tabela->Set_AdicionarColuna('id_versao INT(11) NOT NULL AUTO_INCREMENT');
               $tabela->Set_AdicionarColuna("versao INT(11) NULL DEFAULT 1 ");
               $tabela->Set_ChavePrimaria('id_versao');
               $tabela->Executar();
          }
          
          
          protected function InserirPrimeiroRegistro()
          {
               $registro = new \Spw\Componentes\Mysql\InserirRegistro();
               $registro->Set_Start('value', 1);
               $registro->Set_Conectar();
               $registro->Set_NomeDaTabela('spw_controle_versao');
               $registro->Set_AdicionarRegistro(true, 'versao', 'int', 'value', 1);
               $registro->Set_VerificarSeExisteRegistro('SELECT *');
               $registro->Set_VerificarSeExisteRegistro('FROM spw_controle_versao cv');
               $registro->Set_VerificarSeExisteRegistro("WHERE cv.id_versao = 1");
               $registro->Set_VerificarSeExisteRegistro("LIMIT 1");
               $registro->Executar();
          }
          
          
          
          //04
          public function Executar()
          {
               $this->CriarTabela();
               $this->InserirPrimeiroRegistro();
          }
          
          
          
          
     }