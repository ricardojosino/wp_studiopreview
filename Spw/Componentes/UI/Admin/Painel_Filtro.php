<?php
     
     namespace Spw\Componentes\UI\Admin;

	class Painel_Filtro

		{

			// ATRIBUTOS
		
			protected $contents;
			protected $hiddens;
			
			protected $form_action;
			protected $form_method;

			protected $view;
			public $render;



			// METODOS DE CONFIGURACAO
			
			public function Set_AdicionarCampo($componente)
			{
				$this->contents[] = '<div class="spw-item">' . $componente . '</div>';
			}
			
			
			public function Set_AdicionarCampoOculto($componente)
			{
				$this->hiddens[] = $componente;
			}
			
			
			public function Set_Form_Action($value)
			{
				$this->form_action = $value;
			}
			
			
			public function Set_Form_Method($value)
			{
				$this->form_method = $value;
			}


			// METODOS DE PROCESSO
			
			protected function Contents()
			{
				if (!empty($this->contents)) :
					return join('', $this->contents);
				endif;
			}
			
			
			protected function Hiddens()
			{
				if (!empty($this->hiddens)) :
					return join('', $this->hiddens);
				endif;
			}
			
			
			protected function Template()
			{
				$array[] = '<div class="spw-panel-filtros">';
				$array[] = '<b style="display: block;margin-right: 20px; margin-bottom: 10px; font-weight: bold">FILTRO:</b> ';
				$array[] = '<div class="spw-itens">';
				$array[] =  $this->Contents();
				$array[] = '</div>';
				$array[] = '</div>';
				
				return join('', $array);
			}
			
			
			protected function Form()
			{
				$form = new \Spw\Componentes\Html\Form();
				$form->Set_Action($this->form_action);
				$form->Set_ExibirTagForm(true);
				$form->Set_Id('filtro');
				$form->Set_Name('filtro');
				$form->Set_Hidden($this->Hiddens());
				$form->Set_Row($this->Template());
				$form->Set_Method($this->form_method);
				$form->Executar();
				
				$this->view[] = $form->render;
			}
			
			
			protected function Render()
			{
				$this->render = \Spw\Componentes\Funcoes::Render($this->view);
			}



			// ALGORITIMO

			public function Executar()

			{
				$this->Form();
				$this->Render();
			}


		}
