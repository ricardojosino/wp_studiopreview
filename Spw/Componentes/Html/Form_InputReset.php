<?php
     
     namespace Spw\Componentes\Html;

     class Form_InputReset
     
     {
          
     // ATRIBUTOS
          
          private $id;
          private $name;
          private $css;
          private $value;
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
		  
		  
		  public function Set_Id($value)
          
          {
               $this->id = $value;
          }
		  
		  
		  public function Set_Name($value)
          
          {
               $this->name = $value;
          }
		  
		  
		  public function Set_Css($value)
          
          {
               $this->css = $value;
          }
          
          

     
     // METODOS DE EXECUCAO
          
          
          
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
				  return ' class="spw-botao reset" ';
			  
					else :
						return ' class="' . $this->css . '" ';
			  endif;
		  }
          
          
          
          private function Submit()
          
          {
               if ($this->exibir) :
                    
					$this->view[] = '<div>';
                    $this->view[] = '<input type="reset" ' . $this->Id() . $this->Name() .  $this->Value() . $this->ClassCss() . ' >';
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
               
               $this->Submit();
               $this->Render();
               
          }
          
          
     }