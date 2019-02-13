<?php

     if( function_exists('acf_add_local_field_group') ):

          acf_add_local_field_group(array(
               'key' => 'group_5bbe0edae106c',
               'title' => 'Dados do imóvel',
               'fields' => array(
                    array(
                         'key' => 'field_5bbe0eeccc4df',
                         'label' => 'Código de referência',
                         'name' => 'codigo_de_referencia',
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
                         'key' => 'field_5bbe0eecdcf63',
                         'label' => 'Inscrição Imobiliária',
                         'name' => 'inscricao_imobiliaria',
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
                         'key' => 'field_5bbe0f05cc4e0',
                         'label' => 'Quantidade de dormitórios',
                         'name' => 'quantidade_de_dormitorios',
                         'type' => 'number',
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
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    array(
                         'key' => 'field_5bbe0f2acc4e1',
                         'label' => 'Quantidade de suítes',
                         'name' => 'quantidade_de_suites',
                         'type' => 'number',
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
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    array(
                         'key' => 'field_5bbe0f3acc4e2',
                         'label' => 'Quantidade de BWC',
                         'name' => 'quantidade_de_bwc',
                         'type' => 'number',
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
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    array(
                         'key' => 'field_5bbe0f76cc4e3',
                         'label' => 'Quantidade de garagens',
                         'name' => 'quantidade_de_garagens',
                         'type' => 'number',
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
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    array(
                         'key' => 'field_5bbe0f84cc4e4',
                         'label' => 'Área',
                         'name' => 'area',
                         'type' => 'number',
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
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    
                    array(
                         'key' => 'field_5bbe0fdf214',
                         'label' => 'Área útil',
                         'name' => 'area_util',
                         'type' => 'number',
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
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    
                    array(
                         'key' => 'field_5bbe1118734e2',
                         'label' => 'Valor do condomínio',
                         'name' => 'valor_do_condominio',
                         'type' => 'number',
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
                         'prepend' => 'R$',
                         'append' => '',
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    array(
                         'key' => 'field_5bbe0fa4cc4e5',
                         'label' => 'Valor de venda',
                         'name' => 'valor_do_imovel',
                         'type' => 'number',
                         'instructions' => 'Preencher apenas quando o imóvel estiver disponível para venda',
                         'required' => 0,
                         'conditional_logic' => 0,
                         'wrapper' => array(
                              'width' => '',
                              'class' => '',
                              'id' => '',
                         ),
                         'default_value' => '',
                         'placeholder' => 'Exemplo: 10000,50 (Dez mil reais e cinquenta centavos)',
                         'prepend' => 'R$',
                         'append' => '',
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    
                    
                    array(
                         'key' => 'field_5bbesf15fg',
                         'label' => 'Valor de aluguel',
                         'name' => 'valor_do_aluguel',
                         'type' => 'number',
                         'instructions' => 'Preencher apenas quando o imóvel estiver disponível para alugar',
                         'required' => 0,
                         'conditional_logic' => 0,
                         'wrapper' => array(
                              'width' => '',
                              'class' => '',
                              'id' => '',
                         ),
                         'default_value' => '',
                         'placeholder' => 'Exemplo: 10000,50 (Dez mil reais e cinquenta centavos)',
                         'prepend' => 'R$',
                         'append' => '',
                         'min' => '',
                         'max' => '',
                         'step' => '',
                    ),
                    
                    
                    array(
                         'key' => 'field_5bbesf14d2y',
                         'label' => 'Detalhes da recorrência do aluguel',
                         'name' => 'detalhes_recorrencia',
                         'type' => 'select',
                         'instructions' => '',
                         'required' => 0,
                         'conditional_logic' => array(
                              
                              array(
                                   
                                   array('field' => 'field_5bbesf15fg', 'operador' => '!=empty'),
                                   
                              ),
                              
                              ),
                         'wrapper' => array(
                              'width' => '',
                              'class' => '',
                              'id' => '',
                         ),
                         'default_value' => '',
                         'choices' => array(
                              
                              '' => 'Vazio',
                              'Daily' => 'Diário',
                              'Weekly' => 'Semanal',
                              'Monthly' => 'Mensal',
                              'Quarterly' => 'Trimestral',
                              'Yearly' => 'Anual'
                              
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