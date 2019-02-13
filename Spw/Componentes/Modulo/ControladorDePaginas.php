<?php 
     
     namespace Spw\Componentes\Modulo;

     class ControladorDePaginas
     {

     // ATRIBUTOS

           protected $page;
           protected $pagina_inicial;
           protected $pagina_inicial_modulo;
           protected $gatilho;
           
           protected $get_page;
           protected $get_modulo;
           protected $get_pagina;
           protected $get_gatilho;

           // SAIDA
           protected $view;
           public $render;



     // METODOS DE CONFIGURACAO
           
          public function __construct() 
          {
               (isset($_GET['page'])) ? $this->get_page = $_GET['page'] : $this->get_page = null;
               (isset($_GET['modulo'])) ? $this->get_modulo = $_GET['modulo'] : $this->get_modulo = null;
               (isset($_GET['pagina'])) ? $this->get_pagina = $_GET['pagina'] : $this->get_pagina = null;
               (isset($_GET['gatilho'])) ? $this->get_gatilho = $_GET['gatilho'] : $this->gatilho = null;
          }


          public function Set_WpPage($value)
          {
               $this->page = $value;
          }



          public function Set_PaginaInicial($modulo, $pagina)
          {
               $this->pagina_inicial_modulo = $modulo;
               $this->pagina_inicial = $pagina;
          }


          public function Set_AdicionarGatilho($value)
          {
               $this->gatilho[] = $value;
          }






     // METODOS DE PROCESSO

          protected function Action()
          {
               if ( !empty($this->get_modulo) and !empty($this->gatilho)) :

                     foreach($this->gatilho AS $gatilho) :

                          \Spw\Componentes\Modulo\IncluirArquivo::Gatilho($this->get_modulo, $gatilho);

                     endforeach;

               endif;
          }


          protected function ActionDefault()
          {
               if (!empty($this->get_gatilho) and !empty($this->get_modulo)) :

                    \Spw\Componentes\Modulo\IncluirArquivo::Gatilho($this->get_modulo, $this->get_gatilho);
                    exit();

               endif;

          }


          protected function Page()
          {
                if ( !empty($this->get_page) and empty($this->get_pagina) ) :

                       ob_start();
                       \Spw\Componentes\Modulo\IncluirArquivo::Pagina($this->pagina_inicial_modulo, $this->pagina_inicial);
                       $this->view[] = ob_get_clean();

                             else:
                                   ob_start();
                                   \Spw\Componentes\Modulo\IncluirArquivo::Pagina($this->get_modulo, $this->get_pagina);
                                   $this->view[] = ob_get_clean();
                endif;
          }
          
          
          protected function PaginaDeAtualizacao()
          {
               ob_start();
               \Spw\Componentes\Modulo\IncluirArquivo::Pagina('controle-de-versao', 'instalacao');
               return ob_get_clean();
          }
          
          
          protected function CheckAtualizacao()
          {
               
               $dados = new \ControleDeVersao\Componentes\VerificarVersaoDoBancoDeDados();
               $dados->Executar();
               
               $versao_atual = SPW_VERSAO;
               $versao_banco_dados = $dados->versao;
               
               if ($versao_atual <> $versao_banco_dados) :
                    return true;
               
                         else :
                              return false;
                    
               endif;
          }


          protected function Render()
          {
               if ($this->CheckAtualizacao() === true) :
                    $this->render = $this->PaginaDeAtualizacao();
               
                         else :
                              $this->render = \Spw\Componentes\Funcoes::Render($this->view);
                    
               endif;
               
          }



     // ALGORITIMO

          public function Executar()
          {
               if ($this->get_page == $this->page) :	

                    $this->Action();
                    $this->ActionDefault();
                    $this->Page();
                    $this->Render();

               endif;

          }

     }
