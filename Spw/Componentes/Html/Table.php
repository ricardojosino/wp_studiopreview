<?php
     
     namespace Spw\Componentes\Html;

     class Table
     
     {
          
     // ATRIBUTOS
          
          protected $rows;
          protected $object;
          
          protected $view;
          public $render;
          
     // METODOS DE CONFIGURACAO
          
          public function Set_AdicionarLinha($id, $component)
          
          {
               if (!empty($component)) :
                    
                    $this->rows[] = '<tr ' . $this->Id($id) . '>' . $component . '</tr>';
                    
               endif;
          }
          
          
          
          public function Set_AdicionarComponente($value)
          
          {
               (!empty($value)) ? $this->object[] = $value : '';
          }

     
     // METODOS DE PROCESSO
          
          protected function Id($id)
          
          {
               if (!empty($id)) :
                    return ' id="' . $id . '"';
               endif;
          }
          
          
          
          protected function Rows()
          
          {
               if (!empty($this->rows)) :
                    
                    return implode(' ', $this->rows);
                    
               endif;
          }
          
          
          
          protected function Components()
          
          {
               if (!empty($this->object)) :
                    return implode(' ', $this->object);
               endif;
          }
          
          
          
          protected function Montar()
          
          {
               $this->view[] = '<div class="spw-ui-tabela">';
               $this->view[] = '<table>';
               
               $this->view[] = $this->Rows();
               
               $this->view[] = '</table>';
               $this->view[] = $this->Components();
               $this->view[] = '</div>';
               
          }
          
          
          
          protected function Render()
          
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               
               $this->Montar();
               $this->Render();
               
          }
          
          
     }