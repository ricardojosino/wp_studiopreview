<?php

     class WidgetTaxonomias extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-widget-taxonomias';
               $name = 'SPW - Taxonomias';
               $description = array('description' => 'Exibe um bloco que lista termos de taxonomia. Você pode personalizar os blocos utilizando CSS.');

               parent::__construct($id, $name, $description);
          }
          
          
          public function Template01($instance)
          {
               $template = new Taxonomy\Componentes\WidgetTemplate01();
               $template->Set_Instance($instance);
               $template->Executar();
               
               return $template->render;
          }
          
          
          public function Template02($instance)
          {
               $template = new Taxonomy\Componentes\WidgetTemplate02();
               $template->Set_Instance($instance);
               $template->Executar();
               
               return $template->render;
          }


          public function widget($arqs, $instance)

          {

               switch($instance['id_layout']) :
               
                    case 1 :
                         echo $this->Template01($instance);
                         break;
                    
                    case 2 :
                         echo $this->Template02($instance);
                         break;
                    
                    default :
                         echo $this->Template01($instance);
                         break;
               
               endswitch;

          }
          
          
          public function DadosTaxonomias()
          {
               $args['public'] = true;
               
               return get_taxonomies($args);
          }
          

          public function form($instance)

          {
               
               $array_taxonomia = $this->DadosTaxonomias();
               
               // ID
               $id['id'] = $this->get_field_id('id');
               $id['class'] = $this->get_field_id('class');
               $id['taxonomy'] = $this->get_field_id('taxonomy');
               $id['hide_empty'] = $this->get_field_id('hide_empty');
               $id['orderby'] = $this->get_field_id('orderby');
               $id['order'] = $this->get_field_id('order');
               $id['id_layout'] = $this->get_field_id('id_layout');
               $id['meta_key_ordem'] = $this->get_field_id('meta_key_ordem');
               $id['meta_key_foto'] = $this->get_field_id('meta_key_foto');

               // NAME
               $name['id'] = $this->get_field_name('id');
               $name['class'] = $this->get_field_name('class');
               $name['taxonomy'] = $this->get_field_name('taxonomy');
               $name['hide_empty'] = $this->get_field_name('hide_empty');
               $name['orderby'] = $this->get_field_name('orderby');
               $name['order'] = $this->get_field_name('order');
               $name['id_layout'] = $this->get_field_name('id_layout');
               $name['meta_key_ordem'] = $this->get_field_name('meta_key_ordem');
               $name['meta_key_foto'] = $this->get_field_name('meta_key_foto');

               // VALUE
               $value['id'] = (isset($instance['id'])) ? $instance['id'] : '';
               $value['class'] = (isset($instance['class'])) ? $instance['class'] : '';
               $value['taxonomy'] = (isset($instance['taxonomy'])) ? $instance['taxonomy'] : '';
               $value['hide_empty'] = (isset($instance['hide_empty'])) ? $instance['hide_empty'] : '';
               $value['orderby'] = (isset($instance['orderby'])) ? $instance['orderby'] : '';
               $value['order'] = (isset($instance['order'])) ? $instance['order'] : '';
               $value['id_layout'] = (isset($instance['id_layout'])) ? $instance['id_layout'] : '';
               $value['meta_key_ordem'] = (isset($instance['meta_key_ordem'])) ? $instance['meta_key_ordem'] : '';
               $value['meta_key_foto'] = (isset($instance['meta_key_foto'])) ? $instance['meta_key_foto'] : '';

               // CARREGA FORMULARIO
               $campo_id = new \Spw\Componentes\Html\Form_InputText();
               $campo_id->Set_Exibir(true);
               $campo_id->Set_Id($id['id']);
               $campo_id->Set_Name($name['id']);
               $campo_id->Set_Value($value['id']);
               $campo_id->Set_Label('ID');
               $campo_id->Executar();
               
               $campo_class = new \Spw\Componentes\Html\Form_InputText();
               $campo_class->Set_Exibir(true);
               $campo_class->Set_Id($id['class']);
               $campo_class->Set_Name($name['class']);
               $campo_class->Set_Value($value['class']);
               $campo_class->Set_Label('Classe CSS');
               $campo_class->Executar();
               
               $campo_taxonomy = new \Spw\Componentes\Html\Form_Select();
               $campo_taxonomy->Set_Exibir(true);
               $campo_taxonomy->Set_Required(true);
               $campo_taxonomy->Set_Id($id['taxonomy']);
               $campo_taxonomy->Set_Name($name['taxonomy']);
               $campo_taxonomy->Set_Label('Taxonomia');
               $campo_taxonomy->Set_ValueDefault($value['taxonomy']);
               $campo_taxonomy->Set_AddOption('', 'Vazio');
               
               if ($array_taxonomia and !empty($array_taxonomia)) :
               
                    foreach($array_taxonomia AS $item_taxonomia) :
                         $campo_taxonomy->Set_AddOption($item_taxonomia, $item_taxonomia);
                    endforeach;
               
               endif;
               
               $campo_taxonomy->Executar();
               
               $campo_ordeby = new \Spw\Componentes\Html\Form_Select();
               $campo_ordeby->Set_Exibir(true);
               $campo_ordeby->Set_Label('Ordenar por');
               $campo_ordeby->Set_Required(true);
               $campo_ordeby->Set_Id($id['orderby']);
               $campo_ordeby->Set_Name($name['orderby']);
               $campo_ordeby->Set_ValueDefault($value['orderby']);
               $campo_ordeby->Set_AddOption('name', 'Por título');
               $campo_ordeby->Set_AddOption('meta_value_num', 'Por ordem numérico');
               $campo_ordeby->Executar();
               
               $campo_ordeby = new \Spw\Componentes\Html\Form_Select();
               $campo_ordeby->Set_Exibir(true);
               $campo_ordeby->Set_Label('Ordenar por');
               $campo_ordeby->Set_Required(true);
               $campo_ordeby->Set_Id($id['orderby']);
               $campo_ordeby->Set_Name($name['orderby']);
               $campo_ordeby->Set_ValueDefault($value['orderby']);
               $campo_ordeby->Set_AddOption('name', 'Por título');
               $campo_ordeby->Set_AddOption('meta_value_num', 'Por ordem numérico');
               $campo_ordeby->Executar();
               
               $campo_order = new \Spw\Componentes\Html\Form_Select();
               $campo_order->Set_Exibir(true);
               $campo_order->Set_Label('Classificação');
               $campo_order->Set_Required(true);
               $campo_order->Set_Id($id['order']);
               $campo_order->Set_Name($name['order']);
               $campo_order->Set_ValueDefault($value['order']);
               $campo_order->Set_AddOption('ASC', 'Crescente');
               $campo_order->Set_AddOption('DESC', 'Decrescente');
               $campo_order->Executar();
               
               $campo_hide_empty = new \Spw\Componentes\Html\Form_Select();
               $campo_hide_empty->Set_Exibir(true);
               $campo_hide_empty->Set_Label('Tipo de exibição');
               $campo_hide_empty->Set_Required(true);
               $campo_hide_empty->Set_Id($id['hide_empty']);
               $campo_hide_empty->Set_Name($name['hide_empty']);
               $campo_hide_empty->Set_ValueDefault($value['hide_empty']);
               $campo_hide_empty->Set_AddOption(0, 'Exibir tudo');
               $campo_hide_empty->Set_AddOption(1, 'Exibir apenas quando tiver posts relacionados');
               $campo_hide_empty->Executar();
               
               $campo_id_layout = new \Spw\Componentes\Html\Form_Select();
               $campo_id_layout->Set_Exibir(true);
               $campo_id_layout->Set_Label('Layout');
               $campo_id_layout->Set_Required(true);
               $campo_id_layout->Set_Id($id['id_layout']);
               $campo_id_layout->Set_Name($name['id_layout']);
               $campo_id_layout->Set_ValueDefault($value['id_layout']);
               $campo_id_layout->Set_AddOption(1, 'Modelo 01');
               $campo_id_layout->Set_AddOption(2, 'Modelo 02');
               $campo_id_layout->Executar();
               
               $campo_meta_key_ordem = new \Spw\Componentes\Html\Form_InputText();
               $campo_meta_key_ordem->Set_Exibir(true);
               $campo_meta_key_ordem->Set_Id($id['meta_key_ordem']);
               $campo_meta_key_ordem->Set_Name($name['meta_key_ordem']);
               $campo_meta_key_ordem->Set_Value($value['meta_key_ordem']);
               $campo_meta_key_ordem->Set_Label('Meta Key para Ordenação');
               $campo_meta_key_ordem->Set_Placeholder('Padrão');
               $campo_meta_key_ordem->Executar();
               
               $campo_meta_key_foto = new \Spw\Componentes\Html\Form_InputText();
               $campo_meta_key_foto->Set_Exibir(true);
               $campo_meta_key_foto->Set_Id($id['meta_key_foto']);
               $campo_meta_key_foto->Set_Name($name['meta_key_foto']);
               $campo_meta_key_foto->Set_Value($value['meta_key_foto']);
               $campo_meta_key_foto->Set_Label('Meta Key para imagem');
               $campo_meta_key_foto->Set_Placeholder('Padrão');
               $campo_meta_key_foto->Executar();
               
               // CONTAINER
               $margin_top = '10px';
               $margin_bottom = '10px';
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_Wrap(true);
               $container->Set_AdicionarConteudo(null, $campo_id->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_class->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_taxonomy->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_ordeby->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_order->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_hide_empty->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_id_layout->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_meta_key_ordem->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_meta_key_foto->render, $margin_top, $margin_bottom);
               $container->Executar();
               
               \Spw\Componentes\Funcoes::Show($container->render);

          }



          function update($dados, $dados_antigo)

          {
               $save['id'] = $dados['id'];
               $save['class'] = $dados['class'];
               $save['taxonomy'] = $dados['taxonomy'];
               $save['hide_empty'] = $dados['hide_empty'];
               $save['orderby'] = $dados['orderby'];
               $save['order'] = $dados['order'];
               $save['id_layout'] = $dados['id_layout'];
               $save['meta_key_ordem'] = $dados['meta_key_ordem'];
               $save['meta_key_foto'] = $dados['meta_key_foto'];

               return $save;
          }


     }    
     