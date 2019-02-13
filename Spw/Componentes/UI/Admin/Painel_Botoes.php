<?php
     
     namespace Spw\Componentes\UI\Admin;

     class Painel_Botoes
     
     {
          
     // ATRIBUTOS
		 
		 protected $botoes;
		 
		 protected $view;
		 public $render;
          
          
          
     // METODOS DE CONFIGURACAO
          
		 public function Set_AdicionarBotao($value)
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
			 $this->render = \Spw\Componentes\Funcoes::Render($this->view);
		 }
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->Panel();
               $this->Render();
          }
          
          
     }