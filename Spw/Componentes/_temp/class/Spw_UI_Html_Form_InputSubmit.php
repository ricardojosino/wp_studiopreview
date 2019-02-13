<?php

     class Spw_UI_Html_Form_InputSubmit
     
     {
          
     // ATRIBUTOS
          
          private $value;
          private $name;
          private $classe_css;
		  private $style;
          private $id;
          private $formaction;
          private $formenctype;
          private $formmethod;
          private $formtarget;
          private $exibir;
          
          
          // SAIDA
          private $view;
          public $render;
          
          
     // METODOS DE CONFIGURACAO
          
          public function Set_Exibir($value)
          {
               $this->exibir = $value;
          }
          
          
          public function Set_Value($value)
          
          {
               $this->value = $value;
          }
          
          
          
          public function Set_Name($value)
          
          {
               $this->name = $value;
          }
          
          
          
          public function Set_Id($value)
          
          {
               $this->id = $value;
          }
          
          
          
          public function Set_ClasseCss($value)
          
          {
               $this->classe_css = $value;
          }
          
          
          
          public function Set_FormAction($value)
          
          {
               $this->formaction = $value;
          }
          
          
          
          public function Set_FormEnctype($value)
          
          {
               $this->formenctype = $value;
          }
          
          
          
          public function Set_FormMethod($value)
          
          {
               $this->formmethod = $value;
          }
          
          
          
          public function Set_FormTarget($value)
          
          {
               $this->formtarget = $value;
          }
		  
		  
		  public function Set_Style($value)
		  {
			  $this->style = $value;
		  }
          
          
               
     // METODOS DE SUPORTE
          
          
          
          private function Value()
          
          {
               if ( !empty($this->value) ) :
                    
                    return ' value="' . $this->value . '" ';
                    
               endif;
          }
          
          
          
          private function Name()
          
          {
               if ( !empty($this->name) ) :
                    
                    return ' name="' . $this->name . '" ';
               
                         else :
                              
                              return ' name="submit" ';
                    
               endif;
          }
          
          
          
          private function Id()
          
          {
               if ( !empty($this->id) ) :
                    return ' id="' . $this->id . '"';
               endif;
          }
          
          
          
          private function ClasseCss()
          
          {
               if ( !empty($this->classe_css) ) :
                    return ' class="' . $this->classe_css . '"';
			   
						else :
							return ' class="spw-botao salvar" ';
			   
               endif;
          }
          
          
          
          private function Formaction()
          
          {
               if ( !empty($this->formaction) ) :
                    return ' formaction="' . $this->formaction . '" ';
               endif;
               
          }
          
          
          
          private function FormEnctype()
          
          {
               if ( !empty($this->formenctype) ) :
                    return ' formenctype="' . $this->formenctype . '" ';
               endif;
          }
          
          
          
          private function FormMethod()
          
          {
               if ( !empty($this->formmethod) ) :
                    return ' formmethod="' . $this->formmethod . '" ';
               endif;
          }
          
          
          
          private function FormTarget()
          
          {
               if ( !empty($this->formtarget) ) :
                    return ' formtarget="' . $this->formtarget . '" ';
               endif;
          }
		  
		  
		  private function Style()
		  {
			  if (!empty($this->style)) :
				  return ' style="' . $this->style . '" ';
			  endif;
		  }
          
          
     

     // METODOS DE EXECUCAO
          
          
          
          private function Submit()
          
          {
				$this->view[] = '<div>';
				$this->view[] = '<input type="submit" ' 
				. $this->Value() 
				. $this->Name()
				. $this->Id()
				. $this->ClasseCss()
				. $this->Style()
				. $this->Formaction() 
				. $this->FormEnctype()
				. $this->FormMethod()
				. $this->FormTarget()
				. ' >';
				$this->view[] = '</div>';
          }
          
          
          
          private function Render()
          
          {
               $this->render = spw_view($this->view);
          }
          
          
          
          
     
          
          
     // ALGORITIMO
          
          function Executar()
          
          {
               
               $this->Submit();
               $this->Render();
               
          }
          
          
     }