<?php

if( function_exists('acf_add_local_field_group') ):

     acf_add_local_field_group(array(
          'key' => 'group_5bfbfe8abe2d4',
          'title' => 'Incorporar',
          'fields' => array(
               
               array (
                         'key' => 'field_tour_virtual_titulo',
                         'label' => 'Título de exibição do bloco Tour Virtual',
                         'name' => 'tour_virtual_titulo_de_exibicao',
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
                    'key' => 'field_5bfbfe9800a0c',
                    'label' => 'Tour Virtual',
                    'name' => 'tour_virtual',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                         'width' => '',
                         'class' => '',
                         'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'Cole o código para incorporar o objeto do tour virtual',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
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