<?php

     namespace Pessoas\Componentes;
     
     class PaginaHome
     {
          
          //01
          protected $view;
          protected $render;
          
          
          //02
          protected function Card()
          {
               $cards = new \Spw\Componentes\UI\Admin\Card();
               $cards->Set_AdicionarItem('bot-contato', 'Contatos', 'Listar contatos registrados.', '#', \Spw\Componentes\Ajax\Link::Pagina('bot-contato', 'pagina_listar_pessoas', null));
               $cards->Set_AdicionarItem('bot-categoria', 'Categorias', 'Listar categorias.', '#', \Spw\Componentes\Ajax\Functions::Link('pagina_listar_categorias', 'bot-categoria', 'pagina', null));
               $cards->Executar();
               
               return $cards->render;
     
          }
          
          
          protected function Pagina()
          {
               $pagina = new \Spw\Componentes\UI\Admin\Pagina();
               $pagina->Set_Titulo(SPW_PESSOAS_TITULO);
               $pagina->Set_AdicionarConteudo($this->Card());
               $pagina->Executar();
               
               $this->view[] = $pagina->render;

          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //03
          public function Get_Render()
          {
               return $this->render;
          }
          
          public function Executar()
          {
               $this->Pagina();
               $this->Render();
          }
          
     }