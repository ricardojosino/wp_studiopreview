<?php

     class Spw_Data_Salvar
     
     {
          
     // ATRIBUTOS
          
          protected $campo;
		  protected $method;
          
     // METODOS DE CONFIGURACAO
		  
		  public function Set_AddCampo($campo, $value_default = '', $value_inicial = '')
		  {
			  $this->campo[] = array('campo' => $campo, 'value_default' => $value_default, 'value_inicial' => $value_inicial);
		  }
		  
		  
		  public function Set_Method($value)
		  {
			  $this->method = $value;
		  }
          

     
     // METODOS DE PROCESSO
		  
		  protected function Check($campo)
		  {
			  if (!empty(get_option($campo))) :
				  
				  return true;
			  
					else :
						return false;
				  
			  endif;
		  }
		  
		  
		  protected function Insert($campo, $value_default, $value_inicial)
		  {
			  switch($this->method) :
				  
				  case 'POST' :
					  (isset($_POST[$campo])) ? add_option($campo, $_POST[$campo]) : add_option($campo, $this->Value($value_inicial, $value_default));
					  break;
				  
				  case 'post' :
					  (isset($_POST[$campo])) ? add_option($campo, $_POST[$campo]) : add_option($campo, $this->Value($value_inicial, $value_default));
					  break;
				  
				  case 'GET' :
					  (isset($_GET[$campo])) ? add_option($campo, $_GET[$campo]) : add_option($campo, $this->Value($value_inicial, $value_default));
					  break;
				  
				  case 'get' :
					  (isset($_GET[$campo])) ? add_option($campo, $_GET[$campo]) : add_option($campo, $this->Value($value_inicial, $value_default));
					  break;
				  
				  case 'SESSION' :
					  (isset($_SESSION[$campo])) ? add_option($campo, $_SESSION[$campo]) : add_option($campo, $this->Value($value_inicial, $value_default));
					  break;
				  
				  case 'session' :
					  (isset($_SESSION[$campo])) ? add_option($campo, $_SESSIOIN[$campo]) : add_option($campo, $this->Value($value_inicial, $value_default));
					  break;
				  
				  default :
					  (isset($_POST[$campo])) ? add_option($campo, $_POST[$campo]) : add_option($campo, $this->Value($value_inicial, $value_default));
				  
				  
			  endswitch;
		  }
		  
		  
		  
		  protected function Update($campo, $value_default)
		  {
			  switch($this->method) :
				  
				  case 'POST' :
					  (isset($_POST[$campo])) ? update_option($campo, $this->Value($_POST[$campo], $value_default)) : '';
					  break;
				  
				  case 'post' :
					  (isset($_POST[$campo])) ? update_option($campo, $this->Value($_POST[$campo], $value_default)) : '';
					  break;
				  
				  case 'GET' :
					  (isset($_GET[$campo])) ? update_option($campo, $this->Value($_POST[$campo], $value_default)) : '';
					  break;
				  
				  case 'get' :
					  (isset($_GET[$campo])) ? update_option($campo, $this->Value($_POST[$campo], $value_default)) : '';
					  break;
				  
				  case 'SESSION' :
					  (isset($_SESSION[$campo])) ? update_option($campo, $this->Value($_POST[$campo], $value_default)) : '';
					  break;
				  
				  case 'session' :
					  (isset($_SESSION[$campo])) ? update_option($campo, $this->Value($_POST[$campo], $value_default)) : '';
					  break;
				  
				  default :
					  (isset($_POST[$campo])) ? update_option($campo, $this->Value($_POST[$campo], $value_default)) : '';
				  
				  
			  endswitch;
		  }
		  
		  
		  protected function Value($value, $value_default)
		  {
			  if (empty($value) and !empty($value_default)) :
				  
				  return $value_default;
			  
					else :
						return $value;
				  
			  endif;
		  }
		  
		  
		  
		  protected function Salvar()
				  
		  {
			  
				if (!empty($this->campo)) :

					
					foreach($this->campo AS $campo) :
					
						$this->Insert($campo['campo'], $campo['value_default'], $campo['value_inicial']);
						$this->Update($campo['campo'], $campo['value_default']);

					endforeach;
					
				endif;
			  
		  }
		  
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->Salvar();
               
          }
          
          
     }