<?php

     class Spw_UI_Bootstrap_Grid_Container
     
     {
          
     // ATRIBUTOS
          
		 protected $rows;
		 protected $type;
		 protected $view;
		 public $render;
          
          
     // METODOS DE CONFIGURACAO
          
		 public function Set_Type_Container($value)
		 {
			 if ($value) :
				$this->type = 1;
			 endif;
		 }
		 
		 
		 public function Set_Type_Fluid($value)
		 {
			 if ($value) :
				$this->type = 2;
			 endif;
		 }
		 
		 
		 public function Set_AddRow($id, $component)
		 {
			 if (!empty($component)) :
				 
				 $this->rows[] = '<div ' . $this->Id($id) . ' class="row">' . $component . '</div>';
				 
			 endif;
		 }
		 
		 
     // METODOS DE PROCESSO
		 
		 protected function Id($value)
		 {
			 if (!empty($value)) :
				 return ' id="' . $value . '" ';
			 endif;
		 }
		 
		 
		 protected function Rows()
		 {
			 if (!empty($this->rows)) :
				 
				 return join('', $this->rows);
				 
			 endif;
		 }
		 
		 
		 protected function Container()
		 {
			 
			 $this->view[] = '<div class="container">';
			 $this->view[] = $this->Rows();
			 $this->view[] = '</div>';
			 
		 }
		 
		 
		 protected function Fluid()
		 {
			 $this->view[] = '<div class="container-fluid">';
			 $this->view[] = $this->Rows();
			 $this->view[] = '</div>';
		 }
		 
		 
		 protected function Layout()
		 {
			 
			 switch($this->type) :
				 
				 case 1 :
					 $this->Container();
					 break;
				 
				 case 2 :
					 $this->Fluid();
					 break;
				 
				 default :
					 $this->Container();
					 break;;
				 
			 endswitch;
			 
		 }
		 
		 
		 protected function Render()
		 {
			 $this->render = spw_view($this->view);
		 }
				 
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->Layout();
			   $this->Render();
               
          }
          
          
     }