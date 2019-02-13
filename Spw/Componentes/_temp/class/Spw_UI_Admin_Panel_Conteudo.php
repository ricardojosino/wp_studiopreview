<?php

     class Spw_UI_Admin_Panel_Conteudo
     
     {
          
     // ATRIBUTOS
		 
		 protected $titulo = 'Título do panel';
		 protected $conteudo;
		 protected $add_view;
          
		 protected $view;
		 public $render;
          
          
     // METODOS DE CONFIGURACAO
		 
		 public function Set_Titulo($value)
		 {
			 $this->titulo = $value;
		 }
		 
		 
		 public function Set_AddConteudo($value)
		 {
			 $this->conteudo[] = Spw_Html::Tag('div', null, $value);
		 }
		 
		 
		 public function Set_AddView($app, $view)
		 {
			 
			 ob_start();
			 
			 include spw_app_path($app) . '/view/' . $view . '.php';
			 
			 $this->conteudo[] = ob_get_clean();
		 }
		 
		

     
     // METODOS DE PROCESSO
		 
		 protected function Titulo()
		 {
			 
			 $array[] = '<div class="spw-titulo">';
			 $array[] = $this->titulo;
			 $array[] = '</div>';
			 
			 return join(' ', $array);
		 }
		 
		 
		 protected function Conteudo()
		 {
			 if (!empty($this->conteudo)) :
				 return join(' ', $this->conteudo);
			 endif;
		 }
		 
		 
		 protected function Panel()
		 {
			 
			 $this->view[] = '<div class="spw-panel-conteudo">';
			 $this->view[] = $this->Titulo();
			 $this->view[] = $this->Conteudo();
			 $this->view[] = '</div>';
		 }
		 
		 
		 protected function Render()
		 {
			 $this->render = spw_view($this->view);
		 }
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               
               $this->Panel();
			   $this->Render();
               
          }
          
          
     }