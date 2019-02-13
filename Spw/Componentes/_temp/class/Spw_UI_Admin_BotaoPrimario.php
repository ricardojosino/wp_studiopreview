<?php

     class Spw_UI_Admin_BotaoPrimario
     
     {
          
     // ATRIBUTOS
		 
		protected $botao;
		 
		protected $view;
		public $render;
          
          
          
     // METODOS DE CONFIGURACAO
		
		public function Set_AddBotaoDefault($id, $titulo, $link, $component)
		{
			$this->botao = '<div class="spw-botao default">' . Spw_Html::TagA($id, '', $titulo, $link) . $component . '</div>';
		}
		 
          
		 public function Set_AddBotaoInserir($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div class="spw-botao inserir">' . Spw_Html::TagA($id, '', $titulo, $link) . $component . '</div>';
		 }
		 
		 
		 public function Set_AddBotaoReset($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div class="spw-botao reset">' . Spw_Html::TagA($id, '', $titulo, $link) . $component . '</div>';
		 }
		 
		 
		 public function Set_AddBotaoSalvar($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div class="spw-botao salvar">' . Spw_Html::TagA($id, '', $titulo, $link) . $component . '</div>';
		 }
		 
		 
		 public function Set_AddBotaoExcluir($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div class="spw-botao excluir">' . Spw_Html::TagA($id, '', $titulo, $link) . $component . '</div>';
		 }
		 
		 
		 public function Set_AddBotaoInfo($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div class="spw-botao info">' . Spw_Html::TagA($id, '', $titulo, $link) . $component . '</div>';
		 }
		 
		 
		 public function Set_AddBotaoLink($id, $titulo, $link, $component)
		 {
			 $this->botao = '<div class="spw-botao link">' . Spw_Html::TagA($id, '', $titulo, $link) . $component . '</div>';
		 }

     
     // METODOS DE PROCESSO
		 
		 
		 
		protected function Botao()
		{

			if (!empty($this->botao)) :
				
				$this->view[] = $this->botao;
				
			endif;

		}
		 
		 
		protected function Render()
		{
			$this->render = spw_view($this->view);
		}
     

     // ALGORITIMO
          
		public function Executar()

		{

		  $this->Botao();
		  $this->Render();

		}
          
          
     }