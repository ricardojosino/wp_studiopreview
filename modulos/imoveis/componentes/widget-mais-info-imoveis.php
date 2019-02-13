<?php

     namespace Imoveis\Componentes;
     
     
     class WidgetImoveis_MaisInformacoesDoImovel extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-imoveis-mais-informacoes-imovel';
               $name = 'SPW IMÓVEIS - Informações úteis do imóvel';
               $description = array('description' => 'Exibir bloco de informações úteis.');

               parent::__construct($id, $name, $description);
          }
          
          
          public function Item($titulo)
          {
               if (!empty($titulo)) :
               
                    $array[] = '<div class="spw-item">';
                    $array[] = \Spw\Componentes\Html\Funcoes::Tag('img', array('src' => \Spw\Componentes\Modulo\Path::UrlImg('imoveis', 'checked.png'), 'class' => 'spw-icone'), null);
                    $array[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-titulo'), $titulo);
                    $array[] = '</div>';

                    return join('', $array);

               endif;
               
          }
          
          
          public function Itens($instance)
          {
               $lista = get_field('informacoes_uteis');
               
               if (!empty($lista)) :
                    
                    $array[] = '<div class="spw-itens">';
                         foreach($lista AS $item) :
                              $array[] = $this->Item($item['titulo']);
                         endforeach;
                    $array[] = '</div>';
                    
                    return join('', $array);
                    
               endif;
               
          }
          
          
          public function Titulo($titulo)
          {
               if (!empty($titulo)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('h2', array('class' => 'spw-titulo'), $titulo);
               endif;
          }


          public function widget($arqs, $instance)

          {

               $lista = get_field('informacoes_uteis');
               
               if (!empty($lista)) :
               
                    $array[] = '<div class="spw-imoveis-mais-informacoes ' . $instance['class'] . '">';
                    $array[] = $this->Titulo($instance['titulo']);
                    $array[] = $this->Itens($instance);
                    $array[] = '</div>';

                    echo join('', $array);

               endif;
          }
          
          

          public function form($instance)

          {
               // ID
               $id['id'] = $this->get_field_id('id');
               $id['class'] = $this->get_field_id('class');
               $id['titulo'] = $this->get_field_id('titulo');

               // NAME
               $name['id'] = $this->get_field_name('id');
               $name['class'] = $this->get_field_name('class');
               $name['titulo'] = $this->get_field_name('titulo');

               // VALUE
               $value['id'] = (isset($instance['id'])) ? $instance['id'] : '';
               $value['class'] = (isset($instance['class'])) ? $instance['class'] : '';
               $value['titulo'] = (isset($instance['titulo'])) ? $instance['titulo'] : '';

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
               
               $campo_titulo = new \Spw\Componentes\Html\Form_InputText();
               $campo_titulo->Set_Exibir(true);
               $campo_titulo->Set_Id($id['titulo']);
               $campo_titulo->Set_Name($name['titulo']);
               $campo_titulo->Set_Value($value['titulo']);
               $campo_titulo->Set_Label('Título');
               $campo_titulo->Executar();
               
               
               // CONTAINER
               $margin_top = '10px';
               $margin_bottom = '10px';
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_Wrap(true);
               $container->Set_AdicionarConteudo(null, $campo_id->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_class->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_titulo->render, $margin_top, $margin_bottom);
               $container->Executar();
               
               \Spw\Componentes\Funcoes::Show($container->render);


          }



          function update($dados, $dados_antigo)

          {
               $save['id'] = $dados['id'];
               $save['class'] = $dados['class'];
               $save['titulo'] = $dados['titulo'];

               return $save;
          }


     }    
     