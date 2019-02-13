<?php

     if( function_exists('acf_add_local_field_group') ):

     acf_add_local_field_group(array(
          'key' => 'group_5bbe3a541eadd',
          'title' => 'Categorias',
          'fields' => array(
               array(
                    'key' => 'field_5bbe3a6374ee0',
                    'label' => '',
                    'name' => 'categoria',
                    'type' => 'taxonomy',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                         'width' => '',
                         'class' => '',
                         'id' => '',
                    ),
                    'taxonomy' => 'spw-imoveis-categoria',
                    'field_type' => 'radio',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'id',
                    'multiple' => 0,
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
          'menu_order' => 0,
          'position' => 'side',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => '',
          'active' => 1,
          'description' => '',
     ));

     endif;