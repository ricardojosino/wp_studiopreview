<?php

	class Spw_UI_Components_Espacamento

     {

          // ATRIBUTOS

			protected $margin_top;
			protected $margin_bottom;
			
			protected $view;
			public $render;


          // METODOS DE CONFIGURACAO
			
			public function Set_MarginTop($value)
			{
				$this->margin_top = $value;
			}
			
			
			public function Set_MarginBottom($value)
			{
				$this->margin_bottom = $value;
			}
			
			

          // METODOS DE PROCESSO
			
			protected function Template()
			{
				$this->view[] = Spw_Html::Tag('div', array( 'class' => 'spw-ui-components-espacamento', 'style' => Spw_Html::AttributesValue( array('padding-top' => $this->margin_top, 'padding-bottom' => $this->margin_bottom) ) ), null);
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