<?php

     namespace Taxonomy\Componentes;
     
     
     class WidgetTemplate02
     {
          
          
          //01
          protected $instance;
          
          protected $dados;
          
          protected $view;
          public $render;
          
          
          //02
          
          public function Set_Instance($instance)
          {
               $this->instance = $instance;
          }
          
          
          
          //03
          
          protected function Dados()
          {
               $args['taxonomy'] = $this->instance['taxonomy'];
               $args['hide_empty'] = $this->instance['hide_empty'];
               $args['meta_key'] = \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($this->instance['meta_key_ordem'], 'ordem');;
               $args['orderby'] = $this->instance['orderby'];
               $args['order'] = $this->instance['order'];
               
               
               $this->dados = new \WP_Term_Query($args);
               
          }
          
          
          protected function Item($instance, $term)
          {
               ($instance) ? $instance = $instance : $instance = false;
               ($term) ? $term = $term : $term = false;
               
               if (function_exists('get_field')) :
                    
                    $array[] = '<div class="spw-taxonomy-template-02-item">';
                    $array[] = '<div class="spw-taxonomy-template-02-item-wrap">';
                    $array[] = \Spw\Componentes\Html\Funcoes::Tag('a', array('class' => 'spw-taxonomy-template-02-item-link', 'href' => get_term_link($term, $instance['taxonomy'])), null);
                    $array[] = \Spw\Componentes\Html\Funcoes::Tag('img', array('src' => get_field( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($instance['meta_key_foto'], 'foto') , $instance['taxonomy'] . '_' . $term->term_id)), null);
                    $array[] = '</div>';
                    $array[] = '</div>';

                    return join('', $array);
               
               endif;
          }
          
          
          protected function Itens()
          {
               if ( $this->dados AND !empty($this->dados)) :
                    
                    $array[] = '<div class="spw-taxonomy-template-02-itens">';
               
                         foreach($this->dados->terms as $term) :
                              $array[] = $this->Item($this->instance, $term);
                         endforeach;
               
                    $array[] = '</div>';
                    
                    return join('', $array);
                    
               endif;
               
          }
          
          protected function Template()
          {
               
               $this->view[] = '<div ' . \Spw\Componentes\Html\Funcoes::Atributos( array('id' => $this->instance['id'], 'class' => 'spw-taxonomy-template-02 ' . $this->instance['class'] ) ) . '>';
               $this->view[] = '<div class="spw-taxonomy-template-02-wrap">';
               $this->view[] = $this->Itens();
               $this->view[] = '</div>';
               $this->view[] = '</div>';
               
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //04
          public function Executar()
          {
               $this->Dados();
               $this->Template();
               $this->Render();
          }
          
          
     }