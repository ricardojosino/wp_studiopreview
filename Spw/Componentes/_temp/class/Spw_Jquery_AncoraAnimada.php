<?php

	class Spw_Jquery_AncoraAnimada

     {

          // ATRIBUTOS
		
			protected $botao_id;
			protected $time = 1000;

			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO
			
			public function Set_AddBotao($id)
			{
				$this->botao_id[] = $id;
			}
			
			
			public function Set_Intervalo($value)
			{
				$this->time = $value;
			}



          // METODOS DE PROCESSO
			
			protected function Script()
			{
				
				if (!empty($this->botao_id)) :
				
					foreach($this->botao_id AS $botao) :

						$array[] = 'jQuery(document).ready(function($) {';
						$array[] = '$("#' . $botao . '").click(function(event){';
						$array[] = 'event.preventDefault();';
						$array[] = '$("html,body").animate({scrollTop:$(this.hash).offset().top}, ' . $this->time . ');';
						$array[] = '});';
						$array[] = '});';

					endforeach;

					$this->view[] = Spw_Html::Tag('script', null, join('', $array));
				
				endif;
			}
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {
			  $this->Script();
			  $this->Render();
          }


      }