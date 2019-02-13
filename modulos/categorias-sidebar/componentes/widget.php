<?php
     
     namespace CategoriasSidebar\Componentes;

     class Categorias extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-categorias-sidebar';
               $name = 'SPW - Categorias por taxonomias';
               $description = array('description' => 'Exibe uma lista de categorias filtrando por taxonomia.');

               parent::__construct($id, $name, $description);
          }
          
          
          public function Titulo($instance)
          {
               
               return \Spw\Componentes\Html\Funcoes::Tag('h2', null, $instance['sidebar-titulo']);
          }
          
          
          public function Dados($instance)
          {
               $arqs['taxonomy'] = $instance['sidebar-taxonomia'];
               $arqs['orderby'] = 'name';
               $arqs['order'] = 'ASC';
               
               return get_terms($arqs);
          }
          
          
          public function DadosTaxonomias()
          {
               
               return get_taxonomies(null, 'objects');
               
          }
          
          
          public function Active($instance, $id_row)
          {
               if ($instance) :
               
                    ( @get_term_by('slug', @get_query_var('term'),  $instance['sidebar-taxonomia'])->term_id ) ? $id = get_term_by('slug', get_query_var('term'),  $instance['sidebar-taxonomia'])->term_id : $id = null;

                    if ($id_row == $id) :
                         return ' active ';
                    endif;
               
               endif;
          }
          
          
          public function Categorias($instance)
          {
               
               $dados = $this->Dados($instance);
               
               if (!empty($dados)) :

                    $array[] = '<ul>';

                    foreach($dados AS $row) :
                         $array[] = '<li ' . \Spw\Componentes\Html\Funcoes::Atributos( array('class' => $this->Active($instance, $row->term_id) ) ) . '><a href="' . get_term_link($row) . '">' . $row->name . '</a></li>';
                    endforeach;

                    $array[] = '</ul>';

                    return join('', $array);
               
               endif;
          }


          public function widget($arqs, $instance)

          {
               if ($instance) :
               
                    $array[] = '<div class="spw-sidebar-categorias">';
                    $array[] = $this->Titulo($instance);
                    $array[] = $this->Categorias($instance);
                    $array[] = '</div>';

                    echo join('', $array);
               
               endif;
             
          }


        

          public function form($instance)

          {
               
               $dados = $this->DadosTaxonomias();

               // ID
               $id['sidebar-titulo'] = $this->get_field_id('sidebar-titulo');
               $id['sidebar-taxonomia'] = $this->get_field_id('sidebar-taxonomia');
               
               // NAME
               $name['sidebar-titulo'] = $this->get_field_name('sidebar-titulo');
               $name['sidebar-taxonomia'] = $this->get_field_name('sidebar-taxonomia');

               // VALUE
               $value['sidebar-titulo'] = (isset($instance['sidebar-titulo'])) ? $instance['sidebar-titulo'] : '';
               $value['sidebar-taxonomia'] = (isset($instance['sidebar-taxonomia'])) ? $instance['sidebar-taxonomia'] : '';

               // CARREGA FORMULARIO
               $form_titulo = new \Spw\Componentes\Html\Form_InputText();
               $form_titulo->Set_Exibir(true);
               $form_titulo->Set_Label('Título');
               $form_titulo->Set_Name($name['sidebar-titulo']);
               $form_titulo->Set_Id($id['sidebar-titulo']);
               $form_titulo->Set_Value($value['sidebar-titulo']);
               $form_titulo->Executar();
               
               $form_taxonomia = new \Spw\Componentes\Html\Form_Select();
               $form_taxonomia->Set_Exibir(true);
               $form_taxonomia->Set_Id($id['sidebar-taxonomia']);
               $form_taxonomia->Set_Label('Taxonomia');
               $form_taxonomia->Set_Name($name['sidebar-taxonomia']);
               $form_taxonomia->Set_ValueDefault($value['sidebar-taxonomia']);
               
               foreach($dados AS $taxonomy) :
                    $form_taxonomia->Set_AddOption($taxonomy->name, $taxonomy->labels->name);
               endforeach;
               
               $form_taxonomia->Executar();
               
               $margem = '10px';
               
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_AdicionarConteudo(null, $form_titulo->render, $margem, $margem);
               $container->Set_AdicionarConteudo(null, $form_taxonomia->render, $margem, $margem);
               $container->Set_Wrap(true);
               $container->Executar();
               
               echo $container->render;

             
          }



          function update($dados, $dados_antigo)

          {
               $save['sidebar-titulo'] = $dados['sidebar-titulo'];
               $save['sidebar-taxonomia'] = $dados['sidebar-taxonomia'];

               return $save;
          }


     }    
