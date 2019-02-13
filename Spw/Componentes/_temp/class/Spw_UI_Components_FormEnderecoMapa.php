<?php

	class Spw_UI_Components_FormEnderecoMapa

     {

          // ATRIBUTOS
		
			protected $comunicacao;
			protected $redes_sociais;
			protected $mapa_endereco;
			protected $mapa_embed;
			protected $shotcode_form;
			
			protected $style_margin_top;
			protected $style_margin_bottom;
			protected $style_background_exibir;
			protected $style_background_width;
			protected $style_background_color;
			protected $style_endereco_background_color;
			protected $style_endereco_text_color;
			protected $style_formulario_label_text_color;
			protected $style_formulario_input_background_color;
			protected $style_formulario_input_text_color;
			protected $style_formulario_botao_background_color;
			protected $style_formulario_botao_text_color;
			protected $style_formulario_botao_border_radius;
		
			protected $view;
			public $render;



          // METODOS DE CONFIGURACAO
			
			public function Set_AddComunicacao($icone, $texto, $link = null, $target = null)
			{
				$this->comunicacao[] = array('icone' => $icone, 'texto' => $texto, 'link' => $link, 'target' => $target  );
			}
			
			
			public function Set_AddRedeSocial($icone, $nome, $link, $target)
			{
				$this->redes_sociais[] = array('icone' => $icone, 'nome' => $nome, 'link' => $link, 'target' => $target);
			}
			
			
			public function Set_Mapa_Endereco($value)
			{
				$this->mapa_endereco = $value;
			}
			
			
			public function Set_Mapa_Embed($value)
			{
				$this->mapa_embed = $value;
			}
			
			
			public function Set_ShortCodeFormulario($value)
			{
				$this->shotcode_form = $value;
			}
			
			
			public function Set_Style_MarginTop($value)
			{
				$this->style_margin_top = $value;
			}

			
			public function Set_Style_MarginBottom($value)
			{
				$this->style_margin_bottom = $value;
			}
			
			
			public function Set_Style_Enderecos_BackgroundColor($value)
			{
				$this->style_endereco_background_color = $value;
			}
			
			
			public function Set_Style_Enderecos_TextColor($value)
			{
				$this->style_endereco_text_color = $value;
			}
			
			
			public function Set_Style_Formulario_Inputs_BackgroundColor($value)
			{
				$this->style_formulario_input_background_color = $value;
			}
			
			
			public function Set_Style_Formulario_Inputs_TextColor($value)
			{
				$this->style_formulario_input_text_color = $value;
			}
			
			
			public function Set_Style_Formulario_Botao_BackgroundColor($value)
			{
				$this->style_formulario_botao_background_color = $value;
			}
			
			
			public function Set_Style_Formulario_Botao_BorderRadius($value)
			{
				$this->style_formulario_botao_border_radius = $value;
			}
			
			
			public function Set_Style_Formulario_Botao_TextColor($value)
			{
				$this->style_formulario_botao_text_color = $value;
			}
			
			
			public function Set_Style_Formulario_Label_TextColor($value)
			{
				$this->style_formulario_label_text_color = $value;
			}
			
			
			public function Set_Style_Background_Exibir($value)
			{
				$this->style_background_exibir = $value;
			}
			
			
			public function Set_Style_Background_Color($value)
			{
				$this->style_background_color = $value;
			}
			
			
			public function Set_Style_Background_Width($value)
			{
				$this->style_background_width = $value;
			}



          // METODOS DE PROCESSO
			
			
			
			
			protected function BoxEnderecoItens()
			{
				if (!empty($this->comunicacao)) :
					$array[] = '<div class="spw-itens">';
					foreach($this->comunicacao AS $item) :
						$array[] = $this->BoxEnderecoItem($item['icone'], $item['texto'], $item['link'], $item['target']);
					endforeach;
					$array[] = '</div>';
				
						else :
							return $array[] = null;
					
				endif;
				
				return join('', $array);
			}
			
			
			protected function BoxEnderecoItem($icone, $texto, $link, $target)
			{
				$array[] = '<div class="spw-item">';
				$array[] = '<div class="spw-icone">' . Spw_Html::Tag('img', array('src' => $icone), null) . '</div>';
				$array[] = '<div class="spw-texto">' . Spw_Html::Tag('a', array('href' => $link, 'target' => $target), $texto) . '</div>';
				$array[] = '</div>';
				
				return join('', $array);
			}
			
			
			protected function BoxEnderecoBarra()
			{
				return '<div class="spw-barra"></div>';
			}
			
			
			protected function BoxEnderecoRedesSociais()
			{
				
				if (!empty($this->redes_sociais)) :
				
				$array[] = '<div class="spw-redes-sociais">';
				
				foreach($this->redes_sociais AS $item) :
					$array[] = $this->BoxEnderecoRedesSociaisItem($item['icone'], $item['nome'], $item['link'], $item['target']);
				endforeach;
				
				$array[] = '</div>';
				
					else :
						$array[] = null;
				
				endif;
				
				
				return join('', $array);
				
			}
			
			
			protected function BoxEnderecoRedesSociaisItem($icone, $nome, $link, $target = '_blank')
			{
				return Spw_Html::Tag('a', array( 'class' => 'spw-item', 'href' => $link, 'target' => $target), Spw_Html::Tag('img', array('src' => $icone), null));
			}
			
			
			protected function BoxEndereco()
			{
				$array[] = '<div class="spw-box-endereco">';
				$array[] = $this->BoxEnderecoItens();
				$array[] = $this->BoxEnderecoBarra();
				$array[] = $this->BoxEnderecoRedesSociais();
				$array[] = '</div>';
				
				return join('', $array);
				
			}
			
			
			protected function Iframe()
			{
				
				if ( !empty($this->mapa_endereco) ) :
				
				$array[] = '<iframe';
				$array[] = 'width="100%"';
				$array[] = 'height="519"';
				$array[] = 'frameborder="0" style="border:0"';
				$array[] = 'src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBtsh6SsSdOAV2v1CwaOaEF8Aw09RdYNdo&q=' . $this->mapa_endereco . ' "';
				$array[] = 'allowfullscreen>';
				$array[] = '</iframe>';
				
				return join(' ', $array);
				
				endif;
				
				if (!empty($this->mapa_embed)) :
					return $this->mapa_embed;
				endif;
				
				
			}
			
			
			protected function BoxMapa()
			{
				$array[] = '<div class="spw-item spw-box-mapa">';
				$array[] = $this->Iframe();
				$array[] = '</div>';
				
				return join('', $array);
				
			}
			
			
			protected function BoxFormulario()
			{
				$array[] = '<div class="spw-item spw-box-form">';
				$array[] = do_shortcode($this->shotcode_form);
				$array[] = '</div>';
				
				return join('', $array);
				
			}
			
			
			protected function Background()
			{
				if ( $this->style_background_exibir ) :
					
					return '<div class="spw-background"></div>';
					
				endif;
			}
			
			
			
			protected function Content()
			{
				$this->view[] = '<div class="spw-ui-components-comunicacao">';
				$this->view[] = $this->Background();
				$this->view[] = '<div class="spw-wrap">';
				$this->view[] = $this->BoxEndereco();
				$this->view[] = $this->BoxMapa();
				$this->view[] = $this->BoxFormulario();
				$this->view[] = '</div>';
				$this->view[] = '</div>';
			}
			
			
			protected function StyleDinamico()
			{
				
				$array[] = (!empty($this->style_endereco_background_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-endereco {background-color: ' . $this->style_endereco_background_color . '  }' : '' );
				$array[] = (!empty($this->style_endereco_text_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-endereco .spw-item .spw-texto {color: '  . $this->style_endereco_text_color . ' }' : '' );
				$array[] = (!empty($this->style_endereco_text_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-endereco .spw-item .spw-texto a {color: '  . $this->style_endereco_text_color . '; text-decoration: none }' : '' );
				$array[] = (!empty($this->style_formulario_label_text_color)) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-form label { color: ' . $this->style_formulario_label_text_color . ' }'  : '';
				$array[] = (!empty($this->style_formulario_input_background_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-form input[type=text], input[type=email] {background-color: ' . $this->style_formulario_input_background_color . ' }' : '' ) ;
				$array[] = (!empty($this->style_formulario_input_background_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-form textarea {background-color: ' . $this->style_formulario_input_background_color . ' }' : '' ) ;
				$array[] = (!empty($this->style_formulario_input_text_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-form input[type=text], input[type=email] {color: ' . $this->style_formulario_input_text_color . ' }' : '' ) ;
				$array[] = (!empty($this->style_formulario_input_text_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-form textarea {color: ' . $this->style_formulario_input_text_color . ' }' : '' ) ;
				$array[] = (!empty($this->style_formulario_botao_background_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-form input[type=submit] { background-color: ' . $this->style_formulario_botao_background_color . ' }'  : '' );
				$array[] = (!empty($this->style_formulario_botao_text_color) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-form input[type=submit] { color: ' . $this->style_formulario_botao_text_color . ' }'  : '' );
				$array[] = (!empty($this->style_formulario_botao_border_radius) ? '.spw-ui-components-comunicacao .spw-wrap .spw-box-form input[type=submit] { border-radius: ' . $this->style_formulario_botao_border_radius . ' }'  : '' );
				$array[] = (!empty($this->style_background_color) ? '.spw-ui-components-comunicacao .spw-background {background-color: ' . $this->style_background_color . ' }' : '' );
				$array[] = (!empty($this->style_background_width) ? '.spw-ui-components-comunicacao .spw-background {max-width: ' . $this->style_background_width . ' }' : '' );
				$array[] = (!empty($this->style_margin_top) ? '.spw-ui-components-comunicacao { margin-top: ' . $this->style_margin_top . ' }' : '' );
				$array[] = (!empty($this->style_margin_bottom) ? '.spw-ui-components-comunicacao { margin-bottom: ' . $this->style_margin_bottom . ' }' : '' );
				
				
				if (!empty($array)) :
					
					$this->view[] = Spw_Html::Tag('style', array( 'scoped' => '' ), join('', $array));
					
				endif;
				
			}
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}
		

          // ALGORITIMO

          public function Executar()

          {
			  $this->StyleDinamico();
			  $this->Content();
			  $this->Render();


          }


      }