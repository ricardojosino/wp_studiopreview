<?php

	class Spw_UI_Components_PerfilEquipe

     {

          // ATRIBUTOS
		
			protected $foto;
			protected $titulo;
			protected $descricao;
			protected $link;
			
			protected $style_titulo_color;
			protected $style_descricao_color;
		
			protected $view;
			public $render;



          // METODOS DE CONFIGURACAO
			
			public function Set_Foto($value)
			{
				$this->foto = $value;
			}
			
			
			public function Set_Titulo($value)
			{
				$this->titulo = $value;
			}
			
			
			public function Set_Descricao($value)
			{
				$this->descricao = $value;
			}
			
			
			public function Set_Link($value)
			{
				$this->link = $value;
			}
			
			
			public function Set_Style_Titulo_Color($value)
			{
				$this->style_titulo_color = $value;
			}
			
			
			public function Set_Style_Descricao_Color($value)
			{
				$this->style_descricao_color = $value;
			}



          // METODOS DE PROCESSO
			
			
			protected function Foto()
			{
				if (!empty($this->foto)) :
					
					return Spw_Html::Tag('div', array('class' => 'spw-foto', 'style' => Spw_Html::AttributesValue(array('background-image' => Spw_Html::Url($this->foto)))), null);
					
				endif;
			}
			
			
			protected function Texto()
			{
				$array[] = '<div class="spw-perfil-content">';
				$array[] = Spw_Html::Tag('div', array('class' => 'spw-descricao', 'style' => Spw_Html::AttributesValue(array('color' => $this->style_descricao_color))), $this->descricao);
				$array[] = Spw_Html::Tag('h4', array('class' => 'spw-ui-titulo-4', 'style' => Spw_Html::AttributesValue(array('color' => $this->style_titulo_color))), $this->titulo);
				$array[] = '</div>';
				
				return join('', $array);
			}
			
			
			protected function Link()
			{
				if (!empty($this->link)) :
					return Spw_Html::Tag('a', array('href' => $this->link), null);
				endif;
			}
			
			
			protected function Template()
			{
				$this->view[] = '<div class="spw-ui-components-perfil-equipe">';
				$this->view[] = $this->Link();
				$this->view[] = $this->Foto();
				$this->view[] = $this->Texto();
				$this->view[] = '</div>';
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