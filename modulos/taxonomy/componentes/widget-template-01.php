<?php

     namespace Taxonomy\Componentes;
     
     class WidgetTemplate01
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
               $args['meta_key'] = \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($this->instance['meta_key_ordem'], 'ordem');
               $args['orderby'] = $this->instance['orderby'];
               $args['order'] = $this->instance['order'];
               
               
               $this->dados = new \WP_Term_Query($args);
               
          }
        
          
          protected function Itens()
          {
               if ( $this->dados AND !empty($this->dados)) :
                    
                    $array[] = '<div class="spw-taxonomy-template-01-itens">';
               
                         foreach($this->dados->terms as $term) :
                              $array[] = $this->Item($term, $term->name);
                         endforeach;
               
                    $array[] = '</div>';
                    
                    return join('', $array);
                    
               endif;
               
          }
          
                
          protected function Item($term, $titulo)
          {
               return \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-taxonomy-template-01-item'), \Spw\Componentes\Html\Funcoes::Tag('a', array( 'href' => get_term_link($term) ), $titulo) );
          }
          
          
          protected function Template()
          {
               
               $this->view[] = '<div ' . \Spw\Componentes\Html\Funcoes::Atributos( array('id' => $this->instance['id'], 'class' => 'spw-taxonomy-template-01 ' . $this->instance['class'] ) ) . '>';
               $this->view[] = '<div class="spw-taxonomy-template-01-wrap">';
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
     