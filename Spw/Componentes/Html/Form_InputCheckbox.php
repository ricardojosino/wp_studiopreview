<?php
     
     namespace Spw\Componentes\Html;

     class Form_InputCheckbox
     
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
          
          
          public function Set_AddCheckbox($value, $texto)
          
          {
               $this->add_radio[] = '<div style="margin-bottom:10px"><input type="checkbox"  ' . $this->Name() . $this->Id() . $this->ClassCss() . $this->Checked($value) . $this->Value($value) . $this->Required() . '>' . $texto . '</input></div>';
               
          }
          
          
          
          public function Set_Label($value)
          
          {
               $this->label = $value;
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
          
          
          
          public function Set_ValueDefault($value)
          
          {
               $this->value_default = $value;
          }
		  
		  
		  public function Set_Require($value)
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
		  
		  
		  private function ClassCss()
		  {
			  if (empty($this->css)) :
				  return ' class="spw-ui-form-input-checkbox" ';
			  
					else :
						return ' class="' . $this->css . '" ';
			  endif;
		  }
          
          
          
          private function Checked($value)
          
          {
               
				if (is_array($this->value_default)) :
					
					if (in_array($value, $this->value_default)) :
						
						return ' checked ';
						
					endif;
					
					
						else :

						if ( $value == $this->value_default ) :
							return ' checked ';
						endif;
					
					
				endif;
			  
				
          }
		  
		  
		  private function Value($value)
		  {
			  if (!empty($value)) :
				  return ' value="' . $value . '" ';
			  
					else :
						return ' value="N" ';
				  
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
          
          
     

     // METODOS DE EXECUCAO
          
          
          
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
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
     
          
          
     // ALGORITIMO
          
          function Executar()
          
          {
               $this->Input();
               $this->Render();
               
               
          }
          
          
     }