<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bbe12bccf45f',
               'title' => 'Metragem',
               'fields' => array(
                    array(
                         'key' => 'field_5bbe12ce9d930',
                         'label' => '',
                         'name' => 'metragem',
                         'type' => 'repeater',
                         'instructions' => 'Exemplo: Área edificada: 139,00',
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
                         'button_label' => 'Inserir informação',
                         'sub_fields' => array(
                              array(
                                   'key' => 'field_5bbe13139d931',
                                   'label' => 'Título',
                                   'name' => 'titulo',
                                   'type' => 'text',
                                   'instructions' => '',
                                   'required' => 1,
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
                                   'maxlength' => '',
                              ),
                              array(
                                   'key' => 'field_5bbe133b9d932',
                                   'label' => 'Valor',
                                   'name' => 'valor',
                                   'type' => 'text',
                                   'instructions' => '',
                                   'required' => 1,
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