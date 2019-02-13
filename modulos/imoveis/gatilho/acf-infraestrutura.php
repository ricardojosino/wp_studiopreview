<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bbe340971eb3',
               'title' => 'Infraestrutura',
               'fields' => array(
                    array(
                         'key' => 'field_5bbesr41b63ecb',
                         'label' => '',
                         'name' => 'infraestrutura',
                         'type' => 'repeater',
                         'instructions' => 'Exemplo: Central de Gás',
                         'required' => 0,
                         'conditional_logic' => 0,
                         'wrapper' => array(
                              'width' => '',
                              'class' => '',
                              'id' => '',
                         ),
                         'collapsed' => '',
                         'min' => 0,
                         'max' => 0,
                         'layout' => 'table',
                         'button_label' => 'Inserir Infraestrutura',
                         'sub_fields' => array(
                              array(
                                   'key' => 'field_5bbe344063ecc',
                                   'label' => 'Título',
                                   'name' => 'titulo',
                                   'type' => 'text',
                                   'instructions' => '',
                                   'required' => 0,
                                   'conditional_logic' => 0,
                                   'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                   ),
                                   'default_value' => '',
                                   'placeholder' => 'Exemplo: Piscina Coletiva',
                                   'prepend' => '',
                                   'append' => '',
                                   'maxlength' => '',
                              ),
                         ),
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
               'menu_order' => 4,
               'position' => 'normal',
               'style' => 'default',
               'label_placement' => 'top',
               'instruction_placement' => 'label',
               'hide_on_screen' => '',
               'active' => 1,
               'description' => '',
          ));

     endif;