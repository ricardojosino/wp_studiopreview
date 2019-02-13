<?php
     
     namespace Spw\Componentes\Mysql;

     class Query
     
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
			 $this->dbc = \Spw\Componentes\Mysql\Conectar::Executar();
		 }
		 
		 
		 public function Set_AdicionarQuery($value)
		 {
			 $this->add_query[] = $value;
		 }
           
           
           public function Set_AdicionarDadosSql($modulo, $nome, $array_rotulos, $array_valores)
           {
                $query = file_get_contents( \Spw\Componentes\Modulo\Path::PathDados($modulo, $nome) );
                $query = str_replace($array_rotulos, $array_valores, $query);
                $this->add_query[] = $query;                
           }
		 
		 
		 public function Set_Start($method, $value)
		 {
			 $this->start_method = $method;
			 $this->start_value = $value;
		 }
          

     
     // METODOS DE PROCESSO
		 
		 protected function Start()
		 {

			switch ( strtoupper($this->start_method) ) :


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
		
		
           
           protected function ProcessarQuery()
           {
                if (!empty($this->add_query)) :
                
                    $this->query = join(' ', $this->add_query);
                    $query = explode(';', $this->query);

                    foreach ($query AS $linha) :
                         mysqli_real_query($this->dbc, $linha);
                    endforeach;
                    
                endif;
           }
           
		 
		 protected function Query()
		 {
			 
			 if ($this->start) :
			 
				mysqli_select_db($this->dbc, DB_NAME);
                    $this->ProcessarQuery();
                    $this->result = mysqli_store_result($this->dbc);
                     
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