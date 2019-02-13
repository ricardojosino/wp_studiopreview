<?php
     
     namespace Spw\Componentes\Html;

     class Form_InputButton
     
     {
          
     // ATRIBUTOS
          
          private $value;
          private $exibir;
          private $css;
          private $id;
          private $name;
          private $componente;
          
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
            
            
            public function Set_AdicionarComponente($componente)
            {
                 $this->componente[] = $componente;
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
            
            protected function Componentes()
            {
                 if (!empty($this->componente)) :
                      
                      foreach($this->componente AS $item) :
                         $array[] = $item;
                      endforeach;
                      
                      if (!empty($array)) :
                           return join('', $array);
                      endif;
                      
                 endif;
            }
          
          
          
          
          private function Submit()
          
          {
				$this->view[] = '<div style="position: relative">';
				$this->view[] = '<input type="button" ' . $this->Value() . $this->Id() . $this->Name() . $this->ClassCss() . ' >';
                    $this->view[] = $this->Componentes();
				$this->view[] = '</div>';
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