<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5c0198228a9c6',
               'title' => 'Foto',
               'fields' => array(
                    
                    array(
                    'key' => 'field_5c019fc7ed1fb',
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
                         'key' => 'field_5c019831909cf',
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
                         'mime_types' => 'png, jpg, jpeg',
                    ),
               ),
               'location' => array(
                    array(
                         array(
                              'param' => 'taxonomy',
                              'operator' => '==',
                              'value' => 'spw-produtos-categoria',
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