<?php

	class Spw_App_CriarTodasAsPastas

	{

		// ATRIBUTOS
		
			protected $app;



		// METODOS DE CONFIGURACAO

			public function Set_App($value)
			{
				$this->app = $value;
			}


		// METODOS DE PROCESSO
		
			protected function Actions()
			{
				
				$pasta = Spw_App_Pasta::Action($this->app);
				
				if (!file_exists($pasta)) :
					
					mkdir($pasta);
					
				endif;
			}
			
			
			protected function ClassObject()
			{
				$pasta = Spw_App_Pasta::ClassObject($this->app);
				
				if (!file_exists($pasta)) :
					
					mkdir($pasta);
					
				endif;
			}
			
			
			protected function Css()
			{
				$pasta = Spw_App_Pasta::Css($this->app);
				
				if (!file_exists($pasta)) :
					
					mkdir($pasta);
					
				endif;
			}
			
			
			protected function Img()
			{
				$pasta = Spw_App_Pasta::Img($this->app);
				
				if (!file_exists($pasta)) :
					
					mkdir($pasta);
					
				endif;
			}
			
			
			protected function Js()
			{
				$pasta = Spw_App_Pasta::javaScript($this->app);
				
				if (!file_exists($pasta)) :
					
					mkdir($pasta);
					
				endif;
			}
			
			
			protected function View()
			{
				$pasta = Spw_App_Pasta::View($this->app);
				
				if (!file_exists($pasta)) :
					
					mkdir($pasta);
					
				endif;
			}



		// ALGORITIMO

		public function Executar()

		{
			$this->Actions();
			$this->ClassObject();
			$this->Css();
			$this->Img();
			$this->Js();
			$this->View();


		}


	 }
