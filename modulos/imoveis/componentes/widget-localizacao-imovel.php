<?php

    namespace Imoveis\Componentes;
    
    
    class WidgetImoveis_LocalizacaoDoImovel extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-imoveis-localizacao-imovel';
               $name = 'SPW IMÓVEIS - Localização do imóvel';
               $description = array('description' => 'Exibe bloco localização do imóvel.');

               parent::__construct($id, $name, $description);
          }
          
          
          
          public function Titulo($titulo)
          {
               if (!empty($titulo)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('h2', array('class' => 'spw-titulo'), $titulo);
               endif;
          }
          

          
          public function Endereco()
          {
               $pais = get_field('pais');
               $estado = get_field('estado');
               $cidade = get_field('cidade');
               $bairro = get_field('bairro');
               $rua = get_field('rua');
               $numero = get_field('numero');
               $complemento = get_field('complemento');
               
               $array[] = (!empty($rua)) ? $rua : false;
               $array[] = (!empty($numero)) ? $numero : false;
               $array[] = (!empty($bairro)) ? $bairro : false;
               $array[] = (!empty($cidade) and !empty($estado) ) ? $cidade . '-' . $estado : false;
               
               if (!empty($array)) :
                    return join(', ', $array);
               endif;
               
          }


          public function widget($arqs, $instance)

          {


               $array[] = '<div class="spw-imoveis-localizacao ' . $instance['class'] . '">';
               $array[] = $this->Titulo($instance['titulo']);
               $array[] = $this->Endereco();
               $array[] = '</div>';

               echo join('', $array);

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
     