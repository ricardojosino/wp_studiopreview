<?php

     namespace Aplicativos\Componentes;
     
     class ListarAplicativos
     {
          
          //01
          
          protected $result_apps;
          protected $rows_apps;
          
          protected $view;
          public $render;
          
          
          //02
          
          
          
          //03
          
          protected function Dados()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('value', 1);
               $dados->Set_AdicionarQuery("SELECT *");
               $dados->Set_AdicionarQuery("FROM spw_aplicativos a");
               $dados->Set_AdicionarQuery("WHERE a.lixeira = 'N'");
               $dados->Set_AdicionarQuery('ORDER BY a.titulo ASC');
               $dados->Executar();
               
               $this->result_apps = $dados->result;
               $this->rows_apps = $dados->rows;
               
          }
          
          
          protected function CheckInstalado($id_aplicativo)
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Start('value', $id_aplicativo);
               $dados->Set_Conectar();
               $dados->Set_AdicionarQuery("SELECT i.id_instalacao");
               $dados->Set_AdicionarQuery("FROM spw_aplicativos_instalados i");
               $dados->Set_AdicionarQuery("WHERE i.id_aplicativo = '$id_aplicativo'");
               $dados->Set_AdicionarQuery("LIMIT 1");
               $dados->Executar();
               
               if (!empty($dados->rows)) :
                    return $dados->rows['id_instalacao'];
               
                         else :
                              return false;
                    
               endif;
          }
          
          
          protected function AjaxLoad($botao_id, $callback_id, $parametros)
          {
               $ajax = new \Spw\Componentes\Ajax\Load();
               $ajax->Set_Botao_Id($botao_id);
               $ajax->Set_Callback_Id($callback_id);
               $ajax->Set_Action('spw_modulos_aplicativos_botao_instalacao');
               $ajax->Set_AddParametros( $parametros );
               $ajax->Executar();
               
               return $ajax->render;
          }
          
          
          
          protected function Icone($id_aplicativo)
          {
               $id_instalacao = $this->CheckInstalado($id_aplicativo);
               
               if ($id_instalacao) :
                    
                    return \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => 'icone_' . $id_aplicativo), \Spw\Componentes\Icones\BibliotecaFontAwesome::ToggleOn('app_on_' . $id_aplicativo, null, null, null, $this->AjaxLoad('app_on_' . $id_aplicativo, 'icone_' . $id_aplicativo, array('id_instalacao' => $id_instalacao, 'id_aplicativo' => $id_aplicativo, 'del' => 1, 'page' => $_GET['page']) )) );
               
                         else :
                              return \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => 'icone_' . $id_aplicativo), \Spw\Componentes\Icones\BibliotecaFontAwesome::ToggleOff('app_off_' . $id_aplicativo, null, null, null, $this->AjaxLoad('app_off_' . $id_aplicativo, 'icone_' . $id_aplicativo, array('id_aplicativo' => $id_aplicativo, 'start' => 'Y', 'page' => $_GET['page']) )) );
                    
               endif;
          }
          
          
          protected function Colunas($id_aplicativo, $titulo, $descricao)
          {
               $col = new \Spw\Componentes\UI\Admin\Lista_AdicionarColunas();
               $col->Set_AtivarWrap(true);
               $col->Set_AdicionarColuna(true, null, '100px', 'center', $this->Icone($id_aplicativo),null, null);
               $col->Set_AdicionarColuna(true, null, '100%', 'left', \Spw\Componentes\UI\Admin\Tipografia::Titulo_03($titulo) . \Spw\Componentes\UI\Admin\Tipografia::Descricao_01($descricao), null, null);
               $col->Executar();
               
               return $col->render;
          }
          
          
          protected function Listar()
          {
               $lista = new \Spw\Componentes\UI\Admin\Lista();
               do {
               $lista->Set_AdicionarItem(true, null, $this->Colunas($this->rows_apps['id_aplicativo'], $this->rows_apps['titulo'], $this->rows_apps['descricao']));
               } while($this->rows_apps = mysqli_fetch_assoc($this->result_apps));
               $lista->Executar();
               
               return $lista->render;
          }
          
          
          protected function PainelMensagem()
          {
               $painel_mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $painel_mensagem->Executar();
               
               return $painel_mensagem->render;
          }
          
          
          protected function PainelConteudo()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
               $painel->Set_Titulo('Instalação de aplicativos');
               $painel->Set_AdicionarConteudo( $this->Listar() );
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function Pagina()
          {
               $pagina = new \Spw\Componentes\UI\Admin\Pagina();
               $pagina->Set_Titulo(SPW_TITULO);
               $pagina->Set_Subtitulo('Aplicativos');
               $pagina->Set_Navegacao_Ativar(true);
               $pagina->Set_Navegacao_AdicionarLink(null, 'Home', \Spw\Componentes\Modulo\Link::AbrirPagina('home', 'pagina-inicial', null), true);
               $pagina->Set_Navegacao_AdicionarLink(null, 'Aplicativos', null, true);
               $pagina->Set_AdicionarConteudo($this->PainelMensagem(), 'spw-mensagem');
               $pagina->Set_AdicionarConteudo($this->PainelConteudo());
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