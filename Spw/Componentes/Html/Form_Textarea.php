<?php
     
     namespace Spw\Componentes\Html;

     class Form_Textarea
     
     {
          
     // ATRIBUTOS
          
          private $name;
          private $id;
          private $value;
          private $css;
          private $label;
          private $style;
          private $rows;
          private $cols;
          private $placeholder;
          private $exibir;
          private $required;
          
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
          
          
          
          public function Set_Value($value)
          
          {
               $this->value = $value;
          }
          
          
          
          public function Set_Label($value)
          
          {
               $this->label = $value;
          }
          
          
          
          public function Set_Rows($value)
          
          {
               $this->rows = $value;
          }
          
          
          
          public function Set_Cols($value)
          
          {
               $this->cols = $value;
          }
          
          
          
          public function Set_Placeholder($value)
          
          {
               $this->placeholder = $value;
          }
          
          
          
          public function Set_Require($value)
          
          {
               $this->required = $value;
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
		  
		  
		  private function ClassCss()
		  {
			  if (empty($this->css)) :
				  return ' class="spw-ui-form-textarea" ';
			  
					else :
						return ' class="' . $this->css . '" ';
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
                    return $this->value;
               endif;
          }
          
          
          
          private function Label()
          
          {
               if ( !empty($this->label) ) :
                    return '<label class="spw-ui-form-label">' . $this->label . '</label>';
               endif;
          }
          
          
          
          private function Rows()
          
          {
               if ( empty($this->rows) ) :
                    
                    return ' rows="7" ';
               
                         else :
                              
                              return ' rows="' . $this->rows . '" ';
                    
               endif;
          }
          
          
          
          private function Cols()
          
          {
               if ( !empty($this->cols) ) :
                    return ' cols="' . $this->cols . '" ';
               endif;
          }
          
          
          
          private function Placeholder()
          
          {
               if ( !empty($this->placeholder) ) :
                    
                    return ' placeholder="' . $this->placeholder . '" ';
                    
               endif;
          }
          
          
          
          private function Required()
          
          {
               if ($this->required) :
                    return ' required ';
               endif; 
          }
          
     

     // METODOS DE EXECUCAO
          
          
          private function Input()
          
          {
               if ($this->exibir) :
               
					$this->view[] = '<div class="spw-ui-form-rows">';
                    $this->view[] = $this->Label();
                    $this->view[] = '<textarea ' .  $this->Name() . $this->Id() . $this->ClassCss() . $this->Placeholder() . $this->Rows() . $this->Cols() . $this->Style() . $this->Required() . '>' . $this->Value() . '</textarea>';
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