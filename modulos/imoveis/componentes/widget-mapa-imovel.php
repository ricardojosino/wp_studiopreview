<?php

     namespace Imoveis\Componentes;
     
     
     class WidgetImoveis_MapaDoImovel extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-imoveis-mapa-imovel';
               $name = 'SPW IMÓVEIS - Mapa do imóvel';
               $description = array('description' => 'Exibe um bloco com o mapa do endereço do imóvel.');

               parent::__construct($id, $name, $description);
          }
          
          
          public function Mapa()
          {
               return \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-mapa'), get_field('embed_do_mapa'));
          }


          public function widget($arqs, $instance)

          {

               $array[] = '<div class="spw-imoveis-mapa ' . $instance['class'] . '">';
               $array[] = $this->Mapa();
               $array[] = '</div>';

               echo join('', $array);

          }
          
          

          public function form($instance)

          {
               // ID
               $id['id'] = $this->get_field_id('id');
               $id['class'] = $this->get_field_id('class');

               // NAME
               $name['id'] = $this->get_field_name('id');
               $name['class'] = $this->get_field_name('class');

               // VALUE
               $value['id'] = (isset($instance['id'])) ? $instance['id'] : '';
               $value['class'] = (isset($instance['class'])) ? $instance['class'] : '';

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
               
               
               // CONTAINER
               $margin_top = '10px';
               $margin_bottom = '10px';
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_Wrap(true);
               $container->Set_AdicionarConteudo(null, $campo_id->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_class->render, $margin_top, $margin_bottom);
               $container->Executar();
               
               \Spw\Componentes\Funcoes::Show($container->render);


          }



          function update($dados, $dados_antigo)

          {
               $save['id'] = $dados['id'];
               $save['class'] = $dados['class'];

               return $save;
          }


     }    
     