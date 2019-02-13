<?php

     class Spw_UI_Html_Form_InputFile
     
     {
          
     // ATRIBUTOS
          
          protected $name;
          protected $id;
		  protected $css;
          protected $multiple;
          protected $exibir;
		  protected $label;
		  protected $limit_size;
          
          protected $view;
          public $render;
          
     // METODOS DE CONFIGURACAO
          
          
          public function Set_Exibir($value)
          {
               $this->exibir = $value;
          }
          
          public function Set_Name($value)
          
          {
               (!empty($value)) ? $this->name = $value : ''; 
          }
		  
          
          public function Set_Id($value)
          
          {
               (!empty($value)) ? $this->id = $value : ''; 
          }
		  
		  
		  public function Set_Label($value)
		  {
			  $this->label = $value;
		  }
		  
		  
		  
		  public function Set_ClassCss($value)
		  {
			  $this->css = $value;
		  }
          
          
          
          public function Set_Multiple($value)
          
          {
               ($value) ? $this->multiple = $value : '';
          }
		  
		  
		  public function Set_Limit_Size($value)
		  {
			  $this->limit_size = $value;
		  }
          

     
     // METODOS DE PROCESSO
          
          
          
          private function Multiple()
          
          {
               if ($this->multiple) :
                    return ' multiple ';
               endif;
          }
          
          
          
          protected function Id()
          
          {
               if (empty($this->id)) :
                    return ' id="upload" ' ;
               
                         else :
                              return ' id="' . $this->id . '" ';
                    
               endif;
          }
          
          
          
          protected function Name()
          
          {
               if(empty($this->name)) :
                    return ' name="upload" ';
               
                         else :
                              return ' name="' . $this->name . '" ';
                    
                    
               endif;
          }
		  
		  
		  private function ClassCss()
		  {
			  if (empty($this->css)) :
				  return ' class="spw-ui-form-input-file" ';
			  
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
		  
		  
		  protected function Check_ExibirMaxSize()
		  {
			  if (!empty($this->limit_size)) :
				  return true;
			  
					else :
						return false;
				  
			  endif;
		  }
		  
		  
		  protected function LimitMaxSize()
		  {
			  $input = new Spw_UI_Html_Form_InputHidden();
			  $input->Set_Exibir($this->Check_ExibirMaxSize());
			  $input->Set_Id('MAX_FILE_SIZE');
			  $input->Set_Name('MAX_FILE_SIZE');
			  $input->Set_Value($this->limit_size);
			  $input->Executar();
			  
			  return $input->render;
		  }
          
          
          
          protected function InputFile()
          
          {
               if ($this->exibir):
               
					$this->view[] = '<div class="spw-ui-form-rows">';
					$this->view[] = $this->Label();
					$this->view[] = $this->LimitMaxSize();
                    $this->view[] = '<input type="file" ' . $this->Name() . $this->Id() . $this->ClassCss() . $this->Multiple() . '>';
					$this->view[] = '</div>';
               
               endif;
          }
          
     
          
          protected function Render()
          
          {
               $this->render = spw_view($this->view);
          }

     // ALGORITIMO
          
          public function Executar()
          
          {
               
               $this->InputFile();
               $this->Render();
          }
          
          
     }