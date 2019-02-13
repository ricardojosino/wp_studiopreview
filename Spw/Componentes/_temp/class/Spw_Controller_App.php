<?php 


	 class Spw_Controller_App
	 {
	 
	 // ATRIBUTOS

		  protected $app;
		  protected $slug;
		  protected $page_default;
		  protected $action;

		  // SAIDA
		  protected $view;
		  public $render;
	 
	 
	 
	 // METODOS DE CONFIGURACAO

		public function Set_AppName($value)
		{
			$this->app = $value;
		}
		
		
		public function Set_AppSlug($value)
		{
			$this->slug = $value;
		}



		public function Set_View_Default($value)
		{
			$this->page_default = $value;
		}


		public function Set_Action($value)
		{
			$this->action[] = $value;
		}


		  
	 
	 
	 
	 // METODOS DE PROCESSO

		protected function Action()
		{
			if ( !empty($this->app) and !empty($this->action)) :

				foreach($this->action AS $action) :

					include get_template_directory() . '/spw/' . $this->app . '/actions/' . $action . '.php';
					
					
				endforeach;

			endif;
		}
		

		protected function ActionDefault()
		{
			if (!empty($_GET['actions']) and !empty($this->app)) :

				include get_template_directory() . '/spw/' . $this->app . '/actions/' . $_GET['actions'] . '.php';
				exit();

			endif;
			
		}


		  protected function Page()
		  {
			   if (empty($_GET['view'])) :
					
					ob_start();
					Spw_App_Load::View($this->app, $this->page_default);
					$this->view[] = ob_get_clean();
					
						 else:
							  ob_start();
							  Spw_App_Load::View($this->app, $_GET['view']);
							  $this->view[] = ob_get_clean();
			   endif;
		  }


		  protected function Render()
		  {
			   $this->render = spw_view($this->view);
		  }
	 
	 
	 
	 // ALGORITIMO
	 
		public function Executar()
		{
			if (@$_GET['page'] == $this->slug) :	
				
				$this->Action();
				$this->ActionDefault();
				$this->Page();
				$this->Render();
				
			endif;
			
		}
	 
	 }
