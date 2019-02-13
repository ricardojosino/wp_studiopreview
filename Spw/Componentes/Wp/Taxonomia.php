<?php

     namespace Spw\Componentes\Wp;
     
     class Taxonomia
     
     {
          
          //01
          
          public $post_type;
          public $taxonomia;
          
          public $hierarchical;
          public $show_ui;
          public $show_in_tag_cloud;
          public $show_tagcloud;
          public $show_in_nav_menus;
          public $show_admin_column;
          public $query_var;
          public $rewrite;
          public $slug;
          public $meta_box_cb = false;
          
          public $labels_name;
          public $labels_menu_name;
          public $labels_update_item;
          public $labels_add_new_item;
          public $labels_singular_name;
          public $labels_add_new;
          public $labels_edit_item;
          public $labels_new_item;
          public $labels_view_item;
          public $labels_search_items;
          public $labels_not_found;
          
          
          
          //02
          
          public function Set_PostType($value)
          {
               $this->post_type = $value;
          }
          
          
          public function Set_Taxonomia($value)
          {
               $this->taxonomia = $value;
          }
          
          
          public function Set_AtivarHierarquia($value)
          {
               $this->hierarchical = $value;
          }
          
          
          public function Set_ExibirNoMenuDashboard($value)
          {
               $this->show_ui = $value;
          }
          
          
          public function Set_ExibirNaNuvemDeTags($value)
          {
               $this->show_in_tag_cloud = $value;
          }
          
          
          public function Set_ExibirNuvemDeTags($value)
          {
               $this->show_tagcloud = $value;
          }
          
          
          public function Set_ExibirNaColunaAdmin($value)
          {
               $this->show_admin_column = $value;
          }
          
          
          public function Set_AtivarQueryVar($value)
          {
               $this->query_var = $value;
          }
          
          
          public function Set_Rewrite($value)
          {
               $this->rewrite = $value;
          }
          
          public function Set_Slug($value)
          {
               $this->slug = $value;
          }
          
          
          public function Set_ExibirNoMenuDoSite($value)
          {
               $this->show_in_nav_menus = $value;
          }
          
          
          public function Set_MetaBox($value = false)
          {
               $this->meta_box_cb = $value;
          }
          
          
          
          public function Set_Labels_Nome($value)
          {
               $this->labels_name = $value;
          }
          
          public function Set_Labels_NomeDoMenu($value)
          {
               $this->labels_menu_name = $value;
          }
          
          
          public function Set_Labels_NomeSingular($value)
          {
               $this->labels_singular_name = $value;
          }
          
          
          public function Set_Labels_AtualizarItem($value)
          {
               $this->labels_update_item = $value;
          }
          
          
          public function Set_Labels_AdicionarNovoItem($value)
          {
               $this->labels_add_new_item = $value;
          }
          
          
          public function Set_Labels_AdicionarNovo($value)
          {
               $this->labels_add_new = $value;
          }
          
          
          public function Set_Labels_EditarItem($value)
          {
               $this->labels_edit_item = $value;
          }
          
          
          public function Set_Labels_NovoItem($value)
          {
               $this->labels_new_item = $value;
          }
          
          
          public function Set_Labels_VisualizarItem($value)
          {
               $this->labels_view_item = $value;
          }
          
          
          public function Set_Labels_PesquisarItem($value)
          {
               $this->labels_search_items = $value;
          }
          
          
          public function Set_Labels_NaoAchamos($value)
          {
               $this->labels_not_found = $value;
          }
          
          
          
          
          //03
          
          public function Converter($value)
          {
               if ($value == 'Y') :
                    return true;
               
                         elseif($value == 'N') :
                              return false;
               endif;
          }
          
          
          public function MetaBox($value)
          {
               if (!empty($value) and $value != 'N') :
                    return $value;
               
                         else :
                              return $this->Converter($value);
                    
               endif;
          }
          
          public function Labels()
          {
               ( !empty($this->labels_name) ) ? $label['name'] = $this->labels_name : null;
               ( !empty($this->labels_menu_name) ) ? $label['menu_name'] = $this->labels_menu_name : null;
               ( !empty($this->labels_update_item) ) ? $label['update_item'] = $this->labels_update_item : null;
               ( !empty($this->labels_add_new_item) ) ? $label['add_new_item'] = $this->labels_add_new_item : null;
               ( !empty($this->labels_singular_name) ) ? $label['singular_name'] = $this->labels_singular_name : null;
               ( !empty($this->labels_add_new) ) ? $label['add_new'] = $this->labels_add_new : null;
               ( !empty($this->labels_edit_item) ) ? $label['edit_item'] = $this->labels_edit_item : null;
               ( !empty($this->labels_new_item) ) ? $label['edit_item'] = $this->labels_new_item : null;
               ( !empty($this->labels_view_item) ) ? $label['view_item'] = $this->labels_view_item : null;
               ( !empty($this->labels_search_items) ) ? $label['search_items'] = $this->labels_search_items : null;
               ( !empty($this->labels_not_found) ) ? $label['not_found'] = $this->labels_not_found : null;
               
               if (!empty($label)) :
                    return $label;
               endif;
          }
          
          public function Arqumentos()
          {
               ( !empty($this->Labels()) ) ? $arqs['labels'] = $this->Labels() : null;
               ( !empty($this->hierarchical) ) ? $arqs['hierarchical'] = $this->Converter($this->hierarchical) : null;
               ( !empty($this->show_ui) ) ? $arqs['show_ui'] = $this->Converter($this->show_ui) : null;
               ( !empty($this->show_in_tag_cloud) ) ? $arqs['show_in_tag_cloud'] = $this->Converter($this->show_in_tag_cloud) : null;
               ( !empty($this->query_var) ) ? $arqs['query_var'] = $this->Converter($this->query_var) : null;
               ( $this->rewrite == 'Y' ) ? $arqs['rewrite'] = array('slug' => $this->slug) : $arqs['rewrite'] = $this->Converter($this->rewrite);
               ( !empty($this->show_in_nav_menus) ) ? $arqs['show_in_nav_menus'] = $this->Converter($this->show_in_nav_menus) : null;
               ( !empty($this->show_tagcloud) ) ? $arqs['show_tagcloud'] = $this->Converter($this->show_tagcloud) : null;
               ( !empty($this->show_admin_column) ) ? $arqs['show_admin_column'] = $this->Converter($this->show_admin_column) : null;
               ( !empty($this->meta_box_cb) ) ? $arqs['meta_box_cb'] = $this->MetaBox($this->meta_box_cb) : $arqs['meta_box_cb'] = false;
               $arqs['public'] = true;
               $arqs['publicly_queryable'] = true;
               //$arqs['show_in_quick_edit'] = true;
               
               if ( !empty($arqs) ) :
                    return $arqs;
               endif;
          }
          
          
          public function Registrar()
          {
               
               if (!empty($this->taxonomia) and !empty($this->post_type)) :
                    register_taxonomy($this->taxonomia, $this->post_type, $this->Arqumentos() );
               endif;
          }
          
          
          
          
          //04
          public function Executar()
          {
               if (!empty($this->taxonomia) and !empty($this->post_type)) :
                    add_action('init', array($this, 'Registrar'), 0);
               endif;
          }
          
          
     }