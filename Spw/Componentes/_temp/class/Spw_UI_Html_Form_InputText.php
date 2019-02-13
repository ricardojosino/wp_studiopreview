<?php

     class Spw_UI_Html_Form_InputText
     
     {
          
     // ATRIBUTOS
          
          private $name;
          private $id;
          private $value;
          private $readonly;
          private $disabled;
          private $size;
          private $maxlength;
          private $autocomplete;
          private $autofocus;
          private $pattern;
          private $title;
          private $placeholder;
          private $required;
          private $label;
          private $exibir;
          private $style;
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
          
          
          
          public function Set_Value($value)
          
          {
               $this->value = $value;
          }
          
          
          
          public function Set_ReadOnly($true_false)
          
          {
               $this->readonly = $true_false;
          }
          
          
          
          public function Set_Disabled($true_false)
          
          {
               $this->disabled = $true_false;
          }
          
          
          
          public function Set_Size($value)
          
          {
               $this->size = $value;
          }
          
          
          
          public function Set_MaxLength($value)
          
          {
               $this->maxlength = $value;
          }
          
          
          
          public function Set_AutoComplete($value)
          
          {
               $this->autocomplete = $value;
          }
          
          
          
          public function Set_AutoFocus($true_false)
          
          {
               $this->autofocus = $true_false;
          }
          
          
          
          public function Set_Pattern($value)
          
          {
               $this->pattern = $value;
          }
          
          
          
          public function Set_Title($value)
          
          {
               $this->title = $value;
          }
          
          
          
          public function Set_Require($value)
          
          {
               $this->required = $value;
          }
          
          
          
          public function Set_Placeholder($value)
          
          {
               $this->placeholder = $value;
          }
          
          
          
          public function Set_Label($value)
          
          {
               $this->label = $value;
          }
          
          
          
          public function Set_Style($value)
          
          {
               $this->style = $value;
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
          
          
          
          private function Value()
          
          {
               if ( !empty($this->value) ) :
                    
                    return ' value="' . $this->value . '" ';
               
                         else :
                              
                              return ' value="" ';
                    
               endif;
               
          }
          
          
          
          private function ReadOnly()
          
          {
               if ( $this->readonly == true ) :
                    
                    return ' readonly ';
                    
               endif;
          }
          
          
          
          private function Disable()
          
          {
               if ( $this->disabled == true ) :
                    
                    return ' disabled ';
                    
               endif;
          }
          
          
          
          private function Size()
          
          {
               if ( !empty($this->size) ) :
                    
                    return ' size="' . $this->size . '" ';
                    
               endif;
          }
          
          
          
          private function MaxLength()
          
          {
               if ( !empty($this->maxlength) ) :
                    
                    return ' maxlength="' . $this->maxlength . '" ';
                    
               endif;
          }
          
          
          
          private function AutoComplete()
          
          {
               if ( !empty($this->autocomplete) ) :
                    
                    return ' autocomplete="' . $this->autocomplete . '" ';
                    
               endif;
          }
          
          
          
          private function AutoFocus()
          
          {
               if ( !empty($this->autofocus) ) :
                    
                    return ' autofocus="' . $this->autofocus . '" ';
                    
               endif;
          }
          
          
          
          private function Pattern()
          
          {
               if ( !empty($this->pattern) ) :
                    
                    return ' pattern="' . $this->pattern . '" ';
                    
               endif;
          }
          
          
          
          private function Title()
          
          {
               if ( !empty($this->title) ) :
                    
                    return ' title="' . $this->title . '" ';
                    
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
               if ( $this->required == true ) :
                    
                    return ' required ';
                    
               endif;
          }
          
          
          
          private function Label()
          
          {
               if ( !empty($this->label) ) :
                    
                    return '<label  class="spw-ui-form-label">' . $this->label . '</label>';
                    
               endif;
               
          }
          
          
          
          private function Style()
          
          {
               if ( !empty($this->style) ) :
                    
                    return ' style="' . $this->style . '" ';
                    
               endif;
          }
		  
		  
		  
		  private function CSS()
		  {
			  
			  if (empty($this->css)) :
				return ' class="spw-ui-form-input-text" ';
			  
					else :
						return ' class="' . $this->css . '" '; 
			  
			  endif;
		  }
          
     

     // METODOS DE EXECUCAO
          
          
          
          private function InputText()
          
          {
               
               if ($this->exibir) :
               
                    $this->view[] = '<div id="row_' . $this->id . '">';
                    $this->view[] = $this->Label();
                    $this->view[] = '<input type="text"' 
                    . $this->Name()
                    . $this->Id()
					. $this->CSS()
                    . $this->Value()
                    . $this->ReadOnly()
                    . $this->Disable()
                    . $this->Size()
                    . $this->MaxLength()
                    . $this->AutoComplete()
                    . $this->AutoFocus()
                    . $this->Pattern()
                    . $this->Title()
                    . $this->Placeholder()
                    . $this->Required()
                    . $this->Style()
                    .  '>';
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
               $this->InputText();
               $this->Render();
          }
          
          
     }