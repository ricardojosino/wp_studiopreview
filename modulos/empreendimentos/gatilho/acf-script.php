<?php

if( function_exists('acf_add_local_field_group') ):

     acf_add_local_field_group(array(
          'key' => 'group_5c06bb70ab024',
          'title' => 'Javascript',
          'fields' => array(
               array(
                    'key' => 'field_5c06bb7801603',
                    'label' => 'Script',
                    'name' => 'script',
                    'type' => 'wysiwyg',
                    'instructions' => '<p>Use código Javascript para alterar o botão de ação. Abra a tag script e escreva o código. Utilize a função Jquery(document).ready() para garantir que todos os elementos sejam carregados antes de rodar o script.</p>

     <h3>Para mudar o texto do botão: </h3>

     jQuery(".elementor-jet-posts .jet-posts__item .entry-title a:contains(\'Título do empreendimento\')").parent("h4.entry-title").parent(".jet-posts__inner-content").find(".jet-more-wrap .jet-more").html("<span>Texto do botão</span>");

     <br>
     <br>

     <h3>Para mudar a cor do fundo do botão:</h3>

     jQuery(".elementor-jet-posts .jet-posts__item .entry-title a:contains(\'Título do empreendimento\')").parent("h4.entry-title").parent(".jet-posts__inner-content").find(".jet-more-wrap .jet-more").css({background: "#EB645A"});',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                         'width' => '',
                         'class' => '',
                         'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'text',
                    'media_upload' => 0,
                    'toolbar' => 'full',
                    'delay' => 0,
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