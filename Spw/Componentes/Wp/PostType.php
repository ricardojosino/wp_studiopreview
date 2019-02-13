<?php

     namespace Spw\Componentes\Wp;
     
     class PostType
     {
          
          //01
          public $post_type;
          public $public = 'Y'; // Controla como o tipo é visível para os autores (show_in_nav_menus, show_ui) e leitores (exclude_from_search, publicly_queryable).
          public $publicly_queryable = 'Y'; // Se as consultas podem ser realizadas no front end como parte de parse_request ().
          public $show_ui = 'Y'; // Se deve gerar uma interface do usuário padrão para gerenciar esse tipo de postagem no admin.
          public $show_in_menu = 'Y'; // Onde mostrar o tipo de postagem no menu do administrador. show_ui deve ser verdadeiro.
          public $show_in_nav_menus = 'Y'; // Se post_type está disponível para seleção nos menus de navegação.
          public $show_in_admin_bar = 'Y'; // Seja para disponibilizar esse tipo de postagem na barra de administração do WordPress.
          public $menu_position = 5; // A posição no menu ordenar o tipo de postagem deve aparecer.
          public $menu_icon; // A URL para o ícone a ser usado para este menu ou o nome do ícone do iconfont
          public $capability_type = 'post'; // Tipo de estrutura de conteúdo. post, page
          public $hierarchical = 'N'; // Se o tipo de postagem é hierárquico (por exemplo, página). Permite que o pai seja especificado. O parâmetro 'supports' deve conter 'page-attributes' para mostrar a caixa de seleção pai na página do editor. Padrão: falso
          public $has_archive = 'Y'; // Define se é do tipo archive
          public $rewrite = 'Y'; // Aciona o processamento de reescritas para esse tipo de postagem. Para evitar reescritas, defina como falso.
          public $rewrite_slug; // Aciona o processamento de reescritas para esse tipo de postagem. Para evitar reescritas, defina como falso.
          public $query_var = 'Y'; // Fica disponivel na query principal.
           
          public $labels_name; //nome geral para o tipo de postagem, geralmente plural.
          public $labels_singular_name; //nome para um objeto deste tipo de postagem.
          public $labels_add_new; //o adicionar novo texto. O padrão é "Adicionar novo" 
          public $labels_add_new_item;
          public $labels_edit_item;
          public $labels_new_item;
          public $labels_view_item;
          public $labels_view_items; //Rótulo para visualizar arquivos do tipo post.
          public $labels_search_items;
          public $labels_not_found;
          public $labels_not_found_in_trash;
          public $labels_parent_item_colon;
          public $labels_all_items; // Para submenu
          public $labels_archives; //Sequência para uso com arquivos nos menus de navegação. O padrão é Post Archives / Page Archives.
          public $labels_attributes; //Rótulo para a caixa meta de atributos. O padrão é 'Post Attributes' / 'Page Attributes'.
          public $labels_insert_into_item; // String para o botão do quadro de mídia. O padrão é Inserir no post / Inserir na página.
          public $labels_uploaded_to_this_item; // String para o filtro de quadro de mídia. O padrão é enviado para esta postagem / Enviado para esta página.
          public $labels_featured_image; // O padrão é a Imagem em destaque.
          public $labels_set_featured_image; // O padrão é Definir imagem em destaque.
          public $labels_remove_featured_image; // O padrão é Remover imagem em destaque.
          public $labels_use_featured_image; // O padrão é Usar como imagem em destaque
          public $labels_menu_name; // O padrão é o mesmo que o `nome`.
          public $labels_filter_items_list; // String para a tabela exibe o cabeçalho oculto.
          public $labels_items_list_navigation; // String para o cabeçalho oculto da paginação da tabela.
          public $labels_items_list; // String para o cabeçalho oculto da tabela.
          public $labels_name_admin_bar; // Cadeia de caracteres para uso em Novo na barra de menus do administrador. O padrão é o mesmo que 'singular_name'
          
          public $supports_title;
          public $supports_editor;
          public $supports_author;
          public $supports_thumbnail;
          public $supports_excerpt;
          public $supports_trackbacks;
          public $supports_custom_fields;
          public $supports_comments;
          public $supports_revisions;
          public $supports_page_attributes;
          public $supports_post_formats;
          
          
          
          //02
          
          public function Set_post_type($value)
          {
               $this->post_type = $value;
          }
          
          
          public function Set_public($value)
          {
               $this->public = $value;
          }
          
          
          public function Set_publicly_queryable($value)
          {
               $this->publicly_queryable = $value;
          }
          
          
          public function Set_show_ui($value)
          {
               $this->show_ui = $value;
          }
          
          
          public function Set_show_in_menu($value)
          {
               $this->show_in_menu = $value;
          }
          
          
          public function Set_show_in_nav_menus($value)
          {
               $this->show_in_nav_menus = $value;
          }
          
          
          public function Set_show_in_admin_bar($value)
          {
               $this->show_in_admin_bar = $value;
          }
          
          
          public function Set_menu_position($value)
          {
               $this->menu_position = $value;
          }
          
          
          public function Set_menu_icon($value)
          {
               $this->menu_icon = $value;
          }
          
          
          public function Set_capability_type($value)
          {
               $this->capability_type = $value;
          }
          
          
          public function Set_hierarchical($value)
          {
               $this->hierarchical = $value;
          }
          
          
          public function Set_has_archive($value)
          {
               $this->has_archive = $value;
          }
          
          
          public function Set_rewrite($value)
          {
               $this->rewrite = $value;
          }
          
          public function Set_rewrite_slug($value)
          {
               $this->rewrite_slug = $value;
          }
          
          
          public function Set_query_var($value)
          {
               $this->query_var = $value;
          }
          
          
          public function Set_labels_name($value)
          {
               $this->labels_name = $value;
          }
          
          
          public function Set_labels_singular_name($value)
          {
               $this->labels_singular_name = $value;
          }
          
          
          public function Set_labels_add_new($value)
          {
               $this->labels_add_new = $value;
          }
          
          
          public function Set_labels_add_new_item($value)
          {
               $this->labels_add_new_item = $value;
          }
          
          
          public function Set_labels_edit_item($value)
          {
               $this->labels_edit_item = $value;
          }
          
          
          public function Set_labels_new_item($value)
          {
               $this->labels_new_item = $value;
          }
          
          
          public function Set_labels_view_item($value)
          {
               $this->labels_view_item = $value;
          }
          
          
          public function Set_labels_view_items($value)
          {
               $this->labels_view_items = $value;
          }
          
          
          public function Set_labels_search_items($value)
          {
               $this->labels_search_items = $value;
          }
          
          
          public function Set_labels_not_found($value)
          {
               $this->labels_not_found = $value;
          }
          
          
          public function Set_labels_not_found_in_trash($value)
          {
               $this->labels_not_found_in_trash = $value;
          }
          
          
          public function Set_labels_parent_item_colon($value)
          {
               $this->labels_parent_item_colon = $value;
          }
          
          
          public function Set_labels_all_items($value)
          {
               $this->labels_all_items = $value;
          }
          
          
          public function Set_labels_archives($value)
          {
               $this->labels_archives = $value;
          }
          
          
          public function Set_labels_attributes($value)
          {
               $this->labels_attributes = $value;
          }
          
          
          public function Set_labels_insert_into_item($value)
          {
               $this->labels_insert_into_item = $value;
          }
          
          
          public function Set_labels_uploaded_to_this_item($value)
          {
               $this->labels_uploaded_to_this_item = $value;
          }
          
          
          public function Set_labels_featured_image($value)
          {
               $this->labels_featured_image = $value;
          }
          
          
          public function Set_labels_set_featured_image($value)
          {
               $this->labels_set_featured_image = $value;
          }
          
          
          public function Set_labels_remove_featured_image($value)
          {
               $this->labels_remove_featured_image = $value;
          }
          
          
          public function Set_labels_use_featured_image($value)
          {
               $this->labels_use_featured_image = $value;
          }
          
          
          public function Set_labels_menu_name($value)
          {
               $this->labels_menu_name = $value;
          }
          
          
          public function Set_labels_filter_items_list($value)
          {
               $this->labels_filter_items_list = $value;
          }
          
          
          public function Set_labels_items_list_navigation($value)
          {
               $this->labels_items_list_navigation = $value;
          }
          
          
          public function Set_labels_items_list($value)
          {
               $this->labels_items_list = $value;
          }
          
          
          public function Set_labels_name_admin_bar($value)
          {
               $this->labels_name_admin_bar = $value;
          }
          
          
          public function Set_supports_title($value)
          {
               if ($value == 'Y') :
                    $this->supports_title = 'title';
               endif;
          }
          
          
          public function Set_supports_editor($value)
          {
               if ($value == 'Y') :
                    $this->supports_editor = 'editor';
               endif;
          }
          
          
          public function Set_supports_author($value)
          {
               if ($value == 'Y') :
                    $this->supports_author = 'author';
               endif;
          }
          
          
          public function Set_supports_thumbnail($value)
          {
               if ($value == 'Y') :
                    $this->supports_thumbnail = 'thumbnail';
               endif;
          }
          
          
          public function Set_supports_excerpt($value)
          {
               if ($value == 'Y') :
                    $this->supports_excerpt = 'excerpt';
               endif;
          }
          
          
          public function Set_supports_trackbacks($value)
          {
               if ($value == 'Y') :
                    $this->supports_trackbacks = 'trackbacks';
               endif;
          }
          
          
          public function Set_supports_custom_fields($value)
          {
               if ($value == 'Y') :
                    $this->supports_custom_fields = 'custom-fields';
               endif;
          }
          
          
          public function Set_supports_comments($value)
          {
               if ($value == 'Y') :
                    $this->supports_comments = 'comments';
               endif;
          }
          
          
          public function Set_supports_revisions($value)
          {
               if ($value == 'Y') :
                    $this->supports_revisions = 'revisions';
               endif;
          }
          
          
          public function Set_supports_page_attributes($value)
          {
               if ($value == 'Y') :
                    $this->supports_page_attributes = 'page-attributes';
               endif;
          }
          
          
          public function Set_supports_post_formats($value)
          {
               if ($value == 'Y') :
                    $this->supports_post_formats = 'post-formats';
               endif;
          }
          
          
          
          //03
          
          
          public function ConverterTrue($value)
          {
               if (strtoupper($value) == 'Y') :
                    return true;
               
                         else :
                              return 'N';
               endif;
          }
          
          public function Labels()
          {
              
               
               (!empty($this->labels_name)) ? $array['name'] = $this->labels_name : null;
               (!empty($this->labels_singular_name)) ? $array['singular_name'] = $this->labels_singular_name : null;
               (!empty($this->labels_menu_name)) ? $array['menu_name'] = $this->labels_menu_name : null;
               (!empty($this->labels_name_admin_bar)) ? $array['name_admin_bar'] = $this->labels_name_admin_bar : null;
               //(!empty($this->labels_archives)) ? $array['archives'] = $this->labels_archives : null;
               (!empty($this->labels_add_new)) ? $array['add_new'] = $this->labels_add_new : null;
               (!empty($this->labels_add_new_item)) ? $array['add_new_item'] = $this->labels_add_new_item : null;
               (!empty($this->labels_edit_item)) ? $array['edit_item'] = $this->labels_edit_item : null;
               (!empty($this->labels_new_item)) ? $array['new_item'] = $this->labels_new_item : null;
               (!empty($this->labels_view_item)) ? $array['view_item'] = $this->labels_view_item : null;
               (!empty($this->labels_view_items)) ? $array['view_items'] = $this->labels_view_items : null;
               (!empty($this->labels_search_items)) ? $array['search_items'] = $this->labels_search_items : null;
               (!empty($this->labels_not_found)) ? $array['not_found'] = $this->labels_not_found : null;
               (!empty($this->labels_not_found_in_trash)) ? $array['not_found_in_trash'] = $this->labels_not_found_in_trash : null;
               (!empty($this->labels_parent_item_colon)) ? $array['parent_item_colon'] = $this->labels_parent_item_colon : null;
               (!empty($this->labels_all_items)) ? $array['all_items'] = $this->labels_all_items : null;
               (!empty($this->labels_attributes)) ? $array['attributes'] = $this->labels_attributes : null;
               (!empty($this->labels_insert_into_item)) ? $array['insert_into_item'] = $this->labels_insert_into_item : null;
               (!empty($this->labels_uploaded_to_this_item)) ? $array['uploaded_to_this_item'] = $this->labels_uploaded_to_this_item : null;
               (!empty($this->labels_featured_image)) ? $array['featured_image'] = $this->labels_featured_image : null;
               (!empty($this->labels_set_featured_image)) ? $array['set_featured_image'] = $this->labels_set_featured_image : null;
               (!empty($this->labels_remove_featured_image)) ? $array['remove_featured_image'] = $this->labels_remove_featured_image : null;
               (!empty($this->labels_use_featured_image)) ? $array['use_featured_image'] = $this->labels_use_featured_image : null;
               (!empty($this->labels_filter_items_list)) ? $array['filter_items_list'] = $this->labels_filter_items_list : null;
               (!empty($this->labels_items_list_navigation)) ? $array['items_list_navigation'] = $this->labels_items_list_navigation : null;
               (!empty($this->labels_items_list)) ? $array['items_list'] = $this->labels_items_list : null;
               
               
               
               
               if (!empty($array)) :
                    return $array;
               endif;
               
               
          }
          
          
          public function Supports()
          {
               
               
               (!empty($this->supports_title)) ? $array[] = $this->supports_title : null;
               (!empty($this->supports_editor)) ? $array[] = $this->supports_editor : null;
               (!empty($this->supports_author)) ? $array[] = $this->supports_author : null;
               (!empty($this->supports_thumbnail)) ? $array[] = $this->supports_thumbnail : null;
               (!empty($this->supports_excerpt)) ? $array[] = $this->supports_excerpt : null;
               (!empty($this->supports_trackbacks)) ? $array[] = $this->supports_trackbacks : null;
               (!empty($this->supports_custom_fields)) ? $array[] = $this->supports_custom_fields : null;
               (!empty($this->supports_comments)) ? $array[] = $this->supports_comments : null;
               (!empty($this->supports_revisions)) ? $array[] = $this->supports_revisions : null;
               (!empty($this->supports_page_attributes)) ? $array[] = $this->supports_page_attributes : null;
               (!empty($this->supports_post_formats)) ? $array[] = $this->supports_post_formats : null;
               
               
               if (!empty($array)) :
                    return $array;
               endif;
               
               
          }
          
          
          public function RegisterPostType()
          {
               
               if (!empty($this->post_type)) :
               
                    $arqs['labels'] = $this->Labels();
                    $arqs['public'] = $this->ConverterTrue($this->public);
                    $arqs['publicly_queryable'] = $this->ConverterTrue($this->publicly_queryable);
                    $arqs['show_ui'] = $this->ConverterTrue($this->show_ui);
                    $arqs['show_in_menu'] = $this->ConverterTrue($this->show_in_menu);
                    $arqs['query_var'] = $this->ConverterTrue($this->query_var);
                    ( $this->rewrite == 'Y' ) ? $arqs['rewrite'] = array('slug' => $this->rewrite_slug) : $arqs['rewrite'] = $this->ConverterTrue($this->rewrite);
                    $arqs['capability_type'] = $this->capability_type;
                    $arqs['has_archive'] = $this->ConverterTrue($this->has_archive);
                    $arqs['hierarchical'] = $this->ConverterTrue($this->hierarchical);
                    $arqs['menu_position'] = $this->menu_position;
                    $arqs['supports'] = $this->Supports();
                    $arqs['_builtin'] = false;                    
                    //$arqs['exclude_from_search'] = true;
                    
               
                    register_post_type($this->post_type, $arqs);
               
               
               endif;
               
               
               
          }
          
          
          
          //04
          public function Executar()
          {
               add_action('init', array($this, 'RegisterPostType'), 0 );
          }
          
          
     }