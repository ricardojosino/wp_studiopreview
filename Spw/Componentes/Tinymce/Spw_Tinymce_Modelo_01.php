<?php

	class Spw_Tinymce_Modelo_01

     {

          // ATRIBUTOS
		
			protected $seletor;

			protected $view;
			public $render;


          // METODOS DE CONFIGURACAO
			
			public function Set_Seletor($value)
			{
				$this->seletor = $value;
			}



          // METODOS DE PROCESSO
		
			protected function Script()
			{
				$arquivo = file_get_contents(Spw_Lib_Diretorio::javaScript('Spw_Tinymce_Modelo_01'));
				$script = str_replace(array('[get_seletor]'), array($this->seletor), $arquivo);
				
				$this->view[] = Spw_Html::Tag('script', null, $script);
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