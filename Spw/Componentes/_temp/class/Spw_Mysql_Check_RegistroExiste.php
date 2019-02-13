<?php

	class Spw_Mysql_Check_RegistroExiste

     {

          // ATRIBUTOS

			protected $query;
			public $result;

          // METODOS DE CONFIGURACAO
			
			public function Set_Query($value)
			{
				(!empty($value)) ? $this->query[] = $value : null;
			}


          // METODOS DE PROCESSO
			
			protected function Script()
			{
				if (!empty($this->query)) :
					return join(' ', $this->query);
				endif;
			}
		
			protected function Query()
			{
				$query = new Spw_Mysql_Select();
				$query->Set_Conectar();
				$query->Set_Start('VALUE', 1);
				$query->Set_AddQuery($this->Script());
				$query->Executar();
				
				if (empty($query->rows)) :
					$this->result = false;
				
						else :
							$this->result = true;
					
				endif;
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->Query();

          }


      }
