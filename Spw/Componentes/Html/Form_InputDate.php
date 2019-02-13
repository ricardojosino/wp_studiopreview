<?php
     
     namespace Spw\Componentes\Html;
     

     class Form_InputDate
     
     {
          
     // ATRIBUTOS
          
          private $name;
          private $id;
		private $value;
		private $css;
          private $min;
          private $max;
          private $label;
          private $style;
          private $require;
          private $exibir;
          
          // SAIDA
          private $view;
          public $render;
          
          
          
     // METODOS DE CONFIGURACAO
          
          
          
          function Set_Exibir($value)
          
          {
               $this->exibir = $value;
          }
          
          
          
          function Set_Name($value)
          
          {
               $this->name = $value;
          }
          
          
          function Set_Id($value)
          
          {
               $this->id = $value;
          }
		  
		  
		  function Set_Value($value)
          
          {
               $this->value = $value;
          }
		  
		  
		  public function Set_ClassCss($value)
		  {
			  $this->css = $value;
		  }
          
          
          function Set_Min($value)
          
          {
               $this->min = $value;
          }
          
          
          
          function Set_Max($value)
          
          {
               $this->max = $value;
          }
          
          
          
          function Set_Style($value)
          
          {
               $this->style = $value;
          }
          
          
          
          function Set_Label($value)
          
          {
               $this->label = $value;
          }
          
          
          
          function Set_Require($value)
          
          {
               $this->require = $value;
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
               endif;
          }
		  
		  
		  private function ClassCss()
		  {
			  if (empty($this->css)) :
				  return ' class="spw-ui-form-input-date" ';
			  
					else :
						return ' class="' . $this->css . '" ';
			  endif;
		  }
          
          
          
          private function Min()
          
          {
               if ( !empty($this->min) ) :
                    return ' min="' . $this->min . '" ';
               endif;
          }
          
          
          
          private function Max()
          
          {
               if ( !empty($this->max) ) :
                    return ' max="' . $this->max . '" ';
               endif;
               
          }
          
          
          
          private function Style()
          
          {
               if ( !empty($this->style) ) :
                    return ' style="' . $this->style . '" ';
               endif;
          }
          
          
          
          private function Label()
          
          {
               if ( !empty($this->label) ) :
                    return '<label class="spw-ui-form-label">' . $this->label . '</label>';
               endif;
          }
          
          
          
          private function Required()
          
          {
               if ($this->require == true) :
                    return ' required ';
               endif;
          }
          
     

     // METODOS DE EXECUCAO
          
          
          
          private function Input()
          
          {
               if ($this->exibir) :
                    
                    $this->view[] = '<div class="spw-ui-form-rows">';
                    $this->view[] = $this->Label();
                    $this->view[] = '<input type="date" ' . $this->Value() . $this->Name() . $this->Id() . $this->ClassCss() . $this->Min() . $this->Max() . $this->Style() . $this->Required() . ' >';
                    $this->view[] = '';

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