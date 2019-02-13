<?php

     class Spw_WidgetRedirecionamento extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-widget-redirecionamento';
               $name = 'SPW - Redirecionamento';
               $description = array('description' => 'Redirecionar para uma página externa.');

               parent::__construct($id, $name, $description);
          }


          public function widget($arqs, $instance)

          {

               if (!is_admin() and !empty($instance['url'])) :
               
                    echo '<script>
                         jQuery(document).ready(function() {
                         
                         jQuery("body").hide();
                         window.location.assign("' . $instance['url'] . '");

                         });
                         
                    
                    </script>';
               
               endif;

          }
          
          

          public function form($instance)

          {
               // ID
               $id['id'] = $this->get_field_id('id');
               $id['class'] = $this->get_field_id('class');
               $id['url'] = $this->get_field_id('url');

               // NAME
               $name['id'] = $this->get_field_name('id');
               $name['class'] = $this->get_field_name('class');
               $name['url'] = $this->get_field_name('url');

               // VALUE
               $value['id'] = (isset($instance['id'])) ? $instance['id'] : '';
               $value['class'] = (isset($instance['class'])) ? $instance['class'] : '';
               $value['url'] = (isset($instance['url'])) ? $instance['url'] : '';

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
               
               $campo_url = new \Spw\Componentes\Html\Form_InputText();
               $campo_url->Set_Exibir(true);
               $campo_url->Set_Id($id['url']);
               $campo_url->Set_Name($name['url']);
               $campo_url->Set_Value($value['url']);
               $campo_url->Set_Label('Url');
               $campo_url->Executar();
               
               
               // CONTAINER
               $margin_top = '10px';
               $margin_bottom = '10px';
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_Wrap(true);
               $container->Set_AdicionarConteudo(null, $campo_url->render, $margin_top, $margin_bottom);
               $container->Executar();
               
               \Spw\Componentes\Funcoes::Show($container->render);


          }



          function update($dados, $dados_antigo)

          {
               $save['url'] = $dados['url'];

               return $save;
          }


     }    
     