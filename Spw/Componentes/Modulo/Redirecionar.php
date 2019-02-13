<?php
     
     namespace Spw\Componentes\Modulo;

	class Redirecionar

	{

		// ATRIBUTOS
		
			protected $modo;
			protected $url;
			protected $modulo;
			protected $page;
			protected $pagina;
			protected $parametros;
			protected $gatilho;



		// METODOS DE CONFIGURACAO
		
			public function Set_RedirecionarParaUrl($value)
			{
				if (!empty($value)) :
					$this->modo = 1;
					$this->url = $value;
				endif;
				
			}
			
			
			public function Set_RedirecionarParaPagina($wp_page, $modulo, $pagina, $parametros)
			{
				if (!empty($wp_page) and !empty($pagina)) :
					$this->modo = 2;
					$this->page = $wp_page;
					$this->modulo = $modulo;
					$this->pagina = $pagina;
					$this->parametros = $parametros;
				endif;
				
			}
			
			
			public function Set_RedirecionarParaGatilho($modulo, $gatilho)
			{
				if (!empty($modulo) and !empty($gatilho)) :
					$this->modo = 3;
					$this->modulo = $modulo;
					$this->gatilho = $gatilho;
				endif;
				
			}



		// METODOS DE PROCESSO
			
			protected function RedirecionarUrl()
			{
				if (!empty($this->url)) :
                         ob_start();
                         echo 'Teste';
                         header('Location: ' . $this->url);
                         ob_flush();
                         
					//exit();
				endif;
			}
			
			
			protected function RedirecionarView()
			{
				if ( !empty($this->page) and !empty($this->pagina)) :
					
					(!empty($this->page)) ? $array[] = 'page=' . $this->page : '' ;
					(!empty($this->modulo)) ? $array[] = 'modulo=' . $this->modulo : '' ;
					(!empty($this->pagina)) ? $array[] = 'pagina=' . $this->pagina : '' ;
					(!empty($this->parametros)) ? $array[] = $this->parametros : '' ;
					
					(!empty($array)) ? $parametros = join('&', $array) : '';
                         $url = \Spw\Componentes\Ferramentas\Pacote::Url_JuntarComParametros( basename($_SERVER['SCRIPT_FILENAME']), $parametros);
					header('Location: ' . $url);
					exit();
				endif;
			}
			
			
			protected function RedirecionarAction()
			{
				if ( !empty($this->page) and !empty($this->gatilho)) :
					
					(!empty($this->page)) ? $array[] = 'page=' . $this->page : '' ;
					(!empty($this->modulo)) ? $array[] = 'modulo=' . $this->modulo : '' ;
					(!empty($this->pagina)) ? $array[] = 'gatilho=' . $this->gatilho : '' ;
					(!empty($this->parametros)) ? $array[] = $this->parametros : '' ;
					
					(!empty($array)) ? $parametros = join('&', $array) : '';
					
                         $url = \Spw\Componentes\Ferramentas\Pacote::Url_JuntarComParametros( basename($_SERVER['SCRIPT_FILENAME']), $parametros);
					header('Location: ' . $url);
					exit();
				endif;
			}
			
			
			protected function Modo()
			{
				
				switch($this->modo) :
					
					case 1 :
						$this->RedirecionarUrl();
						break;
					
					case 2 :
						$this->RedirecionarView();
						break;
					
					case 3 :
						$this->RedirecionarAction();
						break;
					
				endswitch;
				
				
			}



		// ALGORITIMO

		public function Executar()

		{
			$this->Modo();

		}


	 }