<?php

     namespace Imoveis\Componentes;
     
     
     class WidgetImoveis_InfoImoveis extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-imoveis-info-imoveis';
               $name = 'SPW IMÓVEIS - Informações do imóvel.';
               $description = array('description' => 'Exibir informações básicas do imóvel.');

               parent::__construct($id, $name, $description);
          }
          
          
          public function Item($icone, $value)
          {
               if (!empty($value)) :
                    
                    $array[] = '<div class="spw-item">';
                    $array[] = \Spw\Componentes\Html\Funcoes::Tag('img', array('src' => $icone, 'class' => 'spw-icone'), null);
                    $array[] = $value;
                    $array[] = '</div>';
                    
                    return join('', $array);
                    
               endif;
          }
          
          
          public function Itens($area, $quartos, $banheiros, $garagem)
          {
               $array[] = '<div class="spw-imoveis-itens-do-imovel">';
               $array[] = $this->Item( \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'areas.png'), $area);
               $array[] = $this->Item( \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'quartos.png'), $quartos);
               $array[] = $this->Item( \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'banheiros.png'), $banheiros);
               $array[] = $this->Item( \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'garagens.png'), $garagem);
               $array[] = '</div>';
               
               return join('', $array);
          }


          public function widget($arqs, $instance)

          {

               $area = get_field('area') . ' m&sup2';
               $quartos = \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural(get_field('quantidade_de_dormitorios'), null, 'quarto', 'quartos');
               $banheiros = \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural(get_field('quantidade_de_bwc'), null, 'banheiro', 'banheiros');
               $garagem = \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural(get_field('quantidade_de_garagens'), null, 'garagem', 'garagens');
               
               $itens = $this->Itens($area, $quartos, $banheiros, $garagem);
               
               echo \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $instance['id'], 'class' => $instance['class']), $itens);
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
     