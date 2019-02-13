<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bbe377538ad8',
               'title' => 'Localização',
               'fields' => array(
                    array(
                         'key' => 'field_5bbe399ee2299',
                         'label' => 'Embed do Mapa',
                         'name' => 'embed_do_mapa',
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
                         'placeholder' => 'Cole o código para incorporar o mapa',
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
                              'value' => 'spw-imoveis',
                         ),
                    ),
               ),
               'menu_order' => 7,
               'position' => 'normal',
               'style' => 'default',
               'label_placement' => 'top',
               'instruction_placement' => 'label',
               'hide_on_screen' => '',
               'active' => 1,
               'description' => '',
          ));

     endif;