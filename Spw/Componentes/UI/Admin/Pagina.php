<?php
     
     namespace Spw\Componentes\UI\Admin;

     class Pagina
     
     {
          
     // ATRIBUTOS

		 protected $titulo;
		 protected $subtitulo;
		 protected $conteudo;
           protected $script;
		 protected $modo;
           protected $id;
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
           
           
           public function Set_Subtitulo($value)
           {
                $this->subtitulo = $value;
           }
           
           public function Set_Id($value)
           {
                $this->id = $value;
           }
          
		 public function Set_AdicionarConteudo($value, $id = null)
		 {
			 $this->conteudo[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $id), $value);
		 }
           
           
           public function Set_AdicionarScript($componente)
           {
                $this->script[] = $componente;
           }
		 
		 
		 public function Set_Form_Exibir($value)
		 {
			 ($value) ? $this->modo = 2 : '';
		 }
		 
		 
		 public function Set_Form_Name($value)
		 {
			 $this->formulario_name = $value;
		 }
		 
		 
		 public function Set_Form_Id($value)
		 {
			 $this->formulario_id = $value;
		 }
		 
		 
		 public function Set_Form_Method($value)
		 {
			 $this->formulario_method = $value;
		 }
		 
		 
		 public function Set_Form_Action($value)
		 {
			 $this->formulario_action = $value;
		 }
		 
		 
		 public function Set_Form_EncType_MultipartFormData($value)
		 {
			 if($value) :
				$this->formulario_enctype = 'multipart/form-data';
			 endif;
		 }
		 
		 
		 public function Set_Form_EncType_Application($value)
		 {
			 if ($value) :
				$this->formulario_enctype = 'application/x-www-form-urlencoded';
			 endif;
		 }
		 
		 
		 public function Set_Form_EncType_TextPlain($value)
		 {
			 if ($value) :
				$this->formulario_enctype = 'text/plain';
			 endif;
		 }
		 
		 
		 public function Set_Navegacao_Ativar($value)
		 {
			 $this->navegacao_exibir = $value;
		 }
		 
		 
		 public function Set_Navegacao_AdicionarLink($id, $titulo, $link, $active)
		 {
			 $this->navegacao_link[] = '<div class="spw-item ' . $this->NavegacaoActive($active) . '">' . \Spw\Componentes\Html\Funcoes::Tag('a', array( 'id'=> $id, 'href' => $link), $titulo) . '</div>';
		 }
		 
           
		 public function Set_Navegacao_Ajax_AdicionarLink($id, $titulo, $active, $action, $page, $parametros_array, $callback_id)
		 {
			 $this->navegacao_link[] = '<div class="spw-item ' . $this->NavegacaoActive($active) . '">' . \Spw\Componentes\Html\Funcoes::Tag('a', array( 'id'=> $id, 'href' => '#'), $titulo) . $this->AjaxLoad($id, $action, $page, $parametros_array, $callback_id) . '</div>';
		 }
		 
		 
		 public function Set_Protegido($value)
		 {
			 $this->protegido = $value;
		 }

     
     // METODOS DE PROCESSO
		 
		 protected function Titulo()
		 {
			 if (!empty($this->titulo)) :
				 
				 return '<h1 class="spw-titulo">' . $this->titulo . '<p class="spw-sub-titulo">'. $this->subtitulo . '</p></h1>';
				 
			 endif;
		 }
		 
		 
		 protected function Mensagem($value)
		 {
                $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                $mensagem->Set_Mensagem($value);
                $mensagem->Executar();
		 }
		 
		 
		 protected function PainelMensagem()
		 {
                $panel = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
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
               if (!empty($this->formulario_action)) :
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
          
          
          protected function AjaxLoad($botao_id, $action, $page, $parametros, $callback_id)
          {
               $load = new \Spw\Componentes\Ajax\Load();
               $load->Set_Botao_Id($botao_id);
               $load->Set_Action($action);
               $load->Set_Page($page);
               $load->Set_AddParametros($parametros);
               $load->Set_Callback_Id($callback_id);
               $load->Executar();
               
               return $load->render;
          }



          protected function PageProtect()
          {
               $this->view[] = '<div class="spw-ui-page">';
               $this->view[] = $this->Titulo();
               $this->view[] = $this->Navegacao();
               $this->view[] = $this->ConteudoProtegido();
               $this->view[] = '</div>';
          }
               
          protected function Preloader()
          {
               return \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => 'preloader', 'class' => 'preloader'), 'Carregando...');
          }
          
          
          protected function Script()
          {
               if (!empty($this->script)) :
                    
                    return join(' ', $this->script);
                    
               endif;
          }


          protected function Page()
          {
               $this->view[] = '<div' . \Spw\Componentes\Html\Funcoes::Atributos(array('id' => $this->id)) . '>';
               $this->view[] = '<div class="spw-ui-page">';
               $this->view[] = $this->Titulo();
               $this->view[] = $this->Navegacao();
               $this->view[] = $this->Conteudo();
               $this->view[] = $this->Preloader();
               $this->view[] = '</div>';
               $this->view[] = '<div id="modal"></div>';
               $this->view[] = '<div id="dialogo"></div>';
               $this->view[] = '</div>';
               $this->view[] = $this->Script();

          }
           
		 
		 
          protected function Formulario()
          {

               $this->view[] = '<div' . \Spw\Componentes\Html\Funcoes::Atributos(array('id' => $this->id)) . '>';
               $this->view[] = '<form ' . $this->Id() . $this->Name() . $this->Method() . $this->EncType() . $this->Action() . '>';
               $this->view[] = '<div class="spw-ui-page">';
               $this->view[] = $this->Titulo();
               $this->view[] = $this->Navegacao();
               $this->view[] = $this->Conteudo();
               $this->view[] = $this->Preloader();
               $this->view[] = '</div>';
               $this->view[] = '</div>';
               $this->view[] = '<div id="modal"></div>';
               $this->view[] = '<div id="dialogo"></div>';
               $this->view[] = '</div>';
               $this->view[] = $this->Script();
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
			 $this->render = \Spw\Componentes\Funcoes::Render($this->view);
		 }
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->Modo();
			$this->Render();
               
          }
          
          
     }