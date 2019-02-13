<?php

     namespace Imoveis\Componentes;
     
     class BlocoDoImovel
     {
          
          // 01
          
          protected $imagem_url;
          protected $link;
          
          protected $item_referencia;
          protected $item_titulo;
          protected $item_endereco;
          protected $item_area_texto;
          protected $item_area_icone;
          protected $item_dormitorios_texto;
          protected $item_dormitorios_icone;
          protected $item_dormitorios_suite_numero;
          protected $item_banheiros_texto;
          protected $item_banheiros_icone;
          protected $item_garagens_texto;
          protected $item_garagens_icone;
          
          protected $style_font_family;
          protected $style_border_color;
          protected $style_border_radius;
          protected $style_background_color;
          protected $style_box_shadow;
          
          protected $style_texto_referencia_color;
          protected $style_texto_referencia_font_size;
          protected $style_texto_referencia_font_weight;
          protected $style_texto_referencia_text_transform;
          
          protected $style_texto_titulo_color;
          protected $style_texto_titulo_font_size;
          protected $style_texto_titulo_font_weight;
          protected $style_texto_titulo_text_transform;
          
          protected $style_texto_endereco_color;
          protected $style_texto_endereco_font_size;
          protected $style_texto_endereco_font_weight;
          protected $style_texto_endereco_text_transform;
          
          protected $style_texto_itens_color;
          protected $style_texto_itens_font_size;
          protected $style_texto_itens_font_weight;
          protected $style_texto_itens_text_transform;
          
          protected $view;
          public $render;
          
          
          // 02
          
          public function Set_Link($value)
          {
               $this->link = $value;
          }
          
          
          public function Set_Imagem($url)
          {
               $this->imagem_url = $url;
          }
          
          public function Set_Item_Referencia($prefixo, $value)
          {
               if (!empty($value)) :
               
                    (empty($prefixo)) ? $texto = $value : $texto = $prefixo . ' ' . $value;

                    $this->item_referencia = $texto;
               
               endif;
          }
          
          
          public function Set_Item_Titulo($value)
          {
               $this->item_titulo = $value;
          }
          
          
          public function Set_Item_Endereco($value)
          {
               $this->item_endereco = $value;
          }
          
          
          public function Set_Item_Area($icone, $value)
          {
               if (!empty($value)) :
                    $this->item_area_icone = $icone;
                    $this->item_area_texto = $value . ' ' . 'm&sup2';
               endif;
          }
          
          
          public function Set_Item_Dormitorio($icone, $value, $numero_suites)
          {
               $this->item_dormitorios_icone = $icone;
               $this->item_dormitorios_texto = $this->PluralSingular($value, 'quarto', 'quartos');
               $this->item_dormitorios_suite_numero = $this->PluralSingular($numero_suites, 'suíte', 'suítes');
          }
          
          
          public function Set_Item_Banheiro($icone, $value)
          {
               $this->item_banheiros_icone = $icone;
               $this->item_banheiros_texto = $this->PluralSingular($value, 'banheiro', 'banheiros');
          }
          
          
          public function Set_Item_Garagem($icone, $value)
          {
               $this->item_garagens_icone = $icone;
               $this->item_garagens_texto = $this->PluralSingular($value, 'garagem', 'garagens');
          }
          
          
          public function Set_Style_FontFamily($value)
          {
               $this->style_font_family = $value;
          }
          
          
          public function Set_Style_BorderRadius($value)
          {
               $this->style_border_radius = $value;
          }
          
          
          public function Set_Style_BorderColor($value)
          {
               $this->style_border_color = $value;
          }
          
          
          public function Set_Style_BackgroundColor($value)
          {
               $this->style_background_color = $value;
          }
          
          
          public function Set_Style_BoxShadow($value)
          {
               $this->style_box_shadow = $value;
          }
          
          
          public function Set_Style_TextoReferencia_Color($value)
          {
               $this->style_texto_referencia_color = $value;
          }
          
          
          public function Set_Style_TextoReferencia_FontSize($value)
          {
               $this->style_texto_referencia_font_size = $value;
          }
          
          
          public function Set_Style_TextoReferencia_FontWeight($value)
          {
               $this->style_texto_referencia_font_weight = $value;
          }
          
          
          public function Set_Style_TextoReferencia_TextTransform($value)
          {
               $this->style_texto_referencia_text_transform = $value;
          }
          
          
          public function Set_Style_TextoTitulo_Color($value)
          {
               $this->style_texto_titulo_color = $value;
          }
          
          
          public function Set_Style_TextoTitulo_FontSize($value)
          {
               $this->style_texto_titulo_font_size = $value;
          }
          
          
          public function Set_Style_TextoTitulo_FontWeight($value)
          {
               $this->style_texto_titulo_font_weight = $value;
          }
          
          
          public function Set_Style_TextoTitulo_TextTransform($value)
          {
               $this->style_texto_titulo_text_transform = $value;
          }
          
          
          public function Set_Style_TextoEndereco_Color($value)
          {
               $this->style_texto_endereco_color = $value;
          }
          
          
          public function Set_Style_TextoEndereco_FontSize($value)
          {
               $this->style_texto_endereco_font_size = $value;
          }
          
          
          public function Set_Style_TextoEndereco_FontWeight($value)
          {
               $this->style_texto_endereco_font_weight = $value;
          }
          
          
          public function Set_Style_TextoEndereco_TextTransform($value)
          {
               $this->style_texto_endereco_text_transform = $value;
          }
          
          
          public function Set_Style_TextoItens_Color($value)
          {
               $this->style_texto_itens_color = $value;
          }
          
          
          public function Set_Style_TextoItens_FontSize($value)
          {
               $this->style_texto_itens_font_size = $value;
          }
          
          
          public function Set_Style_TextoItens_FontWeight($value)
          {
               $this->style_texto_itens_font_weight = $value;
          }
          
          
          public function Set_Style_TextoItens_TextTransform($value)
          {
               $this->style_texto_itens_text_transform = $value;
          }
          
          
          
          // 03
          
          
          protected function PluralSingular($numero, $texto_singular, $texto_plural)
          {
               if ($numero == 1) :
                    return $numero . ' ' . $texto_singular;
               
                         elseif($numero >1) :
                              return $numero . ' ' . $texto_plural;
                              
               endif;
          }
          
          
          protected function Foto()
          {
               $img = $this->imagem_url;
               return \Spw\Componentes\Html\Funcoes::Tag('div', array( 'class' => 'spw-imoveis-thumb', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('background-image' => \Spw\Componentes\Html\Funcoes::Url( $img )) ) ), null);
          }
          
          
          protected function ItemReferencia()
          {
               if (!empty($this->item_referencia)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('div', array( 'class' => 'spw-imoveis-texto-referencias', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('color' => $this->style_texto_referencia_color, 'font-size' => $this->style_texto_referencia_font_size, 'font-weight' => $this->style_texto_referencia_font_weight, 'text-transform' => $this->style_texto_referencia_text_transform) ) ), $this->item_referencia);
               endif;
          }
          
          
          protected function ItemTitulo()
          {
               if (!empty($this->item_titulo)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('h1', array( 'class' => 'spw-imoveis-texto-titulo', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('color' => $this->style_texto_titulo_color, 'font-size' => $this->style_texto_titulo_font_size, 'font-weight' => $this->style_texto_titulo_font_weight, 'text-transform' => $this->style_texto_titulo_text_transform) ) ), $this->item_titulo);
               endif;
          }
          
          
          protected function ItemEndereco()
          {
               if (!empty($this->item_endereco)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('div', array( 'class' => 'spw-imoveis-texto-enderecos', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('color' => $this->style_texto_endereco_color, 'font-size' => $this->style_texto_endereco_font_size, 'font-weight' => $this->style_texto_endereco_font_weight, 'text-transform' => $this->style_texto_endereco_text_transform) ) ), $this->item_endereco);
               endif;
          }
          
          
          protected function ItemIcone($icone, $texto)
          {
               if (!empty($texto)) :
                    
                    $array[] = '<div class="spw-imoveis-item">';
                    $array[] = $this->Icone($icone);
                    $array[] = $this->Texto($texto);
                    $array[] = '</div>';
                    
                    return join('', $array);
                    
               endif;
          }
          
          
          
          protected function Icone($icone)
          {
               if (!empty($icone)) :
                    $img = \Spw\Componentes\Html\Funcoes::Tag('img', array( 'src' => $icone ), null);
                    return \Spw\Componentes\Html\Funcoes::Tag('div', array( 'class' => 'spw-imoveis-icone' ), $img);
               endif;
          }
          
          
          protected function Texto($texto)
          {
               if (!empty($texto)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('div', array( 'class' => 'spw-imoveis-texto', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('color' => $this->style_texto_itens_color, 'font-size' => $this->style_texto_itens_font_size, 'font-weight' => $this->style_texto_itens_font_weight, 'text-transform' => $this->style_texto_itens_text_transform) ) ), $texto);
               endif;
          }
          
          
          
          protected function Link()
          {
               if (!empty($this->link)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('a', array( 'href' => $this->link, 'class' => 'spw-imoveis-link' ), null);
               endif;
          }
          
          
          protected function Conteudo()
          {
               $array[] = $this->ItemReferencia();
               $array[] = $this->ItemTitulo();
               $array[] = $this->ItemEndereco();
               $array[] = $this->Itens();
               
               $itens = (!empty($array)) ? join('', $array) : null;
               
               return \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-imoveis-conteudo', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('font-family' => $this->style_font_family) )), $itens);
          }
          
          
          protected function Suite()
          {
               if (!empty($this->item_dormitorios_suite_numero)) :
                    
                    return ' + ' . $this->item_dormitorios_suite_numero;
                    
               endif;
          }
          
          
          protected function Itens()
          {
               $array[] = '<div class="spw-imoveis-itens">';
               $array[] = $this->ItemIcone($this->item_area_icone, $this->item_area_texto);
               $array[] = $this->ItemIcone($this->item_dormitorios_icone, $this->item_dormitorios_texto . $this->Suite());
               $array[] = $this->ItemIcone($this->item_banheiros_icone, $this->item_banheiros_texto);
               $array[] = $this->ItemIcone($this->item_garagens_icone, $this->item_garagens_texto);
               $array[] = '</div>';
               
               return join('', $array);
          }
          
          
          protected function Template()
          {
               $array[] = $this->Link();
               $array[] = $this->Foto();
               $array[] = $this->Conteudo();
               
               $conteudo = (!empty($array)) ? join('', $array) : null ;
               $this->view[] = \Spw\Componentes\Html\Funcoes::Tag('div', array( 'class' => 'spw-imoveis-bloco-do-imovel', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('background-color' => $this->style_background_color, 'border-color' => $this->style_border_color, 'border-radius' => $this->style_border_radius, 'box-shadow' => $this->style_box_shadow) ) ), $conteudo);
               
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          // 04
          public function Executar()
          {
               
               $this->Template();
               $this->Render();
               
          }
          
          
          
     }