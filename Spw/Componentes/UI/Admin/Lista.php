<?php
     
     namespace Spw\Componentes\UI\Admin;

	class Lista

     {

          // ATRIBUTOS
		
			protected $itens;
               protected $componente;

			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO
			
               
               public function Set_AdicionarItem($exibir, $id, $componente_colunas)
               {
                    if($exibir) :
                         $this->itens[] = \Spw\Componentes\Html\Funcoes::Tag('li', array('id' => $id), $componente_colunas);
                    endif;
               }
               
               
               public function Set_AdicionarComponente($componente)
               {
                    $this->componente[] = $componente;
               }



          // METODOS DE PROCESSO
			
			
			protected function Itens()
			{
				if (!empty($this->itens)) :
					return join('', $this->itens);
				endif;
				
			}
               
               
               protected function Componentes()
               {
                    if (!empty($this->componente)) :
                         return join('', $this->componente);
                    endif;
               }
			
			
			protected function Content()
			{
				
				$this->view[] = '<div class="spw-list-view">';
				$this->view[] = '<ul>';
				$this->view[] = $this->Itens();
				$this->view[] = '</ul>';
				$this->view[] = '</div>';
                    $this->view[] = $this->Componentes();
				
			}
			
			
			
			protected function Render()
			{
				$this->render = \Spw\Componentes\Funcoes::Render($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->Content();
			  $this->Render();

          }


      }
