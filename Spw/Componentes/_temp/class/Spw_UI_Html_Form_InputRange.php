<?php

     class Spw_UI_Html_Form_InputRange
     
     {
          
     // ATRIBUTOS
          
          private $name;
		  private $id;
		  private $css;
          private $value;
		  private $min;
          private $max;
          private $style;
          private $label;
          private $exibir;
		  private $require;
          
          // SAIDA
          private $view;
          public $render;
          
          
          
     // METODOS DE CONFIGURACAO
          
          public function Set_Exibir($value)
          {
               $this->exibir = $value;
          }
		  
		  
		  public function Set_Id($value)
          
          {
               $this->name = $value;
          }
          
          
          
          public function Set_Name($value)
          
          {
               $this->name = $value;
          }
		  
		  
		  public function Set_ClassCss($value)
          
          {
               $this->css = $value;
          }
          
          
          
          public function Set_Min($value)
          
          {
               $this->min = $value;
          }
          
          
          
          public function Set_Max($value)
          
          {
               $this->max = $value;
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
		  
		  
		  public function Set_Require($value)
		  {
			  $this->require = $value;
		  }
          

     
     // METODOS DE SUPORTE
		  
		  
		  
		  private function Id()
          
          {
               if ( !empty($this->id) ) :
                    return ' id="' . $this->id . '" ';
               endif;
          }
          
          
          
          private function Name()
          
          {
               if ( !empty($this->name) ) :
                    return ' name="' . $this->name . '" ';
               endif;
          }
		  
		  
		  private function ClassCss()
		  {
			  if (empty($this->css)) :
				  return ' class="spw-ui-form-input-range" ';
			  
					else :
						return ' class="' . $this->css . '" ';
			  endif;
		  }
		  
		  
		  private function Value()
          
          {
               if ( !empty($this->value) ) :
                    return ' value="' . $this->value . '" ';
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
                    return '<label class="spw-ui-form-label">' . $this->label . '</label><br>';
               endif;
          }
		  
		  
		  private function Required()
		  {
			  if ($this->require) :
				  return ' required ';
			  endif;
		  }
          
     

     // METODOS DE EXECUCAO
          
          private function Input()
          
          {
               if ($this->exibir) :
               
					$this->view[] = '<div class="spw-ui-form-rows">';
                    $this->view[] = $this->Label();
                    $this->view[] = '<input type="range" ' . $this->Value() . $this->Name() . $this->Id() . $this->Min() . $this->Max() . $this->ClassCss() . $this->Style() . $this->Required() . ' >';
					$this->view[] = '</div>';

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