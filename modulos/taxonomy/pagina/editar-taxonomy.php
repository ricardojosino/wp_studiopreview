<?php
     $id_taxonomy = (isset($_GET['id_taxonomy']) ? $_GET['id_taxonomy'] : null );
     
     $dados = new \Spw\Componentes\Mysql\Selecionar();
     $dados->Set_Conectar();
     $dados->Set_Start('GET', 'id_taxonomy');
     $dados->Set_AdicionarQuery("select *");
     $dados->Set_AdicionarQuery("from spw_taxonomy t");
     $dados->Set_AdicionarQuery("where t.id_taxonomy = '$id_taxonomy' ");
     $dados->Set_AdicionarQuery("limit 1");
     $dados->Executar();
     
     $row = $dados->rows;
     
     $dados_post_types = new \Spw\Componentes\Mysql\Selecionar();
     $dados_post_types->Set_Conectar();
     $dados_post_types->Set_Start('value', 1);
     $dados_post_types->Set_AdicionarQuery("select post_type");
     $dados_post_types->Set_AdicionarQuery("from spw_post_type");
     $dados_post_types->Set_AdicionarQuery("where lixeira = 'N'");
     $dados_post_types->Set_AdicionarQuery("order by post_type asc");
     $dados_post_types->Executar();

     if (!empty($dados_post_types)) :

     do {
               $array_post_types[] = $dados_post_types->rows['post_type'];
     } while($dados_post_types->rows = mysqli_fetch_assoc($dados_post_types->result)); 
               else :
                    $array_post_types = null;
          
     endif;
     
     $array_post_types = array_merge($array_post_types, get_post_types( array('public' => true), 'names', 'and' ) );
     sort($array_post_types, SORT_STRING | SORT_FLAG_CASE);
     
     $campo_taxonomy = new \Spw\Componentes\Html\Form_InputText();
     $campo_taxonomy->Set_Exibir(true);
     $campo_taxonomy->Set_Id('taxonomy');
     $campo_taxonomy->Set_Name('taxonomy');
     $campo_taxonomy->Set_Label('taxonomy');
     $campo_taxonomy->Set_Require(true);
     $campo_taxonomy->Set_Value($row['taxonomy']);
     $campo_taxonomy->Executar();
     
     $campo_post_type = new \Spw\Componentes\Html\Form_Select();
     $campo_post_type->Set_Exibir(true);
     $campo_post_type->Set_Id('post_type');
     $campo_post_type->Set_Name('post_type');
     $campo_post_type->Set_Label('post_type');
     $campo_post_type->Set_Required(true);
     $campo_post_type->Set_ValueDefault($row['post_type']);
     
     $campo_post_type->Set_AddOption('', 'Vazio');
     
     if (!empty($array_post_types)) :
     
          foreach($array_post_types AS $item) :
               $campo_post_type->Set_AddOption( $item , $item);
          endforeach;
     
     endif;
     
     $campo_post_type->Executar();
     
     $campo_hierarchical = new \Spw\Componentes\Html\Form_Select();
     $campo_hierarchical->Set_Exibir(true);
     $campo_hierarchical->Set_Id('hierarchical');
     $campo_hierarchical->Set_Name('hierarchical');
     $campo_hierarchical->Set_Label('hierarchical');
     $campo_hierarchical->Set_Required(true);
     $campo_hierarchical->Set_ValueDefault($row['hierarchical']);
     $campo_hierarchical->Set_AddOption('Y', 'Sim');
     $campo_hierarchical->Set_AddOption('N', 'Não');
     $campo_hierarchical->Executar();
     
     $campo_show_ui = new \Spw\Componentes\Html\Form_Select();
     $campo_show_ui->Set_Exibir(true);
     $campo_show_ui->Set_Id('show_ui');
     $campo_show_ui->Set_Name('show_ui');
     $campo_show_ui->Set_Label('show_ui');
     $campo_show_ui->Set_Required(true);
     $campo_show_ui->Set_ValueDefault($row['show_ui']);
     $campo_show_ui->Set_AddOption('Y', 'Sim');
     $campo_show_ui->Set_AddOption('N', 'Não');
     $campo_show_ui->Executar();
     
     $campo_show_in_tag_cloud = new \Spw\Componentes\Html\Form_Select();
     $campo_show_in_tag_cloud->Set_Exibir(true);
     $campo_show_in_tag_cloud->Set_Id('show_in_tag_cloud');
     $campo_show_in_tag_cloud->Set_Name('show_in_tag_cloud');
     $campo_show_in_tag_cloud->Set_Label('show_in_tag_cloud');
     $campo_show_in_tag_cloud->Set_Required(true);
     $campo_show_in_tag_cloud->Set_ValueDefault($row['show_in_tag_cloud']);
     $campo_show_in_tag_cloud->Set_AddOption('Y', 'Sim');
     $campo_show_in_tag_cloud->Set_AddOption('N', 'Não');
     $campo_show_in_tag_cloud->Executar();
     
     $campo_show_tagcloud = new \Spw\Componentes\Html\Form_Select();
     $campo_show_tagcloud->Set_Exibir(true);
     $campo_show_tagcloud->Set_Id('show_tag_cloud');
     $campo_show_tagcloud->Set_Name('show_tag_cloud');
     $campo_show_tagcloud->Set_Label('show_tag_cloud');
     $campo_show_tagcloud->Set_Required(true);
     $campo_show_tagcloud->Set_ValueDefault($row['show_tag_cloud']);
     $campo_show_tagcloud->Set_AddOption('Y', 'Sim');
     $campo_show_tagcloud->Set_AddOption('N', 'Não');
     $campo_show_tagcloud->Executar();
     
     $campo_show_in_nav_menus = new \Spw\Componentes\Html\Form_Select();
     $campo_show_in_nav_menus->Set_Exibir(true);
     $campo_show_in_nav_menus->Set_Id('show_in_nav_menus');
     $campo_show_in_nav_menus->Set_Name('show_in_nav_menus');
     $campo_show_in_nav_menus->Set_Label('show_in_nav_menus');
     $campo_show_in_nav_menus->Set_Required(true);
     $campo_show_in_nav_menus->Set_ValueDefault($row['show_in_nav_menus']);
     $campo_show_in_nav_menus->Set_AddOption('Y', 'Sim');
     $campo_show_in_nav_menus->Set_AddOption('N', 'Não');
     $campo_show_in_nav_menus->Executar();
     
     $campo_show_admin_column = new \Spw\Componentes\Html\Form_Select();
     $campo_show_admin_column->Set_Exibir(true);
     $campo_show_admin_column->Set_Id('show_admin_column');
     $campo_show_admin_column->Set_Name('show_admin_column');
     $campo_show_admin_column->Set_Label('show_admin_column');
     $campo_show_admin_column->Set_Required(true);
     $campo_show_admin_column->Set_ValueDefault($row['show_admin_column']);
     $campo_show_admin_column->Set_AddOption('Y', 'Sim');
     $campo_show_admin_column->Set_AddOption('N', 'Não');
     $campo_show_admin_column->Executar();
     
     $campo_query_var = new \Spw\Componentes\Html\Form_Select();
     $campo_query_var->Set_Exibir(true);
     $campo_query_var->Set_Id('query_var');
     $campo_query_var->Set_Name('query_var');
     $campo_query_var->Set_Label('query_var');
     $campo_query_var->Set_Required(true);
     $campo_query_var->Set_ValueDefault($row['query_var']);
     $campo_query_var->Set_AddOption('Y', 'Sim');
     $campo_query_var->Set_AddOption('N', 'Não');
     $campo_query_var->Executar();
     
     $campo_rewrite = new \Spw\Componentes\Html\Form_Select();
     $campo_rewrite->Set_Exibir(true);
     $campo_rewrite->Set_Id('rewrite');
     $campo_rewrite->Set_Name('rewrite');
     $campo_rewrite->Set_Label('rewrite');
     $campo_rewrite->Set_Required(true);
     $campo_rewrite->Set_ValueDefault($row['rewrite']);
     $campo_rewrite->Set_AddOption('Y', 'Sim');
     $campo_rewrite->Set_AddOption('N', 'Não');
     $campo_rewrite->Executar();
     
     $campo_slug = new \Spw\Componentes\Html\Form_InputText();
     $campo_slug->Set_Exibir(true);
     $campo_slug->Set_Id('slug');
     $campo_slug->Set_Name('slug');
     $campo_slug->Set_Label('slug');
     $campo_slug->Set_Require(false);
     $campo_slug->Set_Value($row['slug']);
     $campo_slug->Executar();
     
     $campo_meta_box_cb = new \Spw\Componentes\Html\Form_InputText();
     $campo_meta_box_cb->Set_Exibir(true);
     $campo_meta_box_cb->Set_Id('meta_box_cb');
     $campo_meta_box_cb->Set_Name('meta_box_cb');
     $campo_meta_box_cb->Set_Label('meta_box_cb');
     $campo_meta_box_cb->Set_Require(false);
     $campo_meta_box_cb->Set_Value($row['meta_box_cb']);
     $campo_meta_box_cb->Executar();
     
     $campo_labels_name = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_name->Set_Exibir(true);
     $campo_labels_name->Set_Id('labels_name');
     $campo_labels_name->Set_Name('labels_name');
     $campo_labels_name->Set_Label('labels_name');
     $campo_labels_name->Set_Placeholder('Padrão');
     $campo_labels_name->Set_Require(false);
     $campo_labels_name->Set_Value($row['labels_name']);
     $campo_labels_name->Executar();
     
     $campo_labels_menu_name = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_menu_name->Set_Exibir(true);
     $campo_labels_menu_name->Set_Id('labels_menu_name');
     $campo_labels_menu_name->Set_Name('labels_menu_name');
     $campo_labels_menu_name->Set_Label('labels_menu_name');
     $campo_labels_menu_name->Set_Placeholder('Padrão');
     $campo_labels_menu_name->Set_Require(false);
     $campo_labels_menu_name->Set_Value($row['labels_menu_name']);
     $campo_labels_menu_name->Executar();
     
     $campo_labels_update_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_update_item->Set_Exibir(true);
     $campo_labels_update_item->Set_Id('labels_update_item');
     $campo_labels_update_item->Set_Name('labels_update_item');
     $campo_labels_update_item->Set_Label('labels_update_item');
     $campo_labels_update_item->Set_Placeholder('Padrão');
     $campo_labels_update_item->Set_Require(false);
     $campo_labels_update_item->Set_Value($row['labels_update_item']);
     $campo_labels_update_item->Executar();
     
     $campo_labels_add_new_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_add_new_item->Set_Exibir(true);
     $campo_labels_add_new_item->Set_Id('labels_add_new_item');
     $campo_labels_add_new_item->Set_Name('labels_add_new_item');
     $campo_labels_add_new_item->Set_Label('labels_add_new_item');
     $campo_labels_add_new_item->Set_Placeholder('Padrão');
     $campo_labels_add_new_item->Set_Require(false);
     $campo_labels_add_new_item->Set_Value($row['labels_add_new_item']);
     $campo_labels_add_new_item->Executar();
     
     $campo_labels_singular_name = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_singular_name->Set_Exibir(true);
     $campo_labels_singular_name->Set_Id('labels_singular_name');
     $campo_labels_singular_name->Set_Name('labels_singular_name');
     $campo_labels_singular_name->Set_Label('labels_singular_name');
     $campo_labels_singular_name->Set_Placeholder('Padrão');
     $campo_labels_singular_name->Set_Require(false);
     $campo_labels_singular_name->Set_Value($row['labels_singular_name']);
     $campo_labels_singular_name->Executar();
     
     $campo_labels_add_new = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_add_new->Set_Exibir(true);
     $campo_labels_add_new->Set_Id('labels_add_new');
     $campo_labels_add_new->Set_Name('labels_add_new');
     $campo_labels_add_new->Set_Label('labels_add_new');
     $campo_labels_add_new->Set_Placeholder('Padrão');
     $campo_labels_add_new->Set_Require(false);
     $campo_labels_add_new->Set_Value($row['labels_add_new']);
     $campo_labels_add_new->Executar();
     
     $campo_labels_edit_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_edit_item->Set_Exibir(true);
     $campo_labels_edit_item->Set_Id('labels_edit_item');
     $campo_labels_edit_item->Set_Name('labels_edit_item');
     $campo_labels_edit_item->Set_Label('labels_edit_item');
     $campo_labels_edit_item->Set_Placeholder('Padrão');
     $campo_labels_edit_item->Set_Require(false);
     $campo_labels_edit_item->Set_Value($row['labels_edit_item']);
     $campo_labels_edit_item->Executar();
     
     $campo_labels_new_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_new_item->Set_Exibir(true);
     $campo_labels_new_item->Set_Id('labels_new_item');
     $campo_labels_new_item->Set_Name('labels_new_item');
     $campo_labels_new_item->Set_Label('labels_new_item');
     $campo_labels_new_item->Set_Placeholder('Padrão');
     $campo_labels_new_item->Set_Require(false);
     $campo_labels_new_item->Set_Value($row['labels_new_item']);
     $campo_labels_new_item->Executar();
     
     $campo_labels_view_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_view_item->Set_Exibir(true);
     $campo_labels_view_item->Set_Id('labels_view_item');
     $campo_labels_view_item->Set_Name('labels_view_item');
     $campo_labels_view_item->Set_Label('labels_view_item');
     $campo_labels_view_item->Set_Placeholder('Padrão');
     $campo_labels_view_item->Set_Require(false);
     $campo_labels_view_item->Set_Value($row['labels_view_item']);
     $campo_labels_view_item->Executar();
     
     $campo_labels_search_items = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_search_items->Set_Exibir(true);
     $campo_labels_search_items->Set_Id('labels_search_items');
     $campo_labels_search_items->Set_Name('labels_search_items');
     $campo_labels_search_items->Set_Label('labels_search_items');
     $campo_labels_search_items->Set_Placeholder('Padrão');
     $campo_labels_search_items->Set_Require(false);
     $campo_labels_search_items->Set_Value($row['labels_search_items']);
     $campo_labels_search_items->Executar();
     
     $campo_labels_not_found = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_not_found->Set_Exibir(true);
     $campo_labels_not_found->Set_Id('labels_not_found');
     $campo_labels_not_found->Set_Name('labels_not_found');
     $campo_labels_not_found->Set_Label('labels_not_found');
     $campo_labels_not_found->Set_Placeholder('Padrão');
     $campo_labels_not_found->Set_Require(false);
     $campo_labels_not_found->Set_Value($row['labels_not_found']);
     $campo_labels_not_found->Executar();
     
     $campo_page = new \Spw\Componentes\Html\Form_InputHidden();
     $campo_page->Set_Exibir(true);
     $campo_page->Set_Id('page');
     $campo_page->Set_Name('page');
     $campo_page->Set_Value($_GET['page']);
     $campo_page->Executar();
     
     $campo_id_taxonomy = new \Spw\Componentes\Html\Form_InputHidden();
     $campo_id_taxonomy->Set_Exibir(true);
     $campo_id_taxonomy->Set_Id('id_taxonomy');
     $campo_id_taxonomy->Set_Name('id_taxonomy');
     $campo_id_taxonomy->Set_Value($_GET['id_taxonomy']);
     $campo_id_taxonomy->Executar();
     
     $botao_salvar = new \Spw\Componentes\Html\Form_InputSubmit();
     $botao_salvar->Set_Exibir(true);
     $botao_salvar->Set_Id('submit');
     $botao_salvar->Set_Name('submit');
     $botao_salvar->Set_Value('Salvar');
     $botao_salvar->Executar();
     
     $botao_confirmar_excluir = new \Spw\Componentes\UI\Admin\Botao();
     $botao_confirmar_excluir->Set_AdicionarBotao_Excluir('bot-confirmar', 'Confirmar', \Spw\Componentes\Modulo\Link::ExecutarGatilho('taxonomy', 'excluir-taxonomy', 'id_taxonomy=' . $_GET['id_taxonomy']), null);
     $botao_confirmar_excluir->Executar();
     
     $pop_excluir = new \Spw\Componentes\UI\Admin\Pop();
     $pop_excluir->Set_Titulo('Excluir');
     $pop_excluir->Set_Pop_Id('pop-excluir');
     $pop_excluir->Set_BotaoAbrir_Id('bot-excluir');
     $pop_excluir->Set_AdicionarConteudo('<p>Deseja mesmo excluir esta taxonomia?</p>');
     $pop_excluir->Set_AdicionarConteudo($botao_confirmar_excluir->render);
     $pop_excluir->Executar();
     
     $botao_excluir = new \Spw\Componentes\UI\Admin\Botao();
     $botao_excluir->Set_AdicionarBotao_Excluir('bot-excluir', 'Excluir', null, $pop_excluir->render);
     $botao_excluir->Executar();
     
     $painel_mensagens = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
     $painel_mensagens->Executar();
     
     $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
     $painel->Set_Titulo('Configuração');
     $painel->Set_AdicionarConteudo($campo_post_type->render);
     $painel->Set_AdicionarConteudo($campo_taxonomy->render);
     $painel->Set_AdicionarConteudo($campo_hierarchical->render);
     $painel->Set_AdicionarConteudo($campo_show_ui->render);
     $painel->Set_AdicionarConteudo($campo_show_in_tag_cloud->render);
     $painel->Set_AdicionarConteudo($campo_show_tagcloud->render);
     $painel->Set_AdicionarConteudo($campo_show_in_nav_menus->render);
     $painel->Set_AdicionarConteudo($campo_show_admin_column->render);
     $painel->Set_AdicionarConteudo($campo_query_var->render);
     $painel->Set_AdicionarConteudo($campo_rewrite->render);
     $painel->Set_AdicionarConteudo($campo_slug->render);
     $painel->Set_AdicionarConteudo($campo_meta_box_cb->render);
     $painel->Set_AdicionarConteudo($campo_page->render);
     $painel->Set_AdicionarConteudo($campo_id_taxonomy->render);
     $painel->Executar();
     
     $painel_labels = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
     $painel_labels->Set_Titulo('Labels');
     $painel_labels->Set_AdicionarConteudo($campo_labels_name->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_menu_name->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_singular_name->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_update_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_add_new_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_add_new->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_edit_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_new_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_view_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_search_items->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_not_found->render);
     $painel_labels->Executar();
     
     $painel_botoes = new \Spw\Componentes\UI\Admin\Painel_Botoes();
     $painel_botoes->Set_AdicionarBotao($botao_salvar->render);
     $painel_botoes->Set_AdicionarBotao($botao_excluir->render);
     $painel_botoes->Executar();
     
     $bloco = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
     $bloco->Set_AdicionarConteudo(null, $painel_mensagens->render, 0, 0);
     $bloco->Set_AdicionarConteudo(null, $painel->render, 0, 0);
     $bloco->Set_AdicionarConteudo(null, $painel_labels->render, 0, 0);
     $bloco->Set_AdicionarConteudo(null, $painel_botoes->render, 0, 0);
     $bloco->Executar();
     
     $pagina = new \Spw\Componentes\UI\Admin\Pagina();
     $pagina->Set_AdicionarConteudo($bloco->render, null);
     $pagina->Set_Titulo(SPW_TITULO);
     $pagina->Set_Subtitulo('Taxonomy');
     $pagina->Set_Form_Exibir(true);
     $pagina->Set_Form_Method('POST');
     $pagina->Set_Form_Name('editar');
     $pagina->Set_Form_Action( \Spw\Componentes\Modulo\Link::ExecutarGatilho('taxonomy', 'update-taxonomy', null) );
     $pagina->Set_Navegacao_Ativar(true);
     $pagina->Set_Navegacao_AdicionarLink(null, 'Home', \Spw\Componentes\Modulo\Link::AbrirPagina('home', 'pagina-inicial', null), false);
     $pagina->Set_Navegacao_AdicionarLink(null, 'Lista de taxonomias', \Spw\Componentes\Modulo\Link::AbrirPagina('taxonomy', 'home', null), false);
     $pagina->Set_Navegacao_AdicionarLink(null, 'Editando', null, true);
     $pagina->Executar();
     
     \Spw\Componentes\Funcoes::Show($pagina->render);