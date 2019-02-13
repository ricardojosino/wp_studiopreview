<?php
     
     namespace Spw\Componentes\Mysql;

	class VerificaSeColunaExisteNaTabela

     {

          // ATRIBUTOS

			protected $dbc;
			protected $tabela;
			protected $coluna;
			
			public $result;


          // METODOS DE CONFIGURACAO
			
			public function Set_Conectar()
			{
				$this->dbc = \Spw\Componentes\Mysql\Conectar::Executar();
			}
			
			
			public function Set_NomeDaTabela($value)
			{
				$this->tabela = $value;
			}
			
			
			public function Set_NomeDaColuna($value)
			{
				$this->coluna = $value;
			}
			
			
          // METODOS DE PROCESSO
			
			protected function Query()
			{
				if (!empty($this->tabela) and !empty($this->coluna)) :
					
					$array[] = 'SELECT *';
					$array[] = 'FROM ' . $this->tabela . ' p';
					$array[] = 'WHERE p.' . $this->coluna . ' IS NOT NULL'  ;
					
					$query = join(' ', $array);
					
					if (mysqli_query($this->dbc, $query)) :
						$this->result = true;
					
							else :
								$this->result = false;
					endif;
					
				endif;
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->Query();

          }


      }
