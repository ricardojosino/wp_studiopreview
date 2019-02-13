<?php
     
     namespace Spw\Componentes\UI\Admin;

	class Alert

     {

          // ATRIBUTOS
		
			protected $itens;
			protected $background_color;

			protected $view;
			public $render;


          // METODOS DE CONFIGURACAO
			
			public function Set_AdicionarTitulo($value)
			{
				if (!empty($value)) :
					$this->itens[] = \Spw\Componentes\Html\Funcoes::Tag('h3', array('class' => 'spw-alert-titulo'), $value);
				endif;
			}
			
			
			public function Set_AdicionarDescricao($value)
			{
				if (!empty($value)) :
					$this->itens[] = \Spw\Componentes\Html\Funcoes::Tag('p', array('class' => 'spw-alert-descricao'), $value);
				endif;
			}
			
			
			public function Set_AdicionarRotulo($label, $value)
			{
				if (!empty($value)) :
					$this->itens[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-alert-label'), Spw_Html::Tag('strong', array('class' => 'spw-alert-strong'), $label . ': ') . $value);
				endif;
			}
			
			
			public function Set_AdicionarEspacamento()
			{
				$this->itens[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-alert-espacamento'), null);
			}
			
			
			public function Set_Cor_Azul()
			{
				$this->background_color = 'azul';
			}
			
			
			public function Set_Cor_Cinza()
			{
				$this->background_color = 'cinza';
			}
			
			
			public function Set_Cor_Verde()
			{
				$this->background_color = 'verde';
			}
			
			
			public function Set_Cor_Vermelho()
			{
				$this->background_color = 'vermelho';
			}
			
			
			public function Set_Cor_Amarelo()
			{
				$this->background_color = 'amarelo';
			}



          // METODOS DE PROCESSO
			
			
			protected function Itens()
			{
				if (!empty($this->itens)) :
					
					return join('', $this->itens);
					
				endif;
			}
			
			
			protected function Background()
			{
				
				switch($this->background_color) :
					
					case 'azul' :
						return ' spw-alert-background-azul ';
						break;
					
					case 'cinza' :
						return ' spw-alert-background-cinza ';
						break;
					
					case 'verde' :
						return ' spw-alert-background-verde ';
						break;
					
					case 'vermelho' :
						return ' spw-alert-background-vermelho ';
						break;
					
					case 'amarelo' :
						return ' spw-alert-background-amarelo ';
						break;
					
				endswitch;
				
			}
			
			
			
			protected function Template()
			{
				$this->view[] = '<div class="spw-ui-box-alert' . $this->Background() . '">';
				$this->view[] = $this->Itens();
				$this->view[] = '</div>';
			}
			
			
			protected function Render()
			{
				$this->render = \Spw\Componentes\Funcoes::Render($this->view);
			}
			



          // ALGORITIMO

          public function Executar()

          {

			  $this->Template();
			  $this->Render();

          }


      }