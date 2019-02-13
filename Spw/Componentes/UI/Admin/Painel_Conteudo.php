<?php
     
     namespace Spw\Componentes\UI\Admin;

     class Painel_Conteudo
     
     {
          
     // ATRIBUTOS
		 
		 protected $titulo = 'Título do panel';
           protected $id;
		 protected $conteudo;
		 protected $add_view;
           protected $menu;
          
		 protected $view;
		 public $render;
          
          
     // METODOS DE CONFIGURACAO
		 
		 public function Set_Titulo($value)
		 {
			 $this->titulo = $value;
		 }
           
           
           public function Set_Id($value)
           {
                $this->id = $value;
           }
		 
		 
		 public function Set_AdicionarConteudo($value)
		 {
			 $this->conteudo[] = \Spw\Componentes\Html\Funcoes::Tag('div', null, $value);
		 }
		 
		 
		 public function Set_AdicionarPagina($modulo, $pagina)
		 {
			 
			 ob_start();
                \Spw\Componentes\Modulo\IncluirArquivo::Pagina($modulo, $pagina);
			 $this->conteudo[] = ob_get_clean();
		 }
           
           
           public function Set_AdicionarBloco($modulo, $nome)
           {
                ob_start();
                \Spw\Componentes\Modulo\IncluirArquivo::Bloco($modulo, $nome);
                $this->conteudo[] = ob_get_clean();
           }
           
           
           public function Set_AddLinkNoMenu($id, $class, $href, $titulo, $componente)
           {
                $this->menu[] = array( 'id' => $id, 'class' => $class, 'href' => $href, 'titulo' => $titulo, 'componente' => $componente );
           }
		 
		

     
     // METODOS DE PROCESSO
		 
		 protected function Titulo()
		 {
			 
			 $array[] = '<div class="spw-titulo">';
			 $array[] = $this->titulo;
			 $array[] = '</div>';
			 
			 return join(' ', $array);
		 }
           
           
           protected function MenuLinks()
           {
                
                if (!empty($this->menu)) :
                
                    $array[] = '<div class="spw-menu-link">';
                    
                    foreach($this->menu AS $item) :
                         $array[] = \Spw\Componentes\Html\Funcoes::Tag('a', array('id' => $item['id'], 'class' => $item['class'], 'href' => $item['href']), $item['titulo'] . $item['componente']);
                    endforeach;
                    
                    $array[] = '</div>';

                    return join('', $array);
                
                endif;
           }
		 
		 
		 protected function Conteudo()
		 {
			 if (!empty($this->conteudo)) :
				 return \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-panel-bloco-conteudo'), join(' ', $this->conteudo));
			 endif;
		 }
		 
		 
		 protected function Panel()
		 {
			 
                $this->view[] = '<div ' . \Spw\Componentes\Html\Funcoes::Atributos( array('id' => $this->id) ) . '>';
			 $this->view[] = '<div class="spw-panel-conteudo">';
			 $this->view[] = $this->Titulo();
			 $this->view[] = $this->MenuLinks();
			 $this->view[] = $this->Conteudo();
			 $this->view[] = '</div>';
			 $this->view[] = '</div>';
		 }
		 
		 
		 protected function Render()
		 {
			 $this->render = \Spw\Componentes\Funcoes::Render($this->view);
		 }
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               
               $this->Panel();
               $this->Render();
               
          }
          
          
     }