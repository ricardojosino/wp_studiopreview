<?php

     namespace Seo\Componentes;
     
     class MetaBoxCamposSeo
     {
          
          
          
          static function Formulario()
          {
               include SPW_SEO_PATH . 'view/meta-box-form-seo.php';
          }
          
          
          
          static function ACFMetaBox()
          {
               
               if(function_exists("register_field_group"))
                    
               {
                    register_field_group(array (
                         'id' => 'acf_seo',
                         'title' => 'SEO',
                         'fields' => array (
                              array (
                                   'key' => 'field_5b56242af5ab3',
                                   'label' => 'Título',
                                   'name' => 'spw-seo-title',
                                   'type' => 'text',
                                   'default_value' => '',
                                   'placeholder' => '',
                                   'prepend' => '',
                                   'append' => '',
                                   'formatting' => 'none',
                                   'maxlength' => 70,
                              ),
                              array (
                                   'key' => 'field_5b56247ff5ab4',
                                   'label' => 'Descrição',
                                   'name' => 'spw-seo-description',
                                   'type' => 'textarea',
                                   'default_value' => '',
                                   'placeholder' => '',
                                   'maxlength' => 155,
                                   'rows' => 7,
                                   'formatting' => 'none',
                              ),
                              array (
                                   'key' => 'field_5b5624aef5ab5',
                                   'label' => 'Imagem para compartilhamento',
                                   'name' => 'spw-seo-image',
                                   'type' => 'image',
                                   'save_format' => 'url',
                                   'preview_size' => 'thumbnail',
                                   'library' => 'all',
                              ),
                         ),
                         'location' => array (
                              array (
                                   array (
                                        'param' => 'post_type',
                                        'operator' => '==',
                                        'value' => 'page',
                                        'order_no' => 100,
                                        'group_no' => 100,
                                   ),
                              ),
                              array (
                                   array (
                                        'param' => 'post_type',
                                        'operator' => '==',
                                        'value' => 'post',
                                        'order_no' => 100,
                                        'group_no' => 100,
                                   ),
                              ),
                              array (
                                   array (
                                        'param' => 'post_type',
                                        'operator' => '==',
                                        'value' => 'spw-catalogo',
                                        'order_no' => 100,
                                        'group_no' => 100,
                                   ),
                              ),
                              array (
                                   array (
                                        'param' => 'post_type',
                                        'operator' => '==',
                                        'value' => 'spw-servicos',
                                        'order_no' => 100,
                                        'group_no' => 100,
                                   ),
                              ),
                              
                              
                              array (
                                   array (
                                        'param' => 'post_type',
                                        'operator' => '==',
                                        'value' => 'spw-imoveis',
                                        'order_no' => 100,
                                        'group_no' => 100,
                                   ),
                              ),
                              
                              
                              array (
                                   array (
                                        'param' => 'post_type',
                                        'operator' => '==',
                                        'value' => 'spw-empreendimentos',
                                        'order_no' => 100,
                                        'group_no' => 100,
                                   ),
                              ),
                              
                         ),
                         'options' => array (
                              'position' => 'normal',
                              'layout' => 'default',
                              'hide_on_screen' => array (
                                   0 => 'custom_fields',
                                   1 => 'discussion',
                                   2 => 'revisions',
                                   3 => 'send-trackbacks',
                              ),
                         ),
                         'menu_order' => 100,
                         'position' => 'normal'
                    ));
               }

               
               
          }
          
          
          static function is_blog_page() 
          {

               global $post;

               $post_type = get_post_type($post);

               return ( ( is_home() || is_archive() || is_single() ) && ($post_type == 'post') ) ? true : false ;

          }
          
       
          
          static function Title()
          {
               $id = get_the_ID();
               $titulo = get_the_title();
               
               if (function_exists('get_field') and is_singular()) :
                    $titulo_alternativo = get_field('spw-seo-title', $id);
                         else :
                              $titulo_alternativo = null;
               endif;
               
               if (!empty($titulo_alternativo)) :
                    return $titulo_alternativo;
               
                         elseif( self::is_blog_page() ):
                              return 'Blog';
                         
                         elseif(is_archive()) :
                              return post_type_archive_title('', false);
               
                         else :
                              return $titulo;
               endif;
          }
          
          
          static function Description()
          {
               $id = get_the_ID();
               
               if (function_exists('get_field') and is_singular()) :
                    $descricao_alternativo = get_field('spw-seo-description', $id);
                         else :
                              $descricao_alternativo = null;
               endif;
               
               if (!empty($descricao_alternativo) and is_singular()) :
                    return $descricao_alternativo;
               
                         elseif(get_the_excerpt() and is_singular()) :
                              return get_the_excerpt();
                         
                         else :
                              return null;
               
               endif;
          }
          
          
          static function Image()
          {
               $id = get_the_ID();
               
               if (function_exists('get_field') and is_singular()) :
                    $image = get_field('spw-seo-image', $id);
               endif;
               
               if (!empty($image)) :
                    return $image;
               endif;
          }
          
          
          
          static function Metas()
          {
               
               
               if (!empty( self::Description() )) :
                    echo '<meta name="description" content="' . self::Description() . '">';
               endif;
               
               if (!empty( self::Title() )) :
                    echo '<meta property="og:title" content="' . self::Title() . '" />';
               endif;
               
               if (!empty( get_bloginfo('name') )) :
                    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />';
               endif;
               
               echo '<meta property="og:type" content="website">';
               
               if (!empty( get_permalink() )) :
                    echo '<meta property="og:url" content="' . get_permalink() . '" />';
               endif;
               
               if (!empty( self::Image() )) :
                    echo '<meta property="og:image" content="' . self::Image() . '" />';
               endif;
               
               if (!empty( self::Description() )) :
                    echo '<meta property="og:description" content="' . self::Description() . '" />';
               endif;
          }
          

          
          static function FilterTitle()
          {
               return self::Title();
          }
          
          
          
          static function Executar()
          {
               self::ACFMetaBox();
               add_action('wp_head', array(get_called_class(), 'Metas'));
               add_filter('pre_get_document_title', array(get_called_class(), 'FilterTitle'), 10);
               
          }
          
          
     }
