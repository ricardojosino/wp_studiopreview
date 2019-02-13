<?php

if( function_exists('acf_add_local_field_group') ):

     acf_add_local_field_group(array(
          'key' => 'group_5c05b1ee0af07',
          'title' => 'Dados do empreendimento',
          'fields' => array(
               
              
               
               array(
                    'key' => 'field_5c067b9cbc9cf',
                    'label' => 'Endereço',
                    'name' => 'empreendimento_endereco',
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
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
               ),
               
               
               array(
                    'key' => 'field_5c067b4666',
                    'label' => 'Situação',
                    'name' => 'empreendimento_situação',
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
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
               ),
               
               array(
                    'key' => 'field_5c067b456',
                    'label' => 'Suítes',
                    'name' => 'empreendimento_suites',
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
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
               ),
               
               array(
                    'key' => 'field_5c045645896',
                    'label' => 'Tamanho',
                    'name' => 'empreendimento_metros',
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
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
               ),
               
               array(
                    'key' => 'field_5c045644172',
                    'label' => 'Garagens',
                    'name' => 'empreendimento_garagem',
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
                         'value' => 'spw-empreendimentos',
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