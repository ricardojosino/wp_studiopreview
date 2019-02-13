<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bfbfd79bd718',
               'title' => 'Galeria',
               'fields' => array(
                    
                    array (
                         'key' => 'field_galeria_titulo',
                         'label' => 'Título de exibição do bloco da galeria',
                         'name' => 'galeria_titulo_de_exibicao',
                         'type' => 'text',
                         'prefix' => '',
                         'instructions' => '',
                         'required' => 0,
                         'conditional_logic' => 0,
                         'wrapper' => array (
                              'width' => '',
                              'class' => '',
                              'id' => '',
                         ),
                         'default_value' => '',
                         'placeholder' => '',
                         'prepend' => '',
                         'append' => '',
                         'maxlength' => '',
                         'readonly' => 0,
                         'disabled' => 0,
                    ),
                    
                    array(
                         'key' => 'field_5bfbfd80f9982',
                         'label' => 'Imagens do empreendimento',
                         'name' => 'imagens_do_empreendimento',
                         'type' => 'gallery',
                         'instructions' => '',
                         'required' => 0,
                         'conditional_logic' => 0,
                         'wrapper' => array(
                              'width' => '',
                              'class' => '',
                              'id' => '',
                         ),
                         'min' => '',
                         'max' => '',
                         'insert' => 'append',
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
                              'param' => 'post_type',
                              'operator' => '==',
                              'value' => 'spw-empreendimentos',
                         ),
                    ),
               ),
               'menu_order' => 2,
               'position' => 'normal',
               'style' => 'default',
               'label_placement' => 'top',
               'instruction_placement' => 'label',
               'hide_on_screen' => '',
               'active' => 1,
               'description' => '',
          ));

     endif;