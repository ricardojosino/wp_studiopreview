<?php
     
     namespace Spw\Componentes\UI\Admin;

	class BlocoDeConteudo
     
     {
          
     // ATRIBUTOS
		
		protected $content;
		protected $wrap;
		protected $view;
		public $render;
          
          
          
     // METODOS DE CONFIGURACAO
		
		public function Set_AdicionarConteudo($id, $value, $margin_top = 0, $margin_bottom = 0)
		{
			if (!empty($value)) :
				$this->content[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $id, 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('margin-top' => $margin_top, 'margin-bottom' => $margin_bottom) ) ), $value);
			endif;
		}
          
          
          
		public function Set_AdicionarBloco($id, $modulo, $nome, $margin_top = 0, $margin_bottom = 0)
		{
			if (!empty($nome)) :
                    ob_start();
                    \Spw\Componentes\Modulo\IncluirArquivo::Bloco($modulo, $nome);
                    
				$this->content[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $id, 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('margin-top' => $margin_top, 'margin-bottom' => $margin_bottom) ) ), ob_get_clean() );
			endif;
		}
          
          
          public function Set_AdicionarScript($value)
          {
               if (!empty($value)) :
                    $this->content[] = $value;
               endif;
          }
		
		
		public function Set_Wrap($value)
		{
			$this->wrap = $value;
		}
          

     
     // METODOS DE PROCESSO
		
		protected function Content()
		{
			if (!empty($this->content)) :
				$this->view[] = join(' ', $this->content);
			endif;
		}
		
		
		protected function Wrap()
		{
			if (!empty($this->content)) :
				$this->view[] = '<div class="spw-ui-wrap">';
				$this->view[] = join(' ', $this->content);
				$this->view[] = '</div>';
			endif;
		}
		
		
		protected function Container()
		{
			switch($this->wrap) :
				
				case true :
					$this->Wrap();
					break;
				
				case false :
					$this->Content();
					break;
				
				default :
					$this->Wrap();
					break;
				
			endswitch;
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
