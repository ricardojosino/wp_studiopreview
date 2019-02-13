<?php

     class Spw_Mysql_Select
     
     {
          
     // ATRIBUTOS
		 
		 protected $start;
		 protected $start_method;
		 protected $start_value;
		 
		 
		 protected $dbc;
		 protected $add_query;
          
		 public $query;
		 public $result;
		 public $rows;
		 public $total_rows;
		 
          
          
     // METODOS DE CONFIGURACAO
		 
		 public function Set_Conectar()
		 {
			 $this->dbc = Spw_Mysql_Conectar::Conectar();
		 }
		 
		 
		 public function Set_AddQuery($value)
		 {
			 $this->add_query[] = $value;
		 }
		 
		 
		 public function Set_Start($method, $value)
		 {
			 $this->start_method = $method;
			 $this->start_value = $value;
		 }
          

     
     // METODOS DE PROCESSO
		 
		 protected function Start()
		 {

			switch ($this->start_method) :


				   case "POST" :

						if (isset($_POST[$this->start_value])) : 

							 $this->start = true;
								  else :
									   $this->start = false;

						endif;

				   break;


				   case "GET" :

						if (isset($_GET[$this->start_value])) :
							 $this->start = true;
								  else :
									   $this->start = false;
						endif;

				   break;


				   case "SESSION" :

							 if (isset($_SESSION[$this->start_value])) :

								  $this->start = true;
									   else :
											$this->start = false;

							 endif;

				   break;



				   case "VALUE" :

							 if (isset($this->start_value)) :

								  $this->start = true;
									   else :
											$this->start = false;

							 endif;


						break;



				   default :
						$this->start = false;
						break;

			  endswitch;


		 }
		
		
		 
		 protected function JoinQuery()
		 {
			 if (!empty($this->add_query)) :
				 
				 return join(' ', $this->add_query);
				 
			 endif;
		 }
		 
		 
		 protected function Query()
		 {
			 
			 if ($this->start) :
			 
				mysqli_select_db($this->dbc, DB_NAME);
				$query = $this->JoinQuery();

				$this->query = $query;

				$this->result = mysqli_query($this->dbc, $query);
				if ($this->result) :
					$this->rows = mysqli_fetch_assoc($this->result);
					$this->total_rows = mysqli_num_rows($this->result);
				endif;
			 
			 endif;
			 
		 }
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
			  $this->Start();
              $this->Query();
               
          }
          
          
     }