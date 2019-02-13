<?php

     namespace ControleDeVersao\Componentes;
     
     class VerificarVersaoDoBancoDeDados
     {
          
          //01
          public $versao;
          
          
          //02
          
          
          //03
          protected function Check()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Start('value', 1);
               $dados->Set_Conectar();
               $dados->Set_AdicionarQuery('SELECT cv.versao');
               $dados->Set_AdicionarQuery('FROM spw_controle_versao cv');
               $dados->Set_AdicionarQuery('WHERE cv.id_versao = 1');
               $dados->Set_AdicionarQuery('LIMIT 1');
               $dados->Executar();
               
               $this->versao = $dados->rows['versao'];
          }
          
          
          //04
          public function Executar()
          {
               $this->Check();
          }
          
          
          
          
     }