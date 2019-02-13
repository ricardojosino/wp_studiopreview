<?php
     
     namespace Spw\Componentes\Html;

     class Form_InputColor
     
     {
          
     // ATRIBUTOS
          
          private $name;
          private $id;
          private $label;
          private $value;
          private $style;
          private $disabled;
          private $exibir;
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
          

          
          public function Set_Style($value)
          
          {
               $this->style = $value;
          }
          
          
          
          public function Set_Value($value)
          
          {
               $this->value = $value;
          }
          
          
          
          public function Set_Label($value)
          
          {
               $this->label = $value;
          }
          
          
          
          public function Set_Disabled()
          
          {
               $this->disabled = true;
          }
		  
		  
		  public function Set_ClassCss($value)
		  {
			  $this->css = $value;
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
          
          
          
          private function Style()
          
          {
               if ( !empty($this->style) ) :
                    return ' style="' . $this->style . '" ';
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
          
          
          
          private function Label()
          
          {
               if ( !empty($this->label) ) :
                    return '<label class="spw-ui-form-label">' . $this->label . '</label>';
               endif;
          }
          
          
          
          private function Disabled()
          
          {
               if ( $this->disabled == true ) :
                    return ' disabled ';
               endif;
          }
		  
		  
		  private function Css()
		  {
			  if (empty($this->css)) :
				  return ' class="spw-ui-form-input-color" ';
			  
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
                    $this->view[] = '<input type="color" ' . $this->Value() . $this->Name() . $this->Id() . $this->Css() . $this->Style() . $this->Disabled() . ' >';
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