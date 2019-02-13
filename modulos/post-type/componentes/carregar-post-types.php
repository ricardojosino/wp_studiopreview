<?php

     namespace PostType\Componentes;
     
     class CarregarPostTypes
     {
          
          
          //01
          
          protected $result;
          protected $rows;
          
          
          //02
          
          
          
          
          //03
          
          public function Dados()
          {
               
              $dados = new \Spw\Componentes\Mysql\Query();
              $dados->Set_Conectar();
              $dados->Set_Start('VALUE', 1);
              $dados->Set_AdicionarDadosSql('post-type', 'listar-post-types', null, null);
              $dados->Executar();
              
              $this->result = $dados->result;
              $this->rows = $dados->rows;
              
          }
          
          
          public function CarregarPostTypes()
          {
               if (!empty($this->rows)) :
                    
                    
                    do {
                    
                         $post_type = new \Spw\Componentes\Wp\PostType();
                         $post_type->Set_post_type($this->rows['post_type']);
                         $post_type->Set_public($this->rows['public']);
                         $post_type->Set_publicly_queryable($this->rows['publicly_queryable']);
                         $post_type->Set_show_ui($this->rows['show_ui']);
                         $post_type->Set_show_in_menu($this->rows['show_in_menu']);
                         $post_type->Set_show_in_nav_menus($this->rows['show_in_nav_menus']);
                         $post_type->Set_show_in_admin_bar($this->rows['show_in_admin_bar']);
                         $post_type->Set_menu_position($this->rows['menu_position']);
                         $post_type->Set_menu_icon($this->rows['menu_icon']);
                         $post_type->Set_capability_type($this->rows['capability_type']);
                         $post_type->Set_hierarchical($this->rows['hierarchical']);
                         $post_type->Set_has_archive($this->rows['has_archive']);
                         $post_type->Set_rewrite($this->rows['rewrite']);
                         $post_type->Set_rewrite_slug($this->rows['rewrite_slug']);
                         $post_type->Set_query_var($this->rows['query_var']);
                         $post_type->Set_labels_name($this->rows['labels_name']);
                         $post_type->Set_labels_singular_name($this->rows['labels_singular_name']);
                         $post_type->Set_labels_name_admin_bar($this->rows['labels_name_admin_bar']);
                         $post_type->Set_labels_menu_name($this->rows['labels_menu_name']);
                         $post_type->Set_labels_archives($this->rows['labels_archives']);
                         $post_type->Set_labels_add_new($this->rows['labels_add_new']);
                         $post_type->Set_labels_add_new_item($this->rows['labels_add_new_item']);
                         $post_type->Set_labels_edit_item($this->rows['labels_edit_item']);
                         $post_type->Set_labels_new_item($this->rows['labels_new_item']);
                         $post_type->Set_labels_view_item($this->rows['labels_view_item']);
                         $post_type->Set_labels_view_items($this->rows['labels_view_items']);
                         $post_type->Set_labels_search_items($this->rows['labels_search_items']);
                         $post_type->Set_labels_not_found($this->rows['labels_not_found']);
                         $post_type->Set_labels_not_found_in_trash($this->rows['labels_not_found_in_trash']);
                         $post_type->Set_labels_parent_item_colon($this->rows['labels_parent_item_colon']);
                         $post_type->Set_labels_all_items($this->rows['labels_all_items']);
                         $post_type->Set_labels_attributes($this->rows['labels_attributes']);
                         $post_type->Set_labels_insert_into_item($this->rows['labels_insert_into_item']);
                         $post_type->Set_labels_uploaded_to_this_item($this->rows['labels_uploaded_to_this_item']);
                         $post_type->Set_labels_featured_image($this->rows['labels_featured_image']);
                         $post_type->Set_labels_set_featured_image($this->rows['labels_set_featured_image']);
                         $post_type->Set_labels_remove_featured_image($this->rows['labels_remove_featured_image']);
                         $post_type->Set_labels_use_featured_image($this->rows['labels_use_featured_image']);
                         $post_type->Set_labels_filter_items_list($this->rows['labels_filter_items_list']);
                         $post_type->Set_labels_items_list_navigation($this->rows['labels_items_list_navigation']);
                         $post_type->Set_labels_items_list($this->rows['labels_items_list']);
                         $post_type->Set_supports_title($this->rows['supports_title']);
                         $post_type->Set_supports_editor($this->rows['supports_editor']);
                         $post_type->Set_supports_author($this->rows['supports_author']);
                         $post_type->Set_supports_thumbnail($this->rows['supports_thumbnail']);
                         $post_type->Set_supports_excerpt($this->rows['supports_excerpt']);
                         $post_type->Set_supports_trackbacks($this->rows['supports_trackbacks']);
                         $post_type->Set_supports_custom_fields($this->rows['supports_custom_fields']);
                         $post_type->Set_supports_comments($this->rows['supports_comments']);
                         $post_type->Set_supports_revisions($this->rows['supports_revisions']);
                         $post_type->Set_supports_page_attributes($this->rows['supports_page_attributes']);
                         $post_type->Set_supports_post_formats($this->rows['supports_post_formats']);
                         $post_type->Executar();
                    
                    } while($this->rows = mysqli_fetch_assoc($this->result));
                    
                    
                    
               endif;
          }
          
          
          
          
          //04
          public function Executar()
          {
               $this->Dados();
               $this->CarregarPostTypes();
          }
          
          
          
     }