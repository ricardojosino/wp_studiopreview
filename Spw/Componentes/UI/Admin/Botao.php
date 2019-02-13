<?php
     
     namespace Spw\Componentes\UI\Admin;

     class Botao
     
     {
          
     // ATRIBUTOS
		 
		protected $botao;
		 
		protected $view;
		public $render;
          
          
          
     // METODOS DE CONFIGURACAO
		
		public function Set_AdicionarBotao_Padrao($id, $titulo, $link, $component)
		{
			$this->botao = '<div><div class="spw-botao default">' . \Spw\Componentes\Html\Funcoes::Tag('a', array( 'id' => $id, 'href' => $link), $titulo)  . '</div>' . $component . '</div>';
		}
		 
          
		 public function Set_AdicionarBotao_Inserir($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div><div class="spw-botao inserir">' . \Spw\Componentes\Html\Funcoes::Tag('a', array( 'id' => $id, 'href' => $link), $titulo) . '</div>'  . $component . '</div>';
		 }
		 
		 
		 public function Set_AdicionarBotao_Reset($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div><div class="spw-botao reset">' . \Spw\Componentes\Html\Funcoes::Tag('a', array( 'id' => $id, 'href' => $link), $titulo)  . '</div>' . $component . '</div>';
		 }
		 
		 
		 public function Set_AdicionarBotao_Salvar($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div><div class="spw-botao salvar">' . \Spw\Componentes\Html\Funcoes::Tag('a', array('id' => $id, 'href' => $link), $titulo)  . '</div>' . $component . '</div>';
		 }
		 
		 
		 public function Set_AdicionarBotao_Excluir($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div><div class="spw-botao excluir">' . \Spw\Componentes\Html\Funcoes::Tag('a', array('id' => $id, 'href' => $link), $titulo)  . '</div>' . $component . '</div>';
		 }
		 
		 
		 public function Set_AdicionarBotao_Info($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div><div class="spw-botao info">' . \Spw\Componentes\Html\Funcoes::Tag('a', array('id' => $id, 'href' => $link), $titulo)  . '</div>' . $component . '</div>';
		 }
		 
		 
		 public function Set_AdicionarBotao_Link($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div><div class="spw-botao link">' . \Spw\Componentes\Html\Funcoes::Tag('a', array('id' => $id, 'href' => $link), $titulo)  . '</div>' . $component . '</div>';
		 }

     
     // METODOS DE PROCESSO
		 
		 
		 
		protected function Botao()
		{

			if (!empty($this->botao)) :
				
				$this->view[] = $this->botao;
				
			endif;

		}
		 
		 
		protected function Render()
		{
			$this->render = \Spw\Componentes\Funcoes::Render($this->view);
		}
     

     // ALGORITIMO
          
		public function Executar()

		{

		  $this->Botao();
		  $this->Render();

		}
          
          
     }