<?php
     
     namespace Spw\Componentes\Html;
     
     class Form_Select
     
     {
          
     // ATRIBUTOS
          
          private $name;
          private $id;
          private $label;
          private $value_default;
          private $style;
          private $disabled;
          private $add_option;
          private $exibir;
          private $required;
		private $css;
          
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
		  
		  
          public function Set_ClassCss($value)
          {
               $this->css = $value;
          }
          
          
          
          public function Set_Style($value)
          
          {
               $this->style = $value;
          }
          
          
          
          public function Set_ValueDefault($value)
          
          {
               $this->value_default = $value;
          }
          
          
          
          public function Set_Disabled($value)
          
          {
               $this->disabled = $value;
          }
          
          
          
          public function Set_Label($value)
          
          {
               $this->label = $value;
          }
          
          
          
          public function Set_AddOption($value, $texto)
          
          {
               $this->add_option[] = '<option ' . $this->Value($value) . $this->Selected($value) . ' >' . $texto . '</option>';
          }
          
          
          
          public function Set_Required($value)
          
          {
               $this->required = $value;
          }
          

     
     // METODOS DE SUPORTE
          
          
          
          private function Selected($value)
          
          {
               if ( $value == $this->value_default ) :
                    return ' selected ';
               endif;
          }
          
          
          
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
          
          
          
          private function Style()
          
          {
               if ( !empty($this->style) ) :
                    return ' style="' . $this->style . '" ';
               endif;
          }
          
          
          
          private function Value($value)
          
          {
               if (!empty($value) ) :
                    
                    return ' value="' . $value . '" ';
               
                         else :
                              
                              return ' value="" ';
               endif;
               
          }
          
          
          
          private function Label()
          
          {
               if ( !empty($this->label) ) :
                    return '<label class="spw-ui-form-label">' . $this->label . '</label>';
               endif;
          }
          
          
          
          private function Disable()
          
          {
               if ( $this->disabled == true ) :
                    return ' disabled ';
               endif;
          }
          
          
          
          private function Required()
          
          {
               if ( $this->required) :
                    return ' required ';
               endif;
          }
		  
		  
		  private function Css()
		  {
			  if (empty($this->css)) :
				return ' class="spw-ui-form-select" ';
			  
				else :
					return ' class="' . $this->css . '" ';
			  
			  endif;
		  }
          
     

     // METODOS DE EXECUCAO
          
          
          
          private function Input()
          
          {
               if ($this->exibir) :
                    
                    $this->view[] = '<div class="spw-ui-form-rows">';
                    $this->view[] = $this->Label();
                    $this->view[] = '<select ' . $this->Name() . $this->Id() . $this->Css() . $this->Style() . $this->Disable() . $this->Required() . '>' . implode('', $this->add_option) .  '</select>';
                    $this->view[] = '</div>';

               endif;
          }
          
          
          
          private function Render()
          
          {
               
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
     
          
          
     // ALGORITIMO
          
          function Executar()
          
          {
               
               $this->Input();
               $this->Render();
               
          }
          
          
     }
     