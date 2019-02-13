<?php 



     class Spw_Mysql_CriarTabela
     {
     
     // ATRIBUTOS

          protected $dbc;
     
          protected $tabela;
          protected $add_colunas;
          protected $primary_key;
     
     
     // METODOS DE CONFIGURACAO

          public function Set_Tabela($value)
          {
               $this->tabela = $value;
          }


          public function Set_Add_Coluna($value)
          {
               $this->add_colunas[] = $value;
          }


          public function Set_PrimaryKey($value)
          {
               $this->primary_key = $value;
          }
     
          
     
     
     // METODOS DE PROCESSO

          protected function Conectar()
          {
               $this->dbc = Spw_Mysql_Conectar::Conectar();
          }



          protected function Colunas()
          {
               if (!empty($this->add_colunas)) :

                    return join(', ', $this->add_colunas) . ',';

               endif;
          }


          protected function PrimaryKey()
          {
               if (!empty($this->primary_key)) :

                    $key = $this->primary_key;
                    return " PRIMARY KEY ($key) ";

               endif;

          }


          protected function Query()
          {

               $array[] = "CREATE TABLE ";
               $array[] = $this->tabela;
               $array[] = ' ( ';
               $array[] = $this->Colunas();
               $array[] = $this->PrimaryKey();
               $array[] = ' );';

               return join('', $array);
          }



          protected function CheckExisteTabela()
          {
              $check = new Spw_Mysql_Check_TabelaExiste();
              $check->Set_Tabela($this->tabela);
              $check->Executar();

              return $check->result;
          }
          


          protected function Result()
          {
               if (!empty($this->tabela) and !empty($this->add_colunas) and $this->CheckExisteTabela() == false) :

                    mysqli_query($link = $this->dbc, $query = $this->Query()) or die( mysqli_error($this->dbc) . 'Erro na Query Criar Tabela' . '<br><br>' . $this->Query() );

               endif;
          }

     
     
     
     // ALGORITIMO
     
         public function Executar()
         {
              $this->Conectar();
              $this->Result();
     
         }
     
     }