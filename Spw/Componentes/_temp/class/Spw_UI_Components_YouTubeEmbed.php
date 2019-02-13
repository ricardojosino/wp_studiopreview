<?php

	class Spw_UI_Components_YouTubeEmbed

     {

          // ATRIBUTOS
		
			protected $id;
			protected $largura;
			protected $alinhamento;
			protected $padding_bottom = '20px';
			protected $padding_top;

			protected $view;
			public $render;


          // METODOS DE CONFIGURACAO
			
			public function Set_Id($value)
			{
				$this->id = $value;
			}
			
			
			public function Set_Largura($value)
			{
				if (!empty($value)) :
					$this->largura = $value;
				endif;
			}
			
			
			public function Set_Alinhamento($value)
			{
				if (!empty($value) and $value != 'center' )  :
					$this->alinhamento = $value;
				endif;
			}
			
			
			public function Set_PaddinBottom($value)
			{
				$this->padding_bottom = $value;
			}
			
			
			public function Set_PaddingTop($value)
			{
				$this->padding_top = $value;
			}



          // METODOS DE PROCESSO
			
			protected function PaddingLeft()
			{
				if ($this->alinhamento == 'right') :
					return '20px';
				endif;
			}
			
			
			protected function PaddingRight()
			{
				if ($this->alinhamento == 'left') :
					return '20px';
				endif;
			}
			
		
			protected function Template()
			{
				if (!empty($this->id)) :
				
					$this->view[] = '<div ' . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue( array('width' => '100%', 'max-width' => $this->largura, 'float' => $this->alinhamento, 'padding-bottom' => $this->padding_bottom, 'padding-top' => $this->padding_top, 'padding-left' => $this->PaddingLeft(), 'padding-right' => $this->PaddingRight(), 'margin-left' => 'auto', 'margin-right' => 'auto' ) )) ) . ' >';
					$this->view[] = '<div  class="embed-responsive embed-responsive-16by9">';
					$this->view[] = '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . $this->id . '?rel=0"></iframe>';
					$this->view[] = '</div>';
					$this->view[] = '</div>';
					
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