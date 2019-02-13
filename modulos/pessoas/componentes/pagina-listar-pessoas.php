<?php

     namespace Pessoas\Componentes;
     
     class PaginaListarContatos
     {
          
          //01
          protected $result_contatos;
          protected $rows_contatos;
          protected $pesquisar_nome;
          protected $pesquisar_id_categoria;
          protected $view;
          protected $render;
          
          
          //02
          protected function Dados()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('VALUE', 1);
               $dados->Set_AdicionarQuery("select *");
               $dados->Set_AdicionarQuery("from spw_pessoas p");
               $dados->Set_AdicionarQuery($this->Where());
               $dados->Set_AdicionarQuery("order by p.time DESC");
               $dados->Executar();
               
               $this->result_contatos = $dados->result;
               $this->rows_contatos = $dados->rows;
               
          }
          
          
          protected function Where()
          {
               $pesquisar_por_nome = $this->PesquisarNome();
               
               $array[] = "p.lixeira = 'N'";
               (!empty($pesquisar_por_nome)) ? $array[] =  "p.nome_completo LIKE '%$pesquisar_por_nome%'" : null;
               
               if (!empty($array)) :
                    return 'where ' . join(' and ', $array);
               endif;
          }
          
          
          protected function PesquisarNome()
          {
               if(isset($_SESSION['pessoas_pesquisar_nome'])) :
                    return $_SESSION['pessoas_pesquisar_nome'];
               
                         elseif( !empty($this->pesquisar_nome) ) :
                              return $this->pesquisar_nome;
               
               endif;
          }
          
          
          protected function PesquisarIdCategoria()
          {
               if(isset($_SESSION['pessoas_pesquisar_id_categoria'])) :
                    return $_SESSION['pessoas_pesquisar_id_categoria'];
               
                         elseif( !empty($this->pesquisar_id_categoria) ) :
                              return $this->pesquisar_id_categoria;
               
               endif;
          }
          
          protected function AjaxPesquisar()
          {
               $ajax = new \Spw\Componentes\Ajax\AjaxPost();
               $ajax->Set_AdicionarInput('nome');
               $ajax->Set_AdicionarParametro_Page('spw-pessoas');
               $ajax->Set_AdicionarParametro_Action('pagina_filtrar_pessoas');
               $ajax->Set_Botao_Id('bot-pesquisar');
               $ajax->Set_Preload_Exibir(true);
               $ajax->Set_Callback_Exibir(true);
               $ajax->Set_Callback_Id('pagina');
               $ajax->Set_Callback_Parametros_Page('spw-pessoas');
               $ajax->Set_Callback_Parametros_Action('pagina_listar_pessoas');
               $ajax->Executar();
               
               return $ajax->render;
               
          }
          
          
          protected function AjaxLimpar()
          {
               $ajax = new \Spw\Componentes\Ajax\AjaxPost();
               $ajax->Set_AdicionarParametro_Page('spw-pessoas');
               $ajax->Set_AdicionarParametro_Action('gatilho_limpar_filtro_pessoa');
               $ajax->Set_Botao_Id('bot-limpar');
               $ajax->Set_Preload_Exibir(true);
               $ajax->Set_Callback_Exibir(true);
               $ajax->Set_Callback_Id('pagina');
               $ajax->Set_Callback_Parametros_Page('spw-pessoas');
               $ajax->Set_Callback_Parametros_Action('pagina_listar_pessoas');
               $ajax->Executar();
               
               return $ajax->render;
               
          }
          
          
          protected function ListarContatos()
          {
               if (!empty($this->rows_contatos)) :
                    
                    $listar = new \Spw\Componentes\UI\Admin\Lista();
                    do {
                    $listar->Set_AdicionarItem(true, 'row_' . $this->rows_contatos['id_pessoa'], $this->Coluna($this->rows_contatos));
                    } while($this->rows_contatos = mysqli_fetch_assoc($this->result_contatos));

                    $listar->Executar();

                    return $listar->render;
                    
                         else :
                              return '...';
               
               endif;
          }
          
          
          protected function Coluna($row)
          {
               $col = new \Spw\Componentes\UI\Admin\Lista_AdicionarColunas();
               $col->Set_AtivarWrap(false);
               $col->Set_AlturaDaColuna('auto');
               $col->Set_AdicionarColuna(true, 'col_' . $row['id_pessoa'], '100%', 'left', $this->Descricao($row), '#', \Spw\Componentes\Ajax\Link::Modal('row_' . $row['id_pessoa'], 'pagina_editar_pessoa', array('id_pessoa' => $row['id_pessoa']) ));
               $col->Executar();
               
               return $col->render;
          }
          
          
          protected function Descricao($row)
          {
               $lista_telefone[] = ($row['telefone_principal']) ? $row['telefone_principal'] : null;
               $lista_telefone[] = ($row['telefone_alternativo']) ? $row['telefone_alternativo'] : null;
               
               $array[] = \Spw\Componentes\UI\Admin\Tipografia::Titulo_02($row['nome_completo']) ;
               $array[] = (!empty($lista_telefone)) ? join(', ', $lista_telefone) : null;
               $array[] = (!empty($row['email_principal'])) ? $row['email_principal'] : null;
               $array[] = (!empty($row['cidade'])) ? $row['cidade'] : null;
               
               if (!empty($array)) :
                    return \Spw\Componentes\UI\Admin\Tipografia::Descricao_01(  join('<br>', $array) );
               endif;
               
          }
          
          protected function BotaoInserir()
          {
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Inserir('bot-inserir', 'Inserir novo contato', null, \Spw\Componentes\Ajax\Link::Modal('bot-inserir', 'gatilho_inserir_pessoa', array('start' => 1) ));
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function PainelBotoes()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Botoes();
               $painel->Set_AdicionarBotao($this->BotaoInserir());
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function PainelMensagens()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $painel->Executar();
               
               return $painel->render;
          }
          
          protected function InputNome()
          {
               $input = new \Spw\Componentes\Html\Form_InputText();
               $input->Set_Exibir(true);
               $input->Set_Id('nome');
               $input->Set_Name('nome');
               $input->Set_Label('Por nome');
               $input->Set_Value(null);
               $input->Set_Placeholder($this->PesquisarNome());
               $input->Executar();
               
               return $input->render;
          }
          
          
          protected function BotaoPesquisar()
          {
               $bot = new \Spw\Componentes\Html\Form_InputButton();
               $bot->Set_Exibir(true);
               $bot->Set_Id('bot-pesquisar');
               $bot->Set_Name('bot-pesquisar');
               $bot->Set_Value('Aplicar');
               $bot->Executar();
               
               return $bot->render;
          }
          
          
          protected function BotaoLimpar()
          {
               
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Reset('bot-limpar', 'Limpar', '#', $this->AjaxLimpar());
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function PainelFiltro()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Filtro();
               $painel->Set_AdicionarCampo($this->InputNome());
               $painel->Set_AdicionarCampo($this->BotaoPesquisar());
               $painel->Set_AdicionarCampo($this->BotaoLimpar());
               $painel->Set_Form_Action( \Spw\Componentes\Modulo\Link::AbrirPagina('pessoas', 'listar-pessoas', array( 'nome' => $this->pesquisar_nome ) ) );
               $painel->Executar();
               
               return $painel->render;
          }
          
          protected function Painel()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
               $painel->Set_Titulo('Últimos contatos cadastrados.');
               $painel->Set_AdicionarConteudo($this->ListarContatos());
               $painel->Executar();
               
               return $painel->render;
               
          }
          
          protected function Pagina()
          {
               $pagina = new \Spw\Componentes\UI\Admin\Pagina();
               $pagina->Set_Titulo(SPW_PESSOAS_TITULO);
               $pagina->Set_Subtitulo('Contatos cadastrados');
               $pagina->Set_Navegacao_Ativar(true);
               $pagina->Set_Navegacao_Ajax_AdicionarLink('menu-home', 'Home', false, 'pagina_home', 'spw_pessoas', null, 'pagina');;
               $pagina->Set_Navegacao_Ajax_AdicionarLink('menu-listar-contatos', 'Contatos', true, 'pagina_listar_contatos', 'spw_pessoas', null, 'pagina');;
               $pagina->Set_AdicionarConteudo($this->PainelBotoes(), null);
               $pagina->Set_AdicionarConteudo($this->PainelFiltro(), null);
               $pagina->Set_AdicionarConteudo($this->PainelMensagens(), null);
               $pagina->Set_AdicionarConteudo($this->Painel(), null);
               $pagina->Set_AdicionarScript($this->AjaxPesquisar());
               $pagina->Executar();
               
               $this->view[] = $pagina->render;
          }
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //03
          public function Set_PesquisarPorNome($value)
          {
               $this->pesquisar_nome = $value;
          }
          
          
          public function Set_PesquisarPorIdCategoria($value)
          {
               $this->pesquisar_id_categoria = $value;
          }
          
          public function Get_Render()
          {
               return $this->render;
          }
          
          public function Executar()
          {
               $this->Dados();
               $this->Pagina();
               $this->Render();
          }
          
     }