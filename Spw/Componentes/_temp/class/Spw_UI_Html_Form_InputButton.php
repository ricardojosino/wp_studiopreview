<?php

     class Spw_UI_Html_Form_InputButton
     
     {
          
     // ATRIBUTOS
          
          private $value;
          private $exibir;
		  private $css;
		  private $id;
		  private $name;
          
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
		  
		  
		  public function Set_ClassCss($value)
		  {
			  $this->css = $value;
		  }
		  
		  
		  public function Set_Name($value)
		  {
			  $this->name = $value;
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
		  
		  
		  private function Value()
          
          {
               if ( !empty($this->value) ) :
                    
                    return ' value="' . $this->value . '" ';
                    
               endif;
          }
		  
		  
		  
		  private function ClassCss()
		  {
			  if (empty($this->css)) :
				  return ' class="spw-botao salvar" ';
			  
					else :
						return ' class="' . $this->css . '" ';
			  endif;
		  }
          
          
          
          
          private function Submit()
          
          {
				$this->view[] = '<div>';
				$this->view[] = '<input type="button" ' . $this->Value() . $this->Id() . $this->Name() . $this->ClassCss() . ' >';
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