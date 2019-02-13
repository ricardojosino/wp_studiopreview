<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bfbfd45466',
               'title' => 'Planta',
               'fields' => array(
                    
                    
                    array (
                         'key' => 'field_planta_titulo',
                         'label' => 'Título de exibição do bloco da planta',
                         'name' => 'planta_titulo_de_exibicao',
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
                         'key' => 'field_5bfbfdf0b3cea',
                         'label' => 'Imagens da planta',
                         'name' => 'imagens_da_planta',
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
               'menu_order' => 3,
               'position' => 'normal',
               'style' => 'default',
               'label_placement' => 'top',
               'instruction_placement' => 'label',
               'hide_on_screen' => '',
               'active' => 1,
               'description' => '',
          ));

     endif;