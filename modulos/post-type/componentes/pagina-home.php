<?php

     namespace PostType\Componentes;
     
     class PaginaHome
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
               
               $dados = new \Spw\Componentes\Mysql\Query();
               $dados->Set_Conectar();
               $dados->Set_Start('value', 1);
               $dados->Set_AdicionarDadosSql('post-type', 'listar-post-types', null, null);
               $dados->Executar();
               
               $this->result = $dados->result;
               $this->rows = $dados->rows;

               
          }
          
          
          
          protected function BotaoInserir()
          {
               $botao_inserir = new \Spw\Componentes\UI\Admin\Botao();
               $botao_inserir->Set_AdicionarBotao_Inserir(null, 'Inserir', \Spw\Componentes\Modulo\Link::ExecutarGatilho('post-type', 'inserir-post-type', 'start=Y'), null);
               $botao_inserir->Executar();
               
               return $botao_inserir->render;
          }
          
          
          protected function PainelBotoes()
          {
               $painel_botoes = new \Spw\Componentes\UI\Admin\Painel_Botoes();
               $painel_botoes->Set_AdicionarBotao( $this->BotaoInserir() );
               $painel_botoes->Executar();
               
               return $painel_botoes->render;
               
          }
          
          
          protected function PainelMensagem()
          {
               $painel_mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $painel_mensagem->Executar();
               
               return $painel_mensagem->render;
               
          }
          
          
          protected function ColunasLista($conteudo, $link, $componente)
          {
               $coluna = new \Spw\Componentes\UI\Admin\Lista_AdicionarColunas();
               $coluna->Set_AdicionarColuna(true, null, '100%', 'left', $conteudo, $link, $componente);
               $coluna->Set_AtivarWrap(true);
               $coluna->Executar();
               
               return $coluna->render;
          }
          
          
          protected function Lista()
          {
               
               if (!empty($this->rows)) :
               
                    $lista = new \Spw\Componentes\UI\Admin\Lista();
                    
                    do{
                         $lista->Set_AdicionarItem( true, 'rows_' . $this->rows['id_post_type'], $this->ColunasLista($this->rows['post_type'], \Spw\Componentes\Modulo\Link::AbrirPagina('post-type', 'editar-post-type', 'id_post_type=' . $this->rows['id_post_type']), null) );
                    } while($this->rows = mysqli_fetch_assoc($this->result));
                    
                    $lista->Executar();

                    return $lista->render;
                    
                         else :
                              return '...';
               
               endif;
               
               
          }
          
          
          protected function PainelConteudo()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
               $painel->Set_Titulo('Registros');
               $painel->Set_AdicionarConteudo($this->Lista());
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function Pagina()
          {
               $pagina = new \Spw\Componentes\UI\Admin\Pagina();
               $pagina->Set_Titulo(SPW_TITULO);
               $pagina->Set_Subtitulo('Post Type');
               $pagina->Set_Navegacao_Ativar(true);
               $pagina->Set_Navegacao_AdicionarLink(null, 'Home', \Spw\Componentes\Modulo\Link::AbrirPagina('home', 'pagina-inicial', null), false);
               $pagina->Set_Navegacao_AdicionarLink(null, 'Todos os registros', null, true);
               $pagina->Set_AdicionarConteudo($this->PainelMensagem(), null);
               $pagina->Set_AdicionarConteudo($this->PainelBotoes(), null);
               $pagina->Set_AdicionarConteudo($this->PainelConteudo(), null);
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