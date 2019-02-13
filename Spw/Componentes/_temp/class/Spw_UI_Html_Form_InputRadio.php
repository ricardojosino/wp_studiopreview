<?php

     class Spw_UI_Html_Form_InputRadio
     
     {
          
     // ATRIBUTOS
          
          private $name;
		  private $id;
		  private $css;
          private $label;
          private $value_default;
          private $add_radio;
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
               $this->id = $value;
          }
		  
		  
		  
		  public function Set_Name($value)
          
          {
               $this->name = $value;
          }
		  
		  
		  public function Set_Label($value)
          
          {
               $this->label = $value;
          }
		  
		  
		  public function Set_ClassCss($value)
          
          {
               $this->css = $value;
          }
		  
		  
		  public function Set_ValueDefault($value)
          
          {
               $this->value_default = $value;
          }
		  
		  
		  public function Set_Required($value)
		  {
			  $this->require = $value;
		  }
          
          
          public function Set_AddRadio($value, $texto)
          
          {
               $this->add_radio[] = '<div style="margin-bottom:10px"><input type="radio" ' . $this->Id() . $this->Name() . $this->ClassCss() . $this->Value($value) . $this->Checked($value) . $this->Required() . '>' . $texto . '</div>';
               
          }
          
          
          

     
     // METODOS DE EXECUCAO
		  
		  
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
				  return ' class="spw-ui-form-input-radio" ';
			  
					else :
						return ' class="' . $this->css . '" ';
			  endif;
		  }
		  
		  
		  private function Value($value)
          
          {
               if ( !empty($value) ) :
				   return ' value="' . $value . '" ';
						
						else :
							return ' value="" ';
               endif;
          }
          
          
          
          private function Checked($value)
          
          {
               if ( $value == $this->value_default ) :
                    return ' checked ';
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
			  if ($this->require) :
				  return ' required ';
			  endif;
		  }
          
          
          
          private function Input()
          
          {
               if ( !empty($this->add_radio) and $this->exibir ) :
					$this->view[] = '<div class="spw-ui-form-rows">';
                    $this->view[] = $this->Label();
                    $this->view[] = implode('', $this->add_radio);
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