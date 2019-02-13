<?php

	class Spw_Redirecionar

	{

		// ATRIBUTOS
		
			protected $modo;
			protected $url;
			protected $page;
			protected $view;
			protected $parametros;
			protected $action;



		// METODOS DE CONFIGURACAO
		
			public function Set_RedirecionarParaUrl($value)
			{
				if (!empty($value)) :
					$this->modo = 1;
					$this->url = $value;
				endif;
				
			}
			
			
			public function Set_RedirecionarParaView($page, $view, $parametros)
			{
				if (!empty($page) and !empty($view)) :
					$this->modo = 2;
					$this->page = $page;
					$this->view = $view;
					$this->parametros = $parametros;
				endif;
				
			}
			
			
			public function Set_RedirecionarParaAction($app, $action)
			{
				if (!empty($app) and !empty($action)) :
					$this->modo = 3;
					$this->app = $app;
					$this->action = $action;
				endif;
				
			}



		// METODOS DE PROCESSO
			
			protected function RedirecionarUrl()
			{
				if (!empty($this->url)) :
					header('Location: ' . $this->url);
					exit();
				endif;
			}
			
			
			protected function RedirecionarView()
			{
				if ( !empty($this->page) and !empty($this->view)) :
					
					(!empty($this->page)) ? $array[] = 'page=' . $this->page : '' ;
					(!empty($this->view)) ? $array[] = 'view=' . $this->view : '' ;
					(!empty($this->parametros)) ? $array[] = $this->parametros : '' ;
					
					(!empty($array)) ? $parametros = join('&', $array) : '';
					
					$url = spw_montar_link(basename($_SERVER['SCRIPT_FILENAME']), $parametros);
					header('Location: ' . $url);
					exit();
				endif;
			}
			
			
			protected function RedirecionarAction()
			{
				if ( !empty($this->page) and !empty($this->action)) :
					
					(!empty($this->page)) ? $array[] = 'page=' . $this->page : '' ;
					(!empty($this->view)) ? $array[] = 'action=' . $this->action : '' ;
					(!empty($this->parametros)) ? $array[] = $this->parametros : '' ;
					
					(!empty($array)) ? $parametros = join('&', $array) : '';
					
					$url = spw_montar_link(basename($_SERVER['SCRIPT_FILENAME']), $parametros);
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