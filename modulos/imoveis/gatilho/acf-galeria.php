<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bbe41f366855',
               'title' => 'Galeria',
               'fields' => array(
                    array(
                         'key' => 'field_5bbe4201742b2',
                         'label' => 'Imagens do imóvel',
                         'name' => 'galeria',
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
                              'value' => 'spw-imoveis',
                         ),
                    ),
               ),
               'menu_order' => 100,
               'position' => 'normal',
               'style' => 'default',
               'label_placement' => 'top',
               'instruction_placement' => 'label',
               'hide_on_screen' => '',
               'active' => 1,
               'description' => '',
          ));

     endif;