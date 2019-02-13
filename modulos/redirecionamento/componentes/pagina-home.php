<?php

     namespace Redirecionamento\Componentes;
     
     class PaginaHome
     {
          
          
          //01
          
          protected $view;
          public $render;
          
          
          //02
          
          
          
          
          //03
          
       
          
          protected function Conteudo()
          {
               $array[] = '<p>Copie e cole o shortcode de redirecionamento.</p>';
               $array[] = '....';
               
               return join('', $array);
          }
          
          
          protected function Painel()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
               $painel->Set_Titulo('Shortcode');
               $painel->Set_AdicionarConteudo($this->Conteudo());
               $painel->Executar();
               
               return $painel->render;
          }
          
          protected function Pagina()
          {
               $pagina = new \Spw\Componentes\UI\Admin\Pagina();
               $pagina->Set_Titulo('Redirecionamento');
               $pagina->Set_Subtitulo('Shortcode');
               $pagina->Set_AdicionarConteudo($this->Painel(), 'painel-shortcode');
               $pagina->Set_Navegacao_Ativar(true);
               $pagina->Set_Navegacao_AdicionarLink('home', 'Home', \Spw\Componentes\Modulo\Link::AbrirPagina('home', 'pagina-inicial', null), false);
               $pagina->Set_Navegacao_AdicionarLink('shortcode', 'Shortcode', null, true);
               $pagina->Executar();
               
               $this->view[] = $pagina->render;
               
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          
          
          //04
          public function Executar()
          {
               $this->Pagina();
               $this->Render();
          }
          
          
          
          
     }