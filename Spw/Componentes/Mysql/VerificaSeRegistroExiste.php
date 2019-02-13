<?php
     
     namespace Spw\Componentes\Mysql;

	class VerificaSeRegistroExiste

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
				$query = new \Spw\Componentes\Mysql\Selecionar();
				$query->Set_Conectar();
				$query->Set_Start('VALUE', 1);
				$query->Set_AdicionarQuery($this->Script());
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
