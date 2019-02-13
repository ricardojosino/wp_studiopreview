<?php    


     class Spw_Mysql_Check_TabelaExiste
     {
     
     // ATRIBUTOS

          protected $dbc;
          protected $tabela;

          // SAIDA
          public $result;
     
     
     
     // METODOS DE CONFIGURACAO

          public function Set_Tabela($value)
          {
               $this->tabela = $value;
          }
     
     
     
     // METODOS DE PROCESSO

          protected function Conectar()
          {
               $this->dbc = Spw_Mysql_Conectar::Conectar();
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
