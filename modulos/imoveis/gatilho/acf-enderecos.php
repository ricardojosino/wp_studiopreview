<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bbe002c2df19',
               'title' => 'Endereço',
               'fields' => array(
                    array(
                         'key' => 'field_5bbe033636606',
                         'label' => 'País',
                         'name' => 'pais',
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
                         'key' => 'field_5bbe034c36607',
                         'label' => 'Estado',
                         'name' => 'estado',
                         'type' => 'text',
                         'instructions' => '',
                         'required' => 1,
                         'conditional_logic' => array(
                              array(
                                   array(
                                        'field' => 'field_5bbe033636606',
                                        'operator' => '!=empty',
                                   ),
                              ),
                         ),
                         'wrapper' => array(
                              'width' => '',
                              'class' => '',
                              'id' => '',
                         ),
                         'default_value' => '',
                         'placeholder' => '',
                         'prepend' => '',
                         'append' => '',
                         'maxlength' => '2',
                    ),
                    array(
                         'key' => 'field_5bbe037f36608',
                         'label' => 'Cidade',
                         'name' => 'cidade',
                         'type' => 'text',
                         'instructions' => '',
                         'required' => 1,
                         'conditional_logic' => array(
                              array(
                                   array(
                                        'field' => 'field_5bbe034c36607',
                                        'operator' => '!=empty',
                                   ),
                              ),
                         ),
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
                         'key' => 'field_5bbe039136609',
                         'label' => 'Bairro',
                         'name' => 'bairro',
                         'type' => 'text',
                         'instructions' => '',
                         'required' => 1,
                         'conditional_logic' => array(
                              array(
                                   array(
                                        'field' => 'field_5bbe037f36608',
                                        'operator' => '!=empty',
                                   ),
                              ),
                         ),
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
                         'key' => 'field_5bbe043cf57b6',
                         'label' => 'Rua',
                         'name' => 'rua',
                         'type' => 'text',
                         'instructions' => '',
                         'required' => 0,
                         'conditional_logic' => array(
                              array(
                                   array(
                                        'field' => 'field_5bbe039136609',
                                        'operator' => '!=empty',
                                   ),
                              ),
                         ),
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
                         'key' => 'field_5bbe0498f57b7',
                         'label' => 'Número',
                         'name' => 'numero',
                         'type' => 'text',
                         'instructions' => '',
                         'required' => 0,
                         'conditional_logic' => array(
                              array(
                                   array(
                                        'field' => 'field_5bbe039136609',
                                        'operator' => '!=empty',
                                   ),
                              ),
                         ),
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
                         'key' => 'field_5bbe04a7f57b8',
                         'label' => 'Complemento',
                         'name' => 'complemento',
                         'type' => 'text',
                         'instructions' => '',
                         'required' => 0,
                         'conditional_logic' => array(
                              array(
                                   array(
                                        'field' => 'field_5bbe039136609',
                                        'operator' => '!=empty',
                                   ),
                              ),
                         ),
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
                         'key' => 'field_5bbe044df1',
                         'label' => 'Latitude',
                         'name' => 'latitude',
                         'type' => 'number',
                         'instructions' => '',
                         'required' => 0,
                         'conditional_logic' => array(
                              array(
                                   array(
                                        'field' => 'field_5bbe039136609',
                                        'operator' => '!=empty',
                                   ),
                              ),
                         ),
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
                         'key' => 'field_5bbe0sff12',
                         'label' => 'Longitude',
                         'name' => 'longitude',
                         'type' => 'number',
                         'instructions' => '',
                         'required' => 0,
                         'conditional_logic' => array(
                              array(
                                   array(
                                        'field' => 'field_5bbe039136609',
                                        'operator' => '!=empty',
                                   ),
                              ),
                         ),
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
               'location' => array(
                    array(
                         array(
                              'param' => 'post_type',
                              'operator' => '==',
                              'value' => 'spw-imoveis',
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