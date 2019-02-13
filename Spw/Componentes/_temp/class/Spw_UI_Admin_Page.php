<?php

     class 
     Spw_UI_Admin_Page
     
     {
          
     // ATRIBUTOS

		 protected $titulo;
		 protected $conteudo;
		 protected $modo;
		 protected $formulario_name;
		 protected $formulario_id;
		 protected $formulario_method;
		 protected $formulario_action;
		 protected $formulario_enctype;
		 protected $navegacao_exibir;
		 protected $navegacao_link;
		 protected $protegido = false;
		 
          
		 protected $view;
		 public $render;
          
          
     // METODOS DE CONFIGURACAO
		 
		 public function Set_Titulo($value)
		 {
			 $this->titulo = $value;
		 }
          
		 public function Set_AddConteudo($value)
		 {
			 $this->conteudo[] = $value;
		 }
		 
		 
		 public function Set_ModoFormulario_Exibir($value)
		 {
			 ($value) ? $this->modo = 2 : '';
		 }
		 
		 
		 public function Set_ModoFormulario_Name($value)
		 {
			 $this->formulario_name = $value;
		 }
		 
		 
		 public function Set_ModoFormulario_Id($value)
		 {
			 $this->formulario_id = $value;
		 }
		 
		 
		 public function Set_ModoFormulario_Method($value)
		 {
			 $this->formulario_method = $value;
		 }
		 
		 
		 public function Set_ModoFormulario_Action($value)
		 {
			 $this->formulario_action = $value;
		 }
		 
		 
		 public function Set_ModoFormulario_EncType_MultipartFormData($value)
		 {
			 if($value) :
				$this->formulario_enctype = 'multipart/form-data';
			 endif;
		 }
		 
		 
		 public function Set_ModoFormulario_EncType_Application($value)
		 {
			 if ($value) :
				$this->formulario_enctype = 'application/x-www-form-urlencoded';
			 endif;
		 }
		 
		 
		 public function Set_ModoFormulario_EncType_TextPlain($value)
		 {
			 if ($value) :
				$this->formulario_enctype = 'text/plain';
			 endif;
		 }
		 
		 
		 public function Set_Navegacao_Exibir($value)
		 {
			 $this->navegacao_exibir = $value;
		 }
		 
		 
		 public function Set_Navegacao_AddLink($titulo, $link, $active)
		 {
			 $this->navegacao_link[] = '<div class="spw-item ' . $this->NavegacaoActive($active) . '">' . Spw_Html::TagA('', '', $titulo, $link) . '</div>';
		 }
		 
		 
		 public function Set_Protegido($value)
		 {
			 $this->protegido = $value;
		 }

     
     // METODOS DE PROCESSO
		 
		 protected function Titulo()
		 {
			 if (!empty($this->titulo)) :
				 
				 return '<h1 class="spw-titulo">' . $this->titulo . '</h1>';
				 
			 endif;
		 }
		 
		 
		 protected function Mensagem($value)
		 {
			 $mensagem = new Spw_Mensagem();
			 $mensagem->Set_Mensagem($value);
			 $mensagem->Executar();
			 
		 }
		 
		 
		 protected function PainelMensagem()
		 {
			 $panel = new Spw_UI_Admin_Panel_Mensagem();
			 $panel->Executar();
			 
			 return $panel->render;
		 }
		 
		 
		 protected function ConteudoProtegido()
		 {
			 $this->Mensagem('Este conteúdo não pode ser alterado.');
			 
			 return $this->PainelMensagem();
		 }
		 
		 protected function Conteudo()
		 {
			 
			 if (!empty($this->conteudo)) :
				 
				 return join(' ', $this->conteudo);
				 
			 endif;
		 }
		 
		 
		 
		 protected function Action()
          
          {
               if ( empty($this->formulario_action) ) :
                    
                    return ' action="' . spw_action_form() . '" ';
               
                         else :
                              
                              return ' action="' . $this->formulario_action . '" ';
                    
               endif;
          }
		  
		  
		  protected function Method()
          
          {
               if ( empty($this->formulario_method) ) :
                    
                    return ' method="POST" ';
               
                         else :
                              
                              return ' method="' . $this->formulario_method . '" ';
                    
               endif;
          }
		  
		  
		  protected function Name()
          
          {
               if ( empty($this->formulario_name) ) :
                    
                    return ' name="form" ';
               
                         else :
                              
                              return ' name="' . $this->formulario_name . '"';
                    
               endif;
          }
          
          
          
          protected function Id()
          
          {
               if ( empty($this->formulario_id) ) :
                    
                    return ' id="form" ';
               
                         else :
                              
                              return ' id="' . $this->formulario_id . '"';
                    
               endif;
          }
		  
		  
		  protected function EncType()
		  {
			  if (!empty($this->formulario_enctype)) :
				  return ' enctype="' . $this->formulario_enctype . '" ';
			  endif;
		  }
		  
		  
		  protected function NavegacaoActive($active)
		  {
			  if ($active) :
				  return ' active ';
			  endif;
			  
		  }
		  
		  
		  protected function NavegacaoLinks()
		  {
			  if (!empty($this->navegacao_link)) :
				  
				  return join('<div class="spw-item">/</div>', $this->navegacao_link);
				  
			  endif;
		  }
		  
		  
			protected function Navegacao()
			{
				if ($this->navegacao_exibir) :

				  $array[] = '<nav class="spw-ui-navegacao">';
				  $array[] = $this->NavegacaoLinks();
				  $array[] = '</nav>';

				  return join('', $array);

				endif;

			}
			
			
			
			protected function PageProtect()
			{
				$this->view[] = '<div class="spw-ui-page">';
				$this->view[] = $this->Titulo();
				$this->view[] = $this->Navegacao();
				$this->view[] = $this->ConteudoProtegido();
				$this->view[] = '</div>';
			}

		 
		 
		 protected function Page()
		 {
			 
			 $this->view[] = '<div class="spw-ui-page">';
			 $this->view[] = $this->Titulo();
			 $this->view[] = $this->Navegacao();
			 $this->view[] = $this->Conteudo();
			 $this->view[] = '</div>';
			 
		 }
		 
		 
		 protected function Formulario()
		 {
			 
			 $this->view[] = '<form ' . $this->Id() . $this->Name() . $this->Method() . $this->EncType() . $this->Action() . '>';
			 $this->view[] = '<div class="spw-ui-page">';
			 $this->view[] = $this->Titulo();
			 $this->view[] = $this->Navegacao();
			 $this->view[] = $this->Conteudo();
			 $this->view[] = '</div>';
			 $this->view[] = '</div>';
		 }
		 
		 
		 protected function Modo()
		 {
			 
			 switch($this->modo) :
				 
				 case 1 :
					 ($this->protegido == false) ? $this->Page() : $this->PageProtect();
					 break;
				 
				 case 2 :
					 ($this->protegido == false) ? $this->Formulario() : $this->PageProtect();
					 break;
				 
				 default :
					 ($this->protegido == false) ? $this->Page() : $this->PageProtect();
					 break;
				 
			 endswitch;
			 
			 
		 }
		 
		 
		 protected function Render()
		 {
			 $this->render = spw_view($this->view);
		 }
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->Modo();
			   $this->Render();
               
               
          }
          
          
     }