<?php    

     namespace Spw\Componentes\Mysql;
     
     class VerificaSeTabelaExiste
     {
     
     // ATRIBUTOS

          protected $dbc;
          protected $tabela;

          // SAIDA
          public $result;
     
     
     
     // METODOS DE CONFIGURACAO

          public function Set_NomeDaTabela($value)
          {
               $this->tabela = $value;
          }
     
     
     
     // METODOS DE PROCESSO

          protected function Conectar()
          {
               $this->dbc = \Spw\Componentes\Mysql\Conectar::Executar();
          }



          protected function Query()
          {
               $array[] = " SELECT *";
               $array[] = " FROM " . $this->tabela;

               return join('', $array);
          }


          protected function Result()
          {
               if(mysqli_query( $this->dbc, $this->Query() )) :

                    $this->result = true;

                         else :
                              $this->result = false;

               endif;
          }
     
     
     
     // ALGORITIMO
     
         public function Executar()
         {
              $this->Conectar();
              $this->Result();
     
         }
     
     }
