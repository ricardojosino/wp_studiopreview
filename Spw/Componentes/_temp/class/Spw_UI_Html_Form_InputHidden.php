<?php

     class Spw_UI_Html_Form_InputHidden
     
     {
          
     // ATRIBUTOS
          
          private $name;
          private $id;
          private $value;
          private $exibir;
          
          
          // SAIDA
          private $view;
          public $render;
          
          
          
     // METODOS DE CONFIGURACAO
          
          public function Set_Exibir($value)
          {
               $this->exibir = $value;
          }
          
          
          
          public function Set_Name($value)
          
          {
               $this->name = $value;
          }
          
          
          
          public function Set_Id($value)
          
          {
               $this->id = $value;
          }
          
          
          
          public function Set_Value($value)
          
          {
               $this->value = $value;
          }
          
          
          

     
     // METODOS DE SUPORTE
          
          
          
          private function Name()
          
          {
               if ( !empty($this->name) ) :
                    
                    return ' name="' . $this->name . '" ';
                    
               endif;
          }
          
          
          
          private function Id()
          
          {
               if ( !empty($this->id) ) :
                    
                    return ' id="' . $this->id . '" ';
                    
               endif;
          }
          
          
          
          private function Value()
          
          {
               if ( !empty($this->value) ) :
                    
                    return ' value="' . $this->value . '" ';
               
                         else :
                              
                              return ' value="" ';
                    
               endif;
               
          }
          
     

     // METODOS DE EXECUCAO
          
          
          
          private function Input()
          
          {
               if ($this->exibir) :
               
                    $this->view[] = '<input type="hidden" ' . $this->Name() . $this->Id() . $this->Value() . '>';

               endif;
          }
          
          
          
          private function Render()
          
          {
               $this->render = spw_view($this->view);
          }
     
          
          
     // ALGORITIMO
          
          function Executar()
          
          {
               $this->Input();
               $this->Render();
          }
          
          
     }