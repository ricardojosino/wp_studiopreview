<?php

     class Spw_UI_Html_Table_Column
     
     {
          
     // ATRIBUTOS
          
          protected $column;
          
          protected $view;
          public $render;
          
          
          
     // METODOS DE CONFIGURACAO
          
          public function Set_Column($exibir, $id, $class, $value, $link, $component)

          {
               if ($exibir) :
                    $this->column[] = '<td ' . $this->Classe($class) . '>' . $this->Link($id, $value, $link) . $component . '</td>';
               endif;
          }
          

     
     // METODOS DE PROCESSO
          
          protected function Id($value)
          
          {
               if (!empty($value)) :
                    return ' id="' . $value . '"';
               endif;
          }
          
          
          
          protected function Link($id, $value, $link)
          
          {
               if (empty($link)) :
                    return '<div ' . $this->Id($id) . '><span>' . $value . '</span></div>';
               
                         else :
                              return '<a ' . $this->Id($id) . ' href="' . $link . '">' . $value . '</a>';
               endif;
          }
          
          
          
          protected function Classe($value)
          
          {
               if (!empty($value)) :
                    return ' class="' . $value . '" ';
               endif;
               
          }
          
          
          
          protected function Column()
          
          {
               if (!empty($this->column)) :
                    
                    $this->view[] = implode(' ', $this->column);
                    
               endif;
               
          }
          
          
          
          protected function Render()
          
          {
               $this->render = spw_view($this->view);
          }
          
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->Column();
               $this->Render();
                              
          }
          
          
     }