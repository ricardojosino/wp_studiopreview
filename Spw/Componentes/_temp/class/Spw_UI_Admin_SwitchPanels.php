<?php

	class Spw_UI_Admin_SwitchPanels

     {

          // ATRIBUTOS

			protected $view;
			public $render;


          // METODOS DE CONFIGURACAO



          // METODOS DE PROCESSO
			
			protected function BotaoSwitch()
			{
				$array[] = '';
			}
			
			
			protected function Template()
			{
				$this->view[] = '';
				$this->view[] = '';
				$this->view[] = '';
				$this->view[] = '';
				$this->view[] = '';
				$this->view[] = '';
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