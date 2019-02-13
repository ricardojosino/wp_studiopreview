<?php

     namespace Imoveis\Componentes;
     
     class ListarImoveis
     {
          
          
          // 01
          
          protected $instance;
          
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
          
          public $view;
          public $render;
          
          // 02
          
          public function Set_Instance($instance)
          {
               $this->instance = $instance;
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
          
          public function DadosCategorias()
          {
               if (!empty($this->instance['filtro_categorias'])) :
               
                    return array(

                         'taxonomy' => 'spw-imoveis-categoria',
                         'field' => 'term_id',
                         'terms' => $this->instance['filtro_categorias'],

                    );
               
               
                    elseif( isset($_GET['categoria']) and !empty($_GET['categoria']) ) :
                         
                         return array(

                              'taxonomy' => 'spw-imoveis-categoria',
                              'field' => 'term_id',
                              'terms' => $_GET['categoria'],

                         );
                    
                    
                    elseif(isset($_SESSION['categoria']) and !empty($_SESSION['categoria'])) :
                         return array(

                              'taxonomy' => 'spw-imoveis-categoria',
                              'field' => 'term_id',
                              'terms' => $_SESSION['categoria'],
                              
                         );
               
                         else :
                              return false;
               
               endif;
          }
          
          
          public function DadosNegocios()
          {
               if (!empty($this->instance['filtro_negocios'])) :
                    
                    return array(
                    
                    'taxonomy' => 'spw-imoveis-negocio',
                    'field' => 'term_id',
                    'terms' => $this->instance['filtro_negocios'],
                    
                    );
               
                    elseif(isset($_GET['negocio']) and !empty($_GET['negocio'])) :
                         
                         return array(
                              
                              'taxonomy' => 'spw-imoveis-negocio',
                              'field' => 'term_id',
                              'terms' => $_GET['negocio']
                         );
                    
                    
                    elseif(isset($_SESSION['negocio']) and !empty($_SESSION['negocio'])) :
                         return array(

                              'taxonomy' => 'spw-imoveis-negocio',
                              'field' => 'term_id',
                              'terms' => $_SESSION['negocio'],
                              
                         );
               
                    else :
                         return false;
                    
               endif;
          }
          
          
          public function DadosFinalidade()
          {
               if (!empty($this->instance['filtro_finalidade'])) :
                    
                    return array(
                    
                    'taxonomy' => 'spw-imoveis-finalidade',
                    'field' => 'term_id',
                    'terms' => $this->instance['filtro_finalidade'],
                    
                    );
               
                    elseif(isset($_GET['finalidade']) and !empty($_GET['finalidade'])) :
                         
                         return array(
                    
                         'taxonomy' => 'spw-imoveis-finalidade',
                         'field' => 'term_id',
                         'terms' => $_GET['finalidade'],

                         );
                    
                    elseif(isset($_SESSION['finalidade']) and !empty($_SESSION['finalidade'])) :
                         return array(

                              'taxonomy' => 'spw-imoveis-finalidade',
                              'field' => 'term_id',
                              'terms' => $_SESSION['finalidade'],
                              
                         );
                    
                    
               
                    else :
                         return false;
                    
               endif;
          }
          
          
          public function DadosDestaque()
          {
               if (!empty($this->instance['filtro_destaque'])) :
                    
                    return array(
                    
                    'taxonomy' => 'spw-imoveis-destaque',
                    'field' => 'term_id',
                    'terms' => $this->instance['filtro_destaque'],
                    
                    );
               
                    else :
                         return false;
                    
               endif;
          }
          
          
          public function Classificacao()
          {
               if (!empty($this->instance['filtro_classificacao'])) :
                    return $this->instance['filtro_classificacao'];
               
                         else :
                              return false;
               endif;
          }
          
                
          
          public function Ordem()
          {
               if (!empty($this->instance['filtro_ordem'])) :
                    return $this->instance['filtro_ordem'];
               
                         else :
                              return 'ASC';
               endif;
          }
          
          
          public function Showposts()
          {
               if (!empty($this->instance['filtro_showposts'])) :
                    return $this->instance['filtro_showposts'];
               
                         else :
                              return false;
               endif;
          }
          
          
          public function MetaQuery_Referencia()
          {
               
               if (isset($_GET['referencia']) and !empty($_GET['referencia'])) :
               
                    return array(

                         'key' => 'codigo_de_referencia',
                         'value' => $_GET['referencia'],
                         'compare' => 'AND'
                    );
               
               elseif(isset($_SESSION['referencia']) and !empty($_SESSION['referencia'])) :
                    return array(

                         'key' => 'codigo_de_referencia',
                         'value' => $_SESSION['referencia'],
                         'compare' => 'AND'
                    );
                    
               
               endif;
          }
          
          
          
          public function MetaQuery_Dormitorios()
          {
               
               if (isset($_GET['dormitorio']) and !empty($_GET['dormitorio'])) :
               
                    return array(

                         'key' => 'quantidade_de_dormitorios',
                         'value' => $_GET['dormitorio'],
                         'type' => 'numeric',
                         'compare' => 'AND',
                         
                    );
               
               elseif(isset($_SESSION['dormitorio']) and !empty($_SESSION['dormitorio'])) :
                    
                    return array(

                         'key' => 'quantidade_de_dormitorios',
                         'value' => $_SESSION['dormitorio'],
                         'type' => 'numeric',
                         'compare' => 'AND',
                         
                    );
                    
               
               endif;
          }
          
          
          public function MetaQuery_Suites()
          {
               
               if (isset($_GET['suite']) and !empty($_GET['suite'])) :
               
                    return array(

                         'key' => 'quantidade_de_suites',
                         'value' => $_GET['suite'],
                         'type' => 'numeric',
                         'compare' => 'AND',
                         
                    );
               
               elseif(isset($_SESSION['suite']) and !empty($_SESSION['suite'])) :
                    
                    return array(

                         'key' => 'quantidade_de_suites',
                         'value' => $_SESSION['suite'],
                         'type' => 'numeric',
                         'compare' => 'AND',
                         
                    );
               
               
               
               endif;
          }
          
          
          public function MetaQuery_Bwc()
          {
               
               if (isset($_GET['bwc']) and !empty($_GET['bwc'])) :
               
                    return array(

                         'key' => 'quantidade_de_bwc',
                         'value' => $_GET['bwc'],
                         'type' => 'numeric',
                         'compare' => 'AND',
                         
                    );
               
               elseif(isset($_SESSION['bwc']) and !empty($_GET['bwc'])) :
                    
                    return array(

                         'key' => 'quantidade_de_bwc',
                         'value' => $_SESSION['bwc'],
                         'type' => 'numeric',
                         'compare' => 'AND',
                         
                    );
               
               
               endif;
          }
          
          
          public function MetaQuery_Garagens()
          {
               
               if (isset($_GET['garagem']) and !empty($_GET['garagem'])) :
               
                    return array(

                         'key' => 'quantidade_de_garagens',
                         'value' => $_GET['garagem'],
                         'type' => 'numeric',
                         'compare' => 'AND',
                         
                    );
               
               
               elseif( isset($_SESSION['garagem']) and !empty($_SESSION['garagem']) ) :
               
                    return array(

                         'key' => 'quantidade_de_garagens',
                         'value' => $_SESSION['garagem'],
                         'type' => 'numeric',
                         'compare' => 'AND',
                         
                    );
               
               endif;
          }
          
          
          public function MetaQuery_Area()
          {
               
               if (isset($_GET['area']) and !empty($_GET['area'])) :
               
                    return array(

                         'key' => 'area',
                         'value' => $_GET['area'],
                         'type' => 'numeric',
                         'compare' => '<=',
                         
                    );
               
               elseif( isset($_SESSION['area']) and !empty($_SESSION['area']) ) :
                    
                    return array(

                         'key' => 'area',
                         'value' => $_SESSION['area'],
                         'type' => 'numeric',
                         'compare' => '<=',
                         
                    );
               
               endif;
          }
          
          
          public function MetaQuery_Valor()
          {
               
               if (isset($_GET['valor']) and !empty($_GET['valor'])) :
               
                    return array(

                         'valor' => array(
                              
                              'key' => 'valor_do_imovel',
                              'value' => $_GET['valor'],
                              'type' => 'numeric',
                              'compare' => '<=',
                              
                         ),
                         
                    );
               
               
               elseif( isset($_SESSION['valor']) and !empty($_SESSION['valor']) ) :
                    
                    return array(

                         'valor' => array(
                              
                              'key' => 'valor_do_imovel',
                              'value' => $_SESSION['valor'],
                              'type' => 'numeric',
                              'compare' => '<=',
                              
                         ),
                         
                    );
               
               
               endif;
          }
          
          
          
          public function MetaQuery_Cidade()
          {
               
               if (isset($_GET['cidade']) and !empty($_GET['cidade'])) :
               
                    return array(

                         'key' => 'cidade',
                         'value' => $_GET['cidade'],
                         'type' => 'char',
                         'compare' => '=',
                    );
               
               
               elseif( isset($_SESSION['cidade']) and !empty($_SESSION['cidade']) ) :
                    
                    return array(

                         'key' => 'cidade',
                         'value' => $_SESSION['cidade'],
                         'type' => 'char',
                         'compare' => '=',
                    );
               
               endif;
          }
          
          
          public function MetaQuery_Bairro()
          {
               
               if (isset($_GET['bairro']) and !empty($_GET['bairro'])) :
               
                    return array(

                         'key' => 'bairro',
                         'value' => $_GET['bairro'],
                         'type' => 'char',
                         'compare' => '=',
                    );
               
               
               elseif( isset($_SESSION['bairro']) and !empty($_SESSION['bairro']) ) :
                    
                    return array(

                         'key' => 'bairro',
                         'value' => $_SESSION['bairro'],
                         'type' => 'char',
                         'compare' => '=',
                    );
               
               endif;
          }
          
          
          public function MetaQuery()
          {
               return array(
                    
                    $this->MetaQuery_Referencia(),
                    $this->MetaQuery_Dormitorios(),
                    $this->MetaQuery_Suites(),
                    $this->MetaQuery_Bwc(),
                    $this->MetaQuery_Garagens(),
                    $this->MetaQuery_Area(),
                    $this->MetaQuery_Valor(),
                    $this->MetaQuery_Cidade(),
                    $this->MetaQuery_Bairro(),
                    
               );
          }
          
          
          public function Dados()
          {
               
               $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
               
               $arqs['post_type'] = 'spw-imoveis';
               $arqs['tax_query'] = array( 'relation' => 'AND', $this->DadosCategorias(), $this->DadosNegocios(), $this->DadosFinalidade(), $this->DadosDestaque() );
               $arqs['orderby'] = $this->Classificacao();
               $arqs['order'] = $this->Ordem();
               $arqs['meta_query'] = $this->MetaQuery();
               $arqs['paged'] = $paged;
               $arqs['showposts'] = $this->Showposts();
               
               return new \WP_Query($arqs);
               
          }
          
          
          
          
          public function Paginacao($max_num_pages)
          {
               
               if ($max_num_pages > 1 and $this->instance['exibir_paginacao'] == 'Y') :
               
                    $big = 999999999;

                    $args = array(
                         'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                         'format'             => '?paged=%#%',
                         'current'            => max( 1, get_query_var('paged') ),
                         'total'              => $max_num_pages,
                         'show_all'           => false,
                         'end_size'           => 1,
                         'mid_size'           => 2,
                         'prev_next'          => true,
                         'prev_text'          => 'Voltar',
                         'next_text'          => 'Próximo',
                         'type'               => 'plain',
                         'add_args'           => false,
                         'add_fragment'       => '',
                         'before_page_number' => '',
                         'after_page_number'  => ''
                    );


                    return \Spw\Componentes\Html\Funcoes::Tag('nav', array('class' => 'spw-ui-componentes-paginacao', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('font-family' => $this->style_font_family) )), paginate_links($args));

               endif;
               
          }
          
          
          public function Endereco( $bairro, $cidade, $estado )
          {
               
               if (!empty($bairro) and !empty($cidade)) :
               
                    $array[] = (!empty($bairro)) ? $bairro . ', ' : null ;
                    $array[] = (!empty($cidade)) ? $cidade : null;
                    $array[] = (!empty($estado)) ? ' - ' . $estado : null;

                    if (!empty($array)) :
                         return join(' ', $array);
                    endif;
               
               endif;
          }
          
          
          public function Listar()
          {
               
               
               $dados = $this->Dados();
               
               $this->view[] = '<div class="spw-imoveis-listar-blocos-de-imoveis">';
               
               if ($dados->have_posts()) :
                    
                    while($dados->have_posts()) :
                         $dados->the_post();
                    
                         $imovel = new \Imoveis\Componentes\BlocoDoImovel();
                         $imovel->Set_Link( $dados->post->guid );
                         $imovel->Set_Imagem( wp_get_attachment_url( get_post_thumbnail_id( $dados->post->ID ) ) );
                         $imovel->Set_Item_Referencia('REF:', get_field('codigo_de_referencia', $dados->post->ID) );
                         $imovel->Set_Item_Titulo( $dados->post->post_title );
                         $imovel->Set_Item_Endereco( $this->Endereco( get_field('bairro', $dados->post->ID) , get_field('cidade', $dados->post->ID), get_field('estado', $dados->post->ID)) );
                         $imovel->Set_Item_Area( \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'areas.png') , get_field('area', $dados->post->ID));
                         $imovel->Set_Item_Dormitorio( \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'suites.png') , get_field('quantidade_de_dormitorios', $dados->post->ID), get_field('quantidade_de_suites', $dados->post->ID));
                         $imovel->Set_Item_Banheiro( \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'banheiros.png') , get_field('quantidade_de_bwc', $dados->post->ID));
                         $imovel->Set_Item_Garagem( \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'garagens.png') , get_field('quantidade_de_garagens', $dados->post->ID));
                         $imovel->Set_Style_FontFamily($this->style_font_family);
                         $imovel->Set_Style_BorderColor($this->style_border_color);
                         $imovel->Set_Style_BorderRadius($this->style_border_radius);
                         $imovel->Set_Style_BackgroundColor($this->style_background_color);
                         $imovel->Set_Style_BoxShadow($this->style_box_shadow);
                         $imovel->Set_Style_TextoReferencia_Color($this->style_texto_referencia_color);
                         $imovel->Set_Style_TextoReferencia_FontSize($this->style_texto_referencia_font_size);
                         $imovel->Set_Style_TextoReferencia_FontWeight($this->style_texto_referencia_font_weight);
                         $imovel->Set_Style_TextoReferencia_TextTransform($this->style_texto_referencia_text_transform);
                         $imovel->Set_Style_TextoTitulo_Color($this->style_texto_titulo_color);
                         $imovel->Set_Style_TextoTitulo_FontSize($this->style_texto_titulo_font_size);
                         $imovel->Set_Style_TextoTitulo_FontWeight($this->style_texto_titulo_font_weight);
                         $imovel->Set_Style_TextoTitulo_TextTransform($this->style_texto_titulo_text_transform);
                         $imovel->Set_Style_TextoEndereco_Color($this->style_texto_endereco_color);
                         $imovel->Set_Style_TextoEndereco_FontSize($this->style_texto_endereco_font_size);
                         $imovel->Set_Style_TextoEndereco_FontWeight($this->style_texto_endereco_font_weight);
                         $imovel->Set_Style_TextoEndereco_TextTransform($this->style_texto_endereco_text_transform);
                         $imovel->Set_Style_TextoItens_Color($this->style_texto_itens_color);
                         $imovel->Set_Style_TextoItens_FontSize($this->style_texto_itens_font_size);
                         $imovel->Set_Style_TextoItens_FontWeight($this->style_texto_itens_font_weight);
                         $imovel->Set_Style_TextoItens_TextTransform($this->style_texto_itens_text_transform);
                         $imovel->Executar();
                         
                         $this->view[] = $imovel->render;
                         
                    
                    endwhile;
                         
                    
                         else :
                              $this->view[] = \Spw\Componentes\Html\Funcoes::Tag('p', array( 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('font-family' => $this->style_font_family)) ), 'Nenhum registro encontrado.');
                    
                    
                    
               endif;
               
               $this->view[] = '</div>';
               $this->view[] = $this->Paginacao($dados->max_num_pages);
               
               wp_reset_postdata();
               
               
          }
          
          public function Template()
          {
               $this->Listar();
          }
          
      
          public function Render()
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