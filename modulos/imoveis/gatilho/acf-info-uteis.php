<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bbe35a59deeb',
               'title' => 'Informações Úteis',
               'fields' => array(
                    array(
                         'key' => 'field_5bbe3615ba0d5',
                         'label' => '',
                         'name' => 'informacoes_uteis',
                         'type' => 'repeater',
                         'instructions' => 'Exemplo: Pintura: Pastilha e PVA',
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
                                   'key' => 'field_5bbe3672ba0d6',
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
                                   'placeholder' => 'Exemplo: Estilo: Moderno',
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
               'menu_order' => 6,
               'position' => 'normal',
               'style' => 'default',
               'label_placement' => 'top',
               'instruction_placement' => 'label',
               'hide_on_screen' => '',
               'active' => 1,
               'description' => '',
          ));

     endif;