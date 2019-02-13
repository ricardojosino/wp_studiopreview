<?php

     namespace Home\Componentes;
     
     
     class ListarFerramentasNaHome
     {
          
          //01
          
          protected $result;
          protected $rows;
          
          protected $view;
          public $render;
          
          
          
          //02
          
          
          
          
          //03
          
          protected function Dados()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('VALUE', 1);
               $dados->Set_AdicionarQuery('SELECT i.id_instalacao, i.id_aplicativo, a.nome, a.titulo, a.descricao, a.modulo, a.pagina');
               $dados->Set_AdicionarQuery('FROM spw_aplicativos_instalados AS i, spw_aplicativos AS a');
               $dados->Set_AdicionarQuery("WHERE i.id_aplicativo = a.id_aplicativo AND a.lixeira = 'N' AND a.id_categoria = 2 ");
               $dados->Set_AdicionarQuery('ORDER BY a.titulo ASC');
               $dados->Executar();
               
               $this->result = $dados->result;
               $this->rows = $dados->rows;
          }
          
          
          protected function Mensagens()
          {
               $mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $mensagem->Executar();
               
               return $mensagem->render;
          }
          
          
          
          protected function Cards()
          {
               
               $card = new \Spw\Componentes\UI\Admin\Card();
               $card->Set_AdicionarItem('spw-aplicativos', 'Aplicativos', 'Coleção de aplicativos úteis para ser instalado em seu Wordpress.', \Spw\Componentes\Modulo\Link::AbrirPagina('aplicativos', 'instalacao', null));
               
               if (!empty($this->rows)) :
               
                    do {
                         $card->Set_AdicionarItem( 'aplicativo_' . $this->rows['id_aplicativo'], $this->rows['titulo'], $this->rows['descricao'], \Spw\Componentes\Modulo\Link::AbrirPagina($this->rows['modulo'], $this->rows['pagina'], null) );
                    } while($this->rows = mysqli_fetch_assoc($this->result));
               
               endif;
               
               
               $card->Executar();
               
               return $card->render;
               
               
          }
          
          
          protected function Pagina()
          {
               
               $pagina = new \Spw\Componentes\UI\Admin\Pagina();
               $pagina->Set_Id('spw-pagina');
               $pagina->Set_Titulo(SPW_TITULO);
               $pagina->Set_Subtitulo('Home');
               $pagina->Set_AdicionarConteudo( $this->Mensagens() );
               $pagina->Set_AdicionarConteudo( $this->Cards() );
               $pagina->Set_Navegacao_Ativar(true);
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
               $this->Dados();
               $this->Pagina();
               $this->Render();
          }
          
          
     }