<?php

     class Spw_UI_Html_Form_InputDatalist
     
     {
          
     // ATRIBUTOS
          
          private $name;
          private $id;
          private $label;
          private $style;
          private $add_option;
          private $exibir;
		  private $css;
		  private $value;
          
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
          

          
          public function Set_Label($value)
          
          {
               $this->label = $value;
          }
		  
		  
		  public function Set_Value($value)
		  {
			  $this->value = $value;
		  }
          
          
          
          public function Set_AddOption($value)
          
          {
               $this->add_option[] = '<option value="' . $value . '"></option>';
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
		  
		  
		  private function ClassCss()
		  {
			  if (empty($this->css)) :
				  return ' class="spw-ui-form-input-datalist" ';
			  
					else :
						return ' class="' . $this->css . '" ';
			  endif;
		  }
		  
		  
		  private function Label()
          
          {
               if ( !empty($this->label) ) :
                    return '<label class="spw-ui-form-label">' . $this->label . '</label>';
               endif;
          }
		  
		  
		  
		  private function Value()
		  {
			  if (!empty($this->value)) :
				  return ' value="' . $this->value . '" ';
			  endif;
		  }
          
          
          
          private function IdList()
          
          {
               if ( !empty($this->id) ) :
                    return ' list="' . $this->id . '" ';
               endif;
          }
          

          
          private function Style()
          
          {
               if ( !empty($this->style) ) :
                    return ' style="' . $this->style . '" ';
               endif;
          }
		  
          
          
          private function DataList()
          
          {
               if ( !empty( $this->add_option) ) :
               
                    $array[] = '<datalist ' . $this->Id() . '>';
                    $array[] = join('', $this->add_option);
                    $array[] = '</datalist>';
                    
                    return join('', $array);
               
               endif;
          }
          

          
     // METODOS DE EXECUCAO
          
          
          private function Input()
          
          {
               if ($this->exibir) :
               
					$this->view[] = '<div class="spw-ui-form-rows">';
                    $this->view[] = $this->Label();
                    $this->view[] = '<input ' .  $this->Name() . $this->IdList() . $this->ClassCss() . $this->Style() . $this->Value() . '>';
                    $this->view[] = $this->DataList();
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