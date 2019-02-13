<?php

	class Spw_Mysql_AlterarTabela

     {

          // ATRIBUTOS
		
			protected $tabela;
			protected $colunas;
			protected $dbc;



          // METODOS DE CONFIGURACAO
			
			public function Set_Conectar()
			{
				$this->dbc = Spw_Mysql_Conectar::Conectar();
			}

			public function Set_Tabela($value)
			{
				$this->tabela = $value;
			}
			
			
			public function Set_Add_Coluna($coluna, $atributos)
			{
				if ($this->CheckColuna($coluna) == false) :
					$this->colunas[] = array('coluna' => $coluna, 'atributos' => $atributos );
				endif;
			}


          // METODOS DE PROCESSO
			
			protected function CheckColuna($coluna)
			{
				$check = new Spw_Mysql_Check_ColunaExiste();
				$check->Set_Conectar();
				$check->Set_Tabela($this->tabela);
				$check->Set_Coluna($coluna);
				$check->Executar();
				
				return $check->result;
			}
			
			protected function Colunas()
			{
				if (!empty($this->colunas)) :
					
					foreach($this->colunas AS $coluna) :
					
						$array[] = $coluna['coluna'] . ' ' . $coluna['atributos'];
					
					endforeach;
					
					if (!empty($array)) :
						return join(', ', $array);
					endif;
					
				endif;
			}
		
		
			protected function Query()
			{
				
				
				$array[] = 'ALTER TABLE ' . $this->tabela;
				$array[] = 'ADD (' . $this->Colunas() . ');';

				return join(' ', $array);
				
			}
			
			
			protected function RunAdd()
			{
				if (!empty($this->colunas)) :
					mysqli_query($this->dbc, $this->Query()) or die('Erro em Spw_Mysql_AlterarTabela ' . mysqli_error($this->dbc) . '<br><br>' . $this->Query() );
				endif;
			}



          // ALGORITIMO

          public function Executar()

          {
			  $this->RunAdd();
          }


      }
