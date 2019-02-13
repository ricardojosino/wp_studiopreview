<?php
     
     namespace Spw\Componentes\UI\Admin;

	class Bloco_Botoes
     
     {
          
     // ATRIBUTOS
		
		protected $add_botoes;
		protected $separador;
          
		protected $view;
		public $render;
          
     // METODOS DE CONFIGURACAO
		
		
		public function Set_AddBotao($id, $value)
		{
			$this->add_botoes[] = '<div ' . \Spw\Componentes\Html\Funcoes::Atributos(array('id' => $id)) . ' class="spw-item">' . $value . '</div>';
		}
		
		
		public function Set_Separador($value)
		{
			$this->separador = $value;
		}
          

     
     // METODOS DE PROCESSO
		
		protected function Botoes()
		{
			if (!empty($this->add_botoes)) :
				
				return join($this->separador, $this->add_botoes);
				
			endif;
		}
          
		protected function Container()
		{
			$this->view[] = '<div class="spw-container-botoes">';
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
               $this->Container();
               $this->Render();
          }
          
          
     }