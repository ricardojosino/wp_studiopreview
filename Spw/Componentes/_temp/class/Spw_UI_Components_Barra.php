<?php

	class Spw_UI_Components_Barra

     {

          // ATRIBUTOS

			protected $margin_top;
			protected $margin_bottom;
			protected $color;
			protected $tamanho;
			protected $largura;
			protected $exibir = true;
			
			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO
			
			public function Set_Exibir($value)
			{
				$this->exibir = $value;
			}
			
			public function Set_MarginTop($value)
			{
				$this->margin_top = $value;
			}
			
			
			public function Set_MarginBottom($value)
			{
				$this->margin_bottom = $value;
			}
			
			
			public function Set_CorHexadecimal($value)
			{
				$this->color = $value;
			}
			
			
			public function Set_AlturaDaLinha($value)
			{
				$this->tamanho = $value;
			}
			
			
			public function Set_LarguraDaLinha($value)
			{
				$this->largura = $value;
			}



          // METODOS DE PROCESSO
			
			protected function Template()
			{
				if ($this->exibir) :
					$this->view[] = Spw_Html::Tag('div', array( 'class' => 'spw-ui-components-barra', 'style' => Spw_Html::AttributesValue( array( 'max-width' => $this->largura, 'margin-left' => 'auto', 'margin-right' => 'auto' , 'margin-top' => $this->margin_top, 'margin-bottom' => $this->margin_bottom, 'border-bottom-width' => $this->tamanho, 'border-bottom-color' => $this->color) ) ), '');
				endif;
			}
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->Template();
			  $this->Render();

          }


      }
