<?php

     namespace Pessoas\Componentes;
     
     class PaginaListarCategorias
     {
          
          //01
          protected $rows_listar_categorias;
          protected $result_listar_categorias;
          protected $view;
          protected $render;
          
          
          //02
          protected function DadosListarCategorias()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('VALUE', 1);
               $dados->Set_AdicionarQuery("SELECT *");
               $dados->Set_AdicionarQuery("FROM spw_pessoas_categorias c");
               $dados->Set_AdicionarQuery("WHERE c.lixeira = 'N'");
               $dados->Set_AdicionarQuery("ORDER BY c.categoria ASC");
               $dados->Executar();
               
               $this->result_listar_categorias = $dados->result;
               $this->rows_listar_categorias = $dados->rows;
               
          }
          
          
          protected function PainelMensagens()
          {
               $mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $mensagem->Executar();
               
               return $mensagem->render;
          }
          
          
          protected function PainelConteudo()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
               $painel->Set_Titulo('Categoria cadastradas');
               $painel->Set_AdicionarConteudo($this->ListarCategorias());
               $painel->Set_Id('painel-categorias-cadastradas');
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function ListarCategorias()
          {
               $list = new \Spw\Componentes\UI\Admin\Lista();
               
               do {
               $list->Set_AdicionarItem(true, 'row_' . $this->rows_listar_categorias['id_categoria'], $this->ColunaDaLista($this->rows_listar_categorias['categoria'], '#', $this->rows_listar_categorias['id_categoria']));
               } while($this->rows_listar_categorias = mysqli_fetch_assoc($this->result_listar_categorias) );
               $list->Executar();
               
               return $list->render;
               
          }
          
          
          protected function ColunaDaLista($conteudo, $link, $id_categoria)
          {
               $col = new \Spw\Componentes\UI\Admin\Lista_AdicionarColunas();
               $col->Set_AtivarWrap(false);
               $col->Set_AlturaDaColuna('50px');
               $col->Set_AdicionarColuna(true, null, '100%', 'left', $conteudo, $link, \Spw\Componentes\Ajax\Link::Modal('row_' . $id_categoria, 'pagina_editar_categoria', array('id_categoria' => $id_categoria)));
               $col->Executar();
               
               return $col->render;
          }
          
          
          protected function PainelDeBotoes()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Botoes();
               $painel->Set_AdicionarBotao($this->BotaoInserir());
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function BotaoInserir()
          {
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Inserir('bot-inserir-categoria', 'Inserir Categoria', '#', \Spw\Componentes\Ajax\Link::Modal('bot-inserir-categoria', 'gatilho_inserir_categoria', array('start' => 1)) );
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function Conteudo()
          {
               $bloco = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $bloco->Set_AdicionarConteudo('painel-mensagem', $this->PainelMensagens(), 0, 0);
               $bloco->Set_AdicionarConteudo('painel-botoes', $this->PainelDeBotoes(), 0, 0);
               $bloco->Set_AdicionarConteudo('painel-conteudo', $this->PainelConteudo(), 0, 0);
               $bloco->Executar();
               
               return $bloco->render;
               
          }
          
          
          protected function Pagina()
          {
               $pagina = new \Spw\Componentes\UI\Admin\Pagina();
               $pagina->Set_Titulo(SPW_PESSOAS_TITULO);
               $pagina->Set_Subtitulo('Categorias');
               $pagina->Set_AdicionarConteudo( $this->Conteudo() , 'bloco-categorias');
               $pagina->Set_Navegacao_Ativar(true);
               $pagina->Set_Navegacao_Ajax_AdicionarLink('menu-home', 'Home', false, 'pagina_home', $_GET['page'], null, 'pagina');
               $pagina->Set_Navegacao_Ajax_AdicionarLink('menu-listar-categoria', 'Categorias', true, 'pagina_listar_categorias', $_GET['page'], null, 'pagina');
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
               $this->DadosListarCategorias();
               $this->Pagina();
               $this->Render();
          }
          
     }