<?php 

     namespace Spw\Componentes\Mysql;

     class CriarTabela
     {
     
     // ATRIBUTOS

          protected $dbc;
     
          protected $tabela;
          protected $add_colunas;
          protected $primary_key;
     
     
     // METODOS DE CONFIGURACAO

          public function Set_NomeDaTabela($value)
          {
               $this->tabela = $value;
          }


          public function Set_AdicionarColuna($value)
          {
               $this->add_colunas[] = $value;
          }


          public function Set_ChavePrimaria($value)
          {
               $this->primary_key = $value;
          }
     
          
     
     
     // METODOS DE PROCESSO

          protected function Conectar()
          {
               $this->dbc = \Spw\Componentes\Mysql\Conectar::Executar();
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
              $check = new \Spw\Componentes\Mysql\VerificaSeTabelaExiste();
              $check->Set_NomeDaTabela($this->tabela);
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