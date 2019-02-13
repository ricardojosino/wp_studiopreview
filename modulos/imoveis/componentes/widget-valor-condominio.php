<?php
     
     namespace Imoveis\Componentes;

     class WidgetImoveis_ValorCondominio extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-imoveis-valor-condominio';
               $name = 'SPW IMÓVEIS - Valor do condomínio';
               $description = array('description' => 'Exibe o valor do condomínio.');

               parent::__construct($id, $name, $description);
          }
          
          
          public function Valor($instance)
          {
               if (empty($instance['prefixo'])) :
                    return \Spw\Componentes\Ferramentas\Pacote::Moeda_Formatar(get_field('valor_do_condominio'));
               
                         else :
                              return $instance['prefixo'] . ' ' . \Spw\Componentes\Ferramentas\Pacote::Moeda_Formatar(get_field('valor_do_condominio'));
                    
               endif;
          }


          public function widget($arqs, $instance)

          {

               echo \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $instance['id'], 'class' => $instance['class']), $this->Valor($instance));

          }
          
          

          public function form($instance)

          {

               // ID
               $id['id'] = $this->get_field_id('id');
               $id['class'] = $this->get_field_id('class');
               $id['prefixo'] = $this->get_field_id('prefixo');

               // NAME
               $name['id'] = $this->get_field_name('id');
               $name['class'] = $this->get_field_name('class');
               $name['prefixo'] = $this->get_field_name('prefixo');

               // VALUE
               $value['id'] = (isset($instance['id'])) ? $instance['id'] : '';
               $value['class'] = (isset($instance['class'])) ? $instance['class'] : '';
               $value['prefixo'] = (isset($instance['prefixo'])) ? $instance['prefixo'] : '';

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
               
               $campo_prefixo = new \Spw\Componentes\Html\Form_InputText();
               $campo_prefixo->Set_Exibir(true);
               $campo_prefixo->Set_Id($id['prefixo']);
               $campo_prefixo->Set_Name($name['prefixo']);
               $campo_prefixo->Set_Value($value['prefixo']);
               $campo_prefixo->Set_Label('Texto antes');
               $campo_prefixo->Executar();
               
               
               // CONTAINER
               $margin_top = '10px';
               $margin_bottom = '10px';
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_Wrap(true);
               $container->Set_AdicionarConteudo(null, $campo_id->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_class->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_prefixo->render, $margin_top, $margin_bottom);
               $container->Executar();
               
               \Spw\Componentes\Funcoes::Show($container->render);

          }



          function update($dados, $dados_antigo)

          {
               $save['id'] = $dados['id'];
               $save['class'] = $dados['class'];
               $save['prefixo'] = $dados['prefixo'];

               return $save;
          }


     }    
     