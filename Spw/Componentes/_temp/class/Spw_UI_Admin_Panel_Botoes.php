<?php

     class Spw_UI_Admin_Panel_Botoes
     
     {
          
     // ATRIBUTOS
		 
		 protected $botoes;
		 
		 protected $view;
		 public $render;
          
          
          
     // METODOS DE CONFIGURACAO
          
		 public function Set_AddBotao($value)
		 {
			 $this->botoes[] = '<div class="spw-item">' . $value . '</div>';
		 }

     
     // METODOS DE PROCESSO
		 
		 
		 protected function Botoes()
		 {
			 if (!empty($this->botoes)) :
				 return join(' ', $this->botoes);
			 endif;
		 }
		 
		 
		 
		 protected function Panel()
		 {
			 $this->view[] = '<div class="spw-panel-botoes">';
			 $this->view[] = $this->Botoes();
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