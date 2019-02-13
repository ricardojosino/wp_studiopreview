<?php

     namespace Taxonomy\Componentes;
     
     class RegistrarTaxonomias
     {
          
          // 01
          
          protected $result;
          protected $row;
          
          
          // 02
          
          
          
          
          // 03
          
          protected function Dados()
          {
               
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('value', 1);
               $dados->Set_AdicionarQuery("select *");
               $dados->Set_AdicionarQuery("from spw_taxonomy as t");
               $dados->Set_AdicionarQuery("where t.lixeira = 'N'");
               $dados->Set_AdicionarQuery("order by t.taxonomy asc");
               $dados->Executar();
               
               $this->result = $dados->result;
               $this->row = $dados->rows;
               
          }
          
          
          
          protected function ACF_GrupoConfiguracao($id_taxonomy, $taxonomy)
          {
               if( function_exists('acf_add_local_field_group') ):

                    acf_add_local_field_group(array(
                         'key' => 'group_config_' . $taxonomy . '_' . $id_taxonomy,
                         'title' => 'Foto',
                         'fields' => array(

                              array(
                              'key' => 'field_ordem' . $taxonomy . '_' . $id_taxonomy,
                              'label' => 'Ordem de exibição',
                              'name' => 'ordem',
                              'type' => 'number',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array(
                                   'width' => '',
                                   'class' => '',
                                   'id' => '',
                              ),
                              'default_value' => '',
                              'placeholder' => '',
                              'prepend' => '',
                              'append' => '',
                              'min' => '',
                              'max' => '',
                              'step' => '',
                              ),

                              array(
                                   'key' => 'field_foto_' . $taxonomy . '_' . $id_taxonomy,
                                   'label' => 'Escolha uma foto',
                                   'name' => 'foto',
                                   'type' => 'image',
                                   'instructions' => '',
                                   'required' => 0,
                                   'conditional_logic' => 0,
                                   'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                   ),
                                   'return_format' => 'url',
                                   'preview_size' => 'medium',
                                   'library' => 'all',
                                   'min_width' => '',
                                   'min_height' => '',
                                   'min_size' => '',
                                   'max_width' => '',
                                   'max_height' => '',
                                   'max_size' => '',
                                   'mime_types' => '',
                              ),
                         ),
                         'location' => array(
                              array(
                                   array(
                                        'param' => 'taxonomy',
                                        'operator' => '==',
                                        'value' => $taxonomy,
                                   ),
                              ),
                         ),
                         'menu_order' => 1,
                         'position' => 'normal',
                         'style' => 'default',
                         'label_placement' => 'top',
                         'instruction_placement' => 'label',
                         'hide_on_screen' => '',
                         'active' => 1,
                         'description' => '',
                    ));

               endif;

          }
          
          
          
          public function Registrar()
          {
               
               if ( !empty($this->row) ) :
                    
                    do {
                    
                         $registrar = new \Spw\Componentes\Wp\Taxonomia();
                         $registrar->Set_PostType( $this->row['post_type'] );
                         $registrar->Set_Taxonomia( $this->row['taxonomy'] );
                         $registrar->Set_AtivarHierarquia( $this->row['hierarchical'] );
                         $registrar->Set_AtivarQueryVar( $this->row['query_var'] );
                         $registrar->Set_Rewrite( $this->row['rewrite'] );
                         $registrar->Set_Slug( $this->row['slug'] );
                         $registrar->Set_ExibirNoMenuDashboard( $this->row['show_ui'] );
                         $registrar->Set_ExibirNoMenuDoSite( $this->row['show_in_nav_menus'] );
                         $registrar->Set_ExibirNaColunaAdmin( $this->row['show_admin_column'] );
                         $registrar->Set_ExibirNuvemDeTags( $this->row['show_tag_cloud'] );
                         $registrar->Set_ExibirNaNuvemDeTags( $this->row['show_in_tag_cloud'] );
                         $registrar->Set_MetaBox( $this->row['meta_box_cb'] );
                         $registrar->Set_Labels_Nome( $this->row['labels_name'] );
                         $registrar->Set_Labels_NomeDoMenu($this->row['labels_menu_name']);
                         $registrar->Set_Labels_NomeSingular($this->row['labels_singular_name']);
                         $registrar->Set_Labels_AdicionarNovo($this->row['labels_add_new']);
                         $registrar->Set_Labels_AdicionarNovoItem('Inserir categoria');
                         $registrar->Set_Labels_EditarItem($this->row['labels_edit_item']);
                         $registrar->Set_Labels_VisualizarItem($this->row['labels_view_item']);
                         $registrar->Set_Labels_PesquisarItem($this->row['labels_search_items']);
                         $registrar->Set_Labels_NaoAchamos($this->row['labels_not_found']);
                         $registrar->Executar();
                         
                         $this->ACF_GrupoConfiguracao($this->row['id_taxonomy'], $this->row['taxonomy']);
                    
                    } while($this->row = mysqli_fetch_assoc($this->result));

               endif;
          }
          
          
          
          // 04
          public function Executar()
          {
               $this->Dados();
               $this->Registrar();
          }
          
          
          
     }
