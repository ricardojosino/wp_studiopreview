<?php
     
     $dados = new \Spw\Componentes\Mysql\Query();
     $dados->Set_Conectar();
     $dados->Set_Start('GET', 'id_post_type');
     $dados->Set_AdicionarDadosSql('post-type', 'post-type', array('{id_post_type}'), array($_GET['id_post_type']));
     $dados->Executar();
     
     $campo_post_type = new \Spw\Componentes\Html\Form_InputText();
     $campo_post_type->Set_Exibir(true);
     $campo_post_type->Set_Name('post_type');
     $campo_post_type->Set_Label('Post Type');
     $campo_post_type->Set_Require(true);
     $campo_post_type->Set_Value( $dados->rows['post_type'] );
     $campo_post_type->Executar();
     
     $campo_public = new \Spw\Componentes\Html\Form_Select();
     $campo_public->Set_Exibir(true);
     $campo_public->Set_Name('public');
     $campo_public->Set_Required(true);
     $campo_public->Set_Label('Deixar público (Public)');
     $campo_public->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['public'] , 'Y') );
     $campo_public->Set_AddOption('Y', 'Sim');
     $campo_public->Set_AddOption('N', 'Não');
     $campo_public->Executar();
     
     $campo_publicly_queryable = new \Spw\Componentes\Html\Form_Select();
     $campo_publicly_queryable->Set_Exibir(true);
     $campo_publicly_queryable->Set_Name('publicly_queryable');
     $campo_publicly_queryable->Set_Required(true);
     $campo_publicly_queryable->Set_Label('Disponível para consulta no front-end. (publicly_queryable)');
     $campo_publicly_queryable->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['publicly_queryable'] , 'Y') );
     $campo_publicly_queryable->Set_AddOption('Y', 'Sim');
     $campo_publicly_queryable->Set_AddOption('N', 'Não');
     $campo_publicly_queryable->Executar();
     
     $campo_show_ui = new \Spw\Componentes\Html\Form_Select();
     $campo_show_ui->Set_Exibir(true);
     $campo_show_ui->Set_Name('show_ui');
     $campo_show_ui->Set_Required(true);
     $campo_show_ui->Set_Label('Gerar uma interface? (show_ui)');
     $campo_show_ui->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['show_ui'] , 'Y') );
     $campo_show_ui->Set_AddOption('Y', 'Sim');
     $campo_show_ui->Set_AddOption('N', 'Não');
     $campo_show_ui->Executar();
     
     $campo_show_in_menu = new \Spw\Componentes\Html\Form_Select();
     $campo_show_in_menu->Set_Exibir(true);
     $campo_show_in_menu->Set_Name('show_in_menu');
     $campo_show_in_menu->Set_Required(true);
     $campo_show_in_menu->Set_Label('Exibir no menu do dashboard? (show_in_menu)');
     $campo_show_in_menu->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['show_in_menu'] , 'Y') );
     $campo_show_in_menu->Set_AddOption('Y', 'Sim');
     $campo_show_in_menu->Set_AddOption('N', 'Não');
     $campo_show_in_menu->Executar();
     
     $campo_show_in_nav_menus = new \Spw\Componentes\Html\Form_Select();
     $campo_show_in_nav_menus->Set_Exibir(true);
     $campo_show_in_nav_menus->Set_Name('show_in_nav_menus');
     $campo_show_in_nav_menus->Set_Required(true);
     $campo_show_in_nav_menus->Set_Label('Disponível para inserir no menu do site? (show_in_nav_menus)');
     $campo_show_in_nav_menus->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['show_in_nav_menus'] , 'Y') );
     $campo_show_in_nav_menus->Set_AddOption('Y', 'Sim');
     $campo_show_in_nav_menus->Set_AddOption('N', 'Não');
     $campo_show_in_nav_menus->Executar();
     
     $campo_show_in_admin_bar = new \Spw\Componentes\Html\Form_Select();
     $campo_show_in_admin_bar->Set_Exibir(true);
     $campo_show_in_admin_bar->Set_Name('show_in_admin_bar');
     $campo_show_in_admin_bar->Set_Required(true);
     $campo_show_in_admin_bar->Set_Label('Exibir no menu administrativo do dashboard? (show_in_admin_bar)');
     $campo_show_in_admin_bar->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['show_in_admin_bar'] , 'Y') );
     $campo_show_in_admin_bar->Set_AddOption('Y', 'Sim');
     $campo_show_in_admin_bar->Set_AddOption('N', 'Não');
     $campo_show_in_admin_bar->Executar();
     
     $campo_menu_position = new \Spw\Componentes\Html\Form_InputNumber();
     $campo_menu_position->Set_Exibir(true);
     $campo_menu_position->Set_Name('menu_position');
     $campo_menu_position->Set_Required(true);
     $campo_menu_position->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['menu_position'] , 5) );
     $campo_menu_position->Set_Label('Posição no dashboard. (menu_position)');
     $campo_menu_position->Executar();
     
     $campo_menu_icon = new \Spw\Componentes\Html\Form_InputText();
     $campo_menu_icon->Set_Exibir(true);
     $campo_menu_icon->Set_Name('menu_icon');
     $campo_menu_icon->Set_Require(false);
     $campo_menu_icon->Set_Value( $dados->rows['menu_icon'] );
     $campo_menu_icon->Set_Label('Url do ícone. (menu_icon)');
     $campo_menu_icon->Set_Placeholder('Padrão');
     $campo_menu_icon->Executar();
     
     $campo_capability_type = new \Spw\Componentes\Html\Form_InputText();
     $campo_capability_type->Set_Exibir(true);
     $campo_capability_type->Set_Name('capability_type');
     $campo_capability_type->Set_Require(true);
     $campo_capability_type->Set_Label('Tipo de estrutura de conteúdo. post ou page. (capability_type)');
     $campo_capability_type->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['capability_type'] , 'post') );
     $campo_capability_type->Executar();
     
     $campo_hierarchical = new \Spw\Componentes\Html\Form_Select();
     $campo_hierarchical->Set_Exibir(true);
     $campo_hierarchical->Set_Name('hierarchical');
     $campo_hierarchical->Set_Required(true);
     $campo_hierarchical->Set_Label('Se o tipo de postagem é hierárquico. Utilizado apenas em páginas. (hierarchical)');
     $campo_hierarchical->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['hierarchical'] , 'N') );
     $campo_hierarchical->Set_AddOption('Y', 'Sim');
     $campo_hierarchical->Set_AddOption('N', 'Não');
     $campo_hierarchical->Executar();
     
     $campo_has_archive = new \Spw\Componentes\Html\Form_Select();
     $campo_has_archive->Set_Exibir(true);
     $campo_has_archive->Set_Name('has_archive');
     $campo_has_archive->Set_Required(true);
     $campo_has_archive->Set_Label('É do tipo archive. (has_archive)');
     $campo_has_archive->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['has_archive'] , 'Y') );
     $campo_has_archive->Set_AddOption('Y', 'Sim');
     $campo_has_archive->Set_AddOption('N', 'Não');
     $campo_has_archive->Executar();
     
     $campo_rewrite = new \Spw\Componentes\Html\Form_Select();
     $campo_rewrite->Set_Exibir(true);
     $campo_rewrite->Set_Name('rewrite');
     $campo_rewrite->Set_Required(true);
     $campo_rewrite->Set_Label('Reescrever slug na url? (rewrite)');
     $campo_rewrite->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['rewrite'] , 'Y') );
     $campo_rewrite->Set_AddOption('Y', 'Sim');
     $campo_rewrite->Set_AddOption('N', 'Não');
     $campo_rewrite->Executar();
     
     $campo_rewrite_slug = new \Spw\Componentes\Html\Form_InputText();
     $campo_rewrite_slug->Set_Exibir(true);
     $campo_rewrite_slug->Set_Name('rewrite_slug');
     $campo_rewrite_slug->Set_Require(false);
     $campo_rewrite_slug->Set_Value( $dados->rows['rewrite_slug'] );
     $campo_rewrite_slug->Set_Label('Reescrever slug. (slug)');
     $campo_rewrite_slug->Set_Placeholder('Vazio');
     $campo_rewrite_slug->Executar();
     
     $campo_query_var = new \Spw\Componentes\Html\Form_Select();
     $campo_query_var->Set_Exibir(true);
     $campo_query_var->Set_Name('query_var');
     $campo_query_var->Set_Required(true);
     $campo_query_var->Set_Label('Disponível na query principal? (query_var)');
     $campo_query_var->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao( $dados->rows['query_var'] , 'Y') );
     $campo_query_var->Set_AddOption('Y', 'Sim');
     $campo_query_var->Set_AddOption('N', 'Não');
     $campo_query_var->Executar();
     
     $campo_labels_name = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_name->Set_Exibir(true);
     $campo_labels_name->Set_Name('labels_name');
     $campo_labels_name->Set_Require(false);
     $campo_labels_name->Set_Value( $dados->rows['labels_name'] );
     $campo_labels_name->Set_Label('Nome geral. (name)');
     $campo_labels_name->Set_Placeholder('Padrão');
     $campo_labels_name->Executar();
     
     $campo_labels_singular_name = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_singular_name->Set_Exibir(true);
     $campo_labels_singular_name->Set_Name('labels_singular_name');
     $campo_labels_singular_name->Set_Require(false);
     $campo_labels_singular_name->Set_Value( $dados->rows['labels_singular_name'] );
     $campo_labels_singular_name->Set_Label('Nome do objeto. (singular_name)');
     $campo_labels_singular_name->Set_Placeholder('Padrão');
     $campo_labels_singular_name->Executar();
     
     $campo_labels_add_new = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_add_new->Set_Exibir(true);
     $campo_labels_add_new->Set_Name('labels_add_new');
     $campo_labels_add_new->Set_Require(false);
     $campo_labels_add_new->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_add_new'], 'Inserir') );
     $campo_labels_add_new->Set_Label('Rótulo para inserir. (add_new)');
     $campo_labels_add_new->Executar();
     
     $campo_labels_add_new_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_add_new_item->Set_Exibir(true);
     $campo_labels_add_new_item->Set_Name('labels_add_new_item');
     $campo_labels_add_new_item->Set_Require(false);
     $campo_labels_add_new_item->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_add_new_item'], 'Inserir item') );
     $campo_labels_add_new_item->Set_Label('Rótulo para inserir item. (add_new_item)');
     $campo_labels_add_new_item->Executar();
     
     $campo_labels_edit_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_edit_item->Set_Exibir(true);
     $campo_labels_edit_item->Set_Name('labels_edit_item');
     $campo_labels_edit_item->Set_Require(false);
     $campo_labels_edit_item->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_edit_item'], 'Editar') );
     $campo_labels_edit_item->Set_Label( 'Rótulo para editar item. (edit_item)');
     $campo_labels_edit_item->Executar();
     
     $campo_labels_new_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_new_item->Set_Exibir(true);
     $campo_labels_new_item->Set_Name('labels_new_item');
     $campo_labels_new_item->Set_Require(false);
     $campo_labels_new_item->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_new_item'], 'Novo item') );
     $campo_labels_new_item->Set_Label('Rótulo para novo item. (new_item)');
     $campo_labels_new_item->Executar();
     
     $campo_labels_view_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_view_item->Set_Exibir(true);
     $campo_labels_view_item->Set_Name('labels_view_item');
     $campo_labels_view_item->Set_Require(false);
     $campo_labels_view_item->Set_Label('Rótulo para visualizar item. Singular. (view_item)');
     $campo_labels_view_item->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_view_item'], 'Visualizar') );
     $campo_labels_view_item->Executar();
     
     $campo_labels_view_items = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_view_items->Set_Exibir(true);
     $campo_labels_view_items->Set_Name('labels_view_items');
     $campo_labels_view_items->Set_Require(false);
     $campo_labels_view_items->Set_Label('Rótulo para visualizar itens. Plural. (view_items)');
     $campo_labels_view_items->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_view_items'], 'Visualizar') );
     $campo_labels_view_items->Executar();
     
     $campo_labels_search_items = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_search_items->Set_Exibir(true);
     $campo_labels_search_items->Set_Name('labels_search_items');
     $campo_labels_search_items->Set_Require(false);
     $campo_labels_search_items->Set_Label('Rótulo procurar itens. (search_items)');
     $campo_labels_search_items->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_search_items'], 'Procurar') );
     $campo_labels_search_items->Executar();
     
     $campo_labels_not_found = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_not_found->Set_Exibir(true);
     $campo_labels_not_found->Set_Name('labels_not_found');
     $campo_labels_not_found->Set_Require(false);
     $campo_labels_not_found->Set_Label('Rótulo para o texto não encontrado. (not_found)');
     $campo_labels_not_found->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_not_found'], 'Não encontramos nenhum registro.') );
     $campo_labels_not_found->Executar();
     
     $campo_labels_not_found_in_trash = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_not_found_in_trash->Set_Exibir(true);
     $campo_labels_not_found_in_trash->Set_Name('labels_not_found_in_trash');
     $campo_labels_not_found_in_trash->Set_Require(false);
     $campo_labels_not_found_in_trash->Set_Label('Rótulo para texto de registros não encontrado na lixeira. (not_found_in_trash)');
     $campo_labels_not_found_in_trash->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_not_found_in_trash'], 'Não encontramos registro na lixeira') );
     $campo_labels_not_found_in_trash->Executar();
     
     $campo_labels_all_items = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_all_items->Set_Exibir(true);
     $campo_labels_all_items->Set_Name('labels_all_items');
     $campo_labels_all_items->Set_Require(false);
     $campo_labels_all_items->Set_Label('Rótulo para o texto Todos os itens. (all_items)');
     $campo_labels_all_items->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_all_items'], 'Todos') );
     $campo_labels_all_items->Executar();
     
     $campo_labels_archives = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_archives->Set_Exibir(true);
     $campo_labels_archives->Set_Name('labels_archives');
     $campo_labels_archives->Set_Require(false);
     $campo_labels_archives->Set_Label('O rótulo do arquivo do post type usado nos menus de navegação.  (archives)');
     $campo_labels_archives->Set_Value( $dados->rows['labels_archives'] );
     $campo_labels_archives->Set_Placeholder('Padrão');
     $campo_labels_archives->Executar();
     
     $campo_labels_attributes = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_attributes->Set_Exibir(true);
     $campo_labels_attributes->Set_Name('labels_attributes');
     $campo_labels_attributes->Set_Require(false);
     $campo_labels_attributes->Set_Label('Rótulo para o box atributos da página. (attributes)');
     $campo_labels_attributes->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_attributes'], 'Atributos da página') );
     $campo_labels_attributes->Executar();
     
     $campo_labels_insert_into_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_insert_into_item->Set_Exibir(true);
     $campo_labels_insert_into_item->Set_Name('labels_insert_into_item');
     $campo_labels_insert_into_item->Set_Require(false);
     $campo_labels_insert_into_item->Set_Label('Rótulo para inserir mídia no box de mídias. (insert_into_item)');
     $campo_labels_insert_into_item->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_insert_into_item'], 'Inserir no post') );
     $campo_labels_insert_into_item->Executar();
     
     $campo_labels_uploaded_to_this_item = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_uploaded_to_this_item->Set_Exibir(true);
     $campo_labels_uploaded_to_this_item->Set_Name('labels_uploaded_to_this_item');
     $campo_labels_uploaded_to_this_item->Set_Require(false);
     $campo_labels_uploaded_to_this_item->Set_Label('Rótulo mensagem de mídia enviada ao post. (uploaded_to_this_item)');
     $campo_labels_uploaded_to_this_item->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_uploaded_to_this_item'], 'Enviado para esta postagem') );
     $campo_labels_uploaded_to_this_item->Executar();
     
     $campo_labels_featured_image = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_featured_image->Set_Exibir(true);
     $campo_labels_featured_image->Set_Name('labels_featured_image');
     $campo_labels_featured_image->Set_Require(false);
     $campo_labels_featured_image->Set_Label('Rótulo para a imagem do post. (featured_image)');
     $campo_labels_featured_image->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_featured_image'], 'Imagem do post') );
     $campo_labels_featured_image->Executar();
     
     $campo_labels_set_featured_image = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_set_featured_image->Set_Exibir(true);
     $campo_labels_set_featured_image->Set_Name('labels_set_featured_image');
     $campo_labels_set_featured_image->Set_Require(false);
     $campo_labels_set_featured_image->Set_Label('Rótulo para o texto definir imagem. (set_featured_image)');
     $campo_labels_set_featured_image->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_set_featured_image'], 'Definir imagem') );
     $campo_labels_set_featured_image->Executar();
     
     $campo_labels_remove_featured_image = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_remove_featured_image->Set_Exibir(true);
     $campo_labels_remove_featured_image->Set_Name('labels_remove_featured_image');
     $campo_labels_remove_featured_image->Set_Require(false);
     $campo_labels_remove_featured_image->Set_Label('Rótulo remover imagem. (remove_featured_image)');
     $campo_labels_remove_featured_image->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_remove_featured_image'], 'Remover imagem') );
     $campo_labels_remove_featured_image->Executar();
     
     $campo_labels_use_featured_image = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_use_featured_image->Set_Exibir(true);
     $campo_labels_use_featured_image->Set_Name('labels_use_featured_image');
     $campo_labels_use_featured_image->Set_Require(false);
     $campo_labels_use_featured_image->Set_Label('Rótulo para o texto use esta imagem. (use_featured_image)');
     $campo_labels_use_featured_image->Set_Value( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['labels_use_featured_image'], 'Utilizar esta imagem') );
     $campo_labels_use_featured_image->Executar();
     
     $campo_labels_menu_name = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_menu_name->Set_Exibir(true);
     $campo_labels_menu_name->Set_Name('labels_menu_name');
     $campo_labels_menu_name->Set_Require(false);
     $campo_labels_menu_name->Set_Label('Rótulo para o nome que exibe no menu. (menu_name)');
     $campo_labels_menu_name->Set_Value($dados->rows['labels_menu_name']);
     $campo_labels_menu_name->Set_Placeholder('Padrão');
     $campo_labels_menu_name->Executar();
     
     $campo_labels_filter_items_list = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_filter_items_list->Set_Exibir(true);
     $campo_labels_filter_items_list->Set_Name('labels_filter_items_list');
     $campo_labels_filter_items_list->Set_Require(false);
     $campo_labels_filter_items_list->Set_Label('labels_filter_items_list');
     $campo_labels_filter_items_list->Set_Value($dados->rows['labels_filter_items_list']);
     $campo_labels_filter_items_list->Set_Placeholder('Padrão');
     $campo_labels_filter_items_list->Executar();
     
     $campo_labels_items_list_navigation = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_items_list_navigation->Set_Exibir(true);
     $campo_labels_items_list_navigation->Set_Name('labels_items_list_navigation');
     $campo_labels_items_list_navigation->Set_Require(false);
     $campo_labels_items_list_navigation->Set_Label('labels_items_list_navigation');
     $campo_labels_items_list_navigation->Set_Value($dados->rows['labels_items_list_navigation']);
     $campo_labels_items_list_navigation->Set_Placeholder('Padrão');
     $campo_labels_items_list_navigation->Executar();
     
     $campo_labels_items_list = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_items_list->Set_Exibir(true);
     $campo_labels_items_list->Set_Name('labels_items_list');
     $campo_labels_items_list->Set_Require(false);
     $campo_labels_items_list->Set_Label('labels_items_list');
     $campo_labels_items_list->Set_Value($dados->rows['labels_items_list']);
     $campo_labels_items_list->Set_Placeholder('Padrão');
     $campo_labels_items_list->Executar();
     
     $campo_labels_name_admin_bar = new \Spw\Componentes\Html\Form_InputText();
     $campo_labels_name_admin_bar->Set_Exibir(true);
     $campo_labels_name_admin_bar->Set_Name('labels_name_admin_bar');
     $campo_labels_name_admin_bar->Set_Require(false);
     $campo_labels_name_admin_bar->Set_Label('Rótulo para uso do texto Novo na barra de menus do administrador. (name_admin_bar)');
     $campo_labels_name_admin_bar->Set_Value($dados->rows['labels_name_admin_bar']);
     $campo_labels_name_admin_bar->Set_Placeholder('Padrão');
     $campo_labels_name_admin_bar->Executar();
     
     $campo_supports_title = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_title->Set_Exibir(true);
     $campo_supports_title->Set_Name('supports_title');
     $campo_supports_title->Set_Required(true);
     $campo_supports_title->Set_Label('supports_title');
     $campo_supports_title->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_title'], 'Y') );
     $campo_supports_title->Set_AddOption('Y', 'Sim');
     $campo_supports_title->Set_AddOption('N', 'Não');
     $campo_supports_title->Executar();
     
     $campo_supports_editor = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_editor->Set_Exibir(true);
     $campo_supports_editor->Set_Name('supports_editor');
     $campo_supports_editor->Set_Required(true);
     $campo_supports_editor->Set_Label('supports_editor');
     $campo_supports_editor->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_editor'], 'Y') );
     $campo_supports_editor->Set_AddOption('Y', 'Sim');
     $campo_supports_editor->Set_AddOption('N', 'Não');
     $campo_supports_editor->Executar();
     
     $campo_supports_author = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_author->Set_Exibir(true);
     $campo_supports_author->Set_Name('supports_author');
     $campo_supports_author->Set_Required(true);
     $campo_supports_author->Set_Label('supports_author');
     $campo_supports_author->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_author'], 'N') );
     $campo_supports_author->Set_AddOption('Y', 'Sim');
     $campo_supports_author->Set_AddOption('N', 'Não');
     $campo_supports_author->Executar();
     
     $campo_supports_thumbnail = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_thumbnail->Set_Exibir(true);
     $campo_supports_thumbnail->Set_Name('supports_thumbnail');
     $campo_supports_thumbnail->Set_Required(true);
     $campo_supports_thumbnail->Set_Label('supports_thumbnail');
     $campo_supports_thumbnail->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_thumbnail'], 'N') );
     $campo_supports_thumbnail->Set_AddOption('Y', 'Sim');
     $campo_supports_thumbnail->Set_AddOption('N', 'Não');
     $campo_supports_thumbnail->Executar();
     
     $campo_supports_excerpt = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_excerpt->Set_Exibir(true);
     $campo_supports_excerpt->Set_Name('supports_excerpt');
     $campo_supports_excerpt->Set_Required(true);
     $campo_supports_excerpt->Set_Label('supports_excerpt');
     $campo_supports_excerpt->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_excerpt'], 'N') );
     $campo_supports_excerpt->Set_AddOption('Y', 'Sim');
     $campo_supports_excerpt->Set_AddOption('N', 'Não');
     $campo_supports_excerpt->Executar();
     
     $campo_supports_trackbacks = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_trackbacks->Set_Exibir(true);
     $campo_supports_trackbacks->Set_Name('supports_trackbacks');
     $campo_supports_trackbacks->Set_Required(true);
     $campo_supports_trackbacks->Set_Label('supports_trackbacks');
     $campo_supports_trackbacks->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_trackbacks'], 'N') );
     $campo_supports_trackbacks->Set_AddOption('Y', 'Sim');
     $campo_supports_trackbacks->Set_AddOption('N', 'Não');
     $campo_supports_trackbacks->Executar();
     
     $campo_supports_custom_fields = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_custom_fields->Set_Exibir(true);
     $campo_supports_custom_fields->Set_Name('supports_custom_fields');
     $campo_supports_custom_fields->Set_Required(true);
     $campo_supports_custom_fields->Set_Label('supports_custom_fields');
     $campo_supports_custom_fields->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_custom_fields'], 'N') );
     $campo_supports_custom_fields->Set_AddOption('Y', 'Sim');
     $campo_supports_custom_fields->Set_AddOption('N', 'Não');
     $campo_supports_custom_fields->Executar();
     
     $campo_supports_comments = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_comments->Set_Exibir(true);
     $campo_supports_comments->Set_Name('supports_comments');
     $campo_supports_comments->Set_Required(true);
     $campo_supports_comments->Set_Label('supports_comments');
     $campo_supports_comments->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_comments'], 'N') );
     $campo_supports_comments->Set_AddOption('Y', 'Sim');
     $campo_supports_comments->Set_AddOption('N', 'Não');
     $campo_supports_comments->Executar();
     
     $campo_supports_revisions = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_revisions->Set_Exibir(true);
     $campo_supports_revisions->Set_Name('supports_revisions');
     $campo_supports_revisions->Set_Required(true);
     $campo_supports_revisions->Set_Label('supports_revisions');
     $campo_supports_revisions->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_revisions'], 'N') );
     $campo_supports_revisions->Set_AddOption('Y', 'Sim');
     $campo_supports_revisions->Set_AddOption('N', 'Não');
     $campo_supports_revisions->Executar();
     
     $campo_supports_page_attributes = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_page_attributes->Set_Exibir(true);
     $campo_supports_page_attributes->Set_Name('supports_page_attributes');
     $campo_supports_page_attributes->Set_Required(true);
     $campo_supports_page_attributes->Set_Label('supports_page_attributes');
     $campo_supports_page_attributes->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_page_attributes'], 'N') );
     $campo_supports_page_attributes->Set_AddOption('Y', 'Sim');
     $campo_supports_page_attributes->Set_AddOption('N', 'Não');
     $campo_supports_page_attributes->Executar();
     
     $campo_supports_post_formats = new \Spw\Componentes\Html\Form_Select();
     $campo_supports_post_formats->Set_Exibir(true);
     $campo_supports_post_formats->Set_Name('supports_post_formats');
     $campo_supports_post_formats->Set_Required(true);
     $campo_supports_post_formats->Set_Label('supports_post_formats');
     $campo_supports_post_formats->Set_ValueDefault( \Spw\Componentes\Ferramentas\Pacote::Dados_ValorOuValorPadrao($dados->rows['supports_post_formats'], 'N') );
     $campo_supports_post_formats->Set_AddOption('Y', 'Sim');
     $campo_supports_post_formats->Set_AddOption('N', 'Não');
     $campo_supports_post_formats->Executar();
     
     $campo_id_post_type = new \Spw\Componentes\Html\Form_InputHidden();
     $campo_id_post_type->Set_Exibir(true);
     $campo_id_post_type->Set_Name('id_post_type');
     $campo_id_post_type->Set_Value($_GET['id_post_type']);
     $campo_id_post_type->Executar();
     

     $botao_salvar = new \Spw\Componentes\Html\Form_InputSubmit();
     $botao_salvar->Set_Exibir(true);
     $botao_salvar->Set_Name('submit');
     $botao_salvar->Set_Value('Salvar');
     $botao_salvar->Executar();
     
     $botao_excluir = new \Spw\Componentes\UI\Admin\Botao();
     $botao_excluir->Set_AdicionarBotao_Excluir('bot_deletar', 'Excluir', '#', null);
     $botao_excluir->Executar();
     
     $botao_confirmar = new \Spw\Componentes\UI\Admin\Botao();
     $botao_confirmar->Set_AdicionarBotao_Excluir('bot_confirmar', 'Confirmar', \Spw\Componentes\Modulo\Link::ExecutarGatilho('post-type', 'deletar-post-type', 'id_post_type=' . $_GET['id_post_type']), null);
     $botao_confirmar->Executar();
     
     $painel_botao_confirmar = new \Spw\Componentes\UI\Admin\Painel_Botoes();
     $painel_botao_confirmar->Set_AdicionarBotao($botao_confirmar->render);
     $painel_botao_confirmar->Executar();
     
     $painel_config = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
     $painel_config->Set_Titulo('Configuração');
     $painel_config->Set_AdicionarConteudo($campo_post_type->render);
     $painel_config->Set_AdicionarConteudo($campo_public->render);
     $painel_config->Set_AdicionarConteudo($campo_publicly_queryable->render);
     $painel_config->Set_AdicionarConteudo($campo_show_ui->render);
     $painel_config->Set_AdicionarConteudo($campo_show_in_menu->render);
     $painel_config->Set_AdicionarConteudo($campo_show_in_nav_menus->render);
     $painel_config->Set_AdicionarConteudo($campo_show_in_admin_bar->render);
     $painel_config->Set_AdicionarConteudo($campo_menu_position->render);
     $painel_config->Set_AdicionarConteudo($campo_menu_icon->render);
     $painel_config->Set_AdicionarConteudo($campo_capability_type->render);
     $painel_config->Set_AdicionarConteudo($campo_hierarchical->render);
     $painel_config->Set_AdicionarConteudo($campo_has_archive->render);
     $painel_config->Set_AdicionarConteudo($campo_rewrite->render);
     $painel_config->Set_AdicionarConteudo($campo_rewrite_slug->render);
     $painel_config->Set_AdicionarConteudo($campo_query_var->render);
     $painel_config->Set_AdicionarConteudo($campo_id_post_type->render);
     $painel_config->Executar();
     
     $painel_labels = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
     $painel_labels->Set_Titulo('Rótulos');
     $painel_labels->Set_AdicionarConteudo($campo_labels_name->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_singular_name->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_new_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_add_new->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_add_new_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_view_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_view_items->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_edit_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_search_items->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_not_found->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_not_found_in_trash->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_all_items->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_archives->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_attributes->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_insert_into_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_uploaded_to_this_item->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_featured_image->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_set_featured_image->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_use_featured_image->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_remove_featured_image->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_menu_name->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_filter_items_list->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_items_list_navigation->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_items_list->render);
     $painel_labels->Set_AdicionarConteudo($campo_labels_name_admin_bar->render);
     $painel_labels->Executar();
     
     $painel_supports = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
     $painel_supports->Set_Titulo('Suportes');
     $painel_supports->Set_AdicionarConteudo($campo_supports_title->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_editor->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_excerpt->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_thumbnail->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_author->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_custom_fields->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_trackbacks->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_comments->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_revisions->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_page_attributes->render);
     $painel_supports->Set_AdicionarConteudo($campo_supports_post_formats->render);
     $painel_supports->Executar();
     
     $painel_mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
     $painel_mensagem->Executar();
     
     $painel_botoes = new \Spw\Componentes\UI\Admin\Painel_Botoes();
     $painel_botoes->Set_AdicionarBotao($botao_salvar->render);
     $painel_botoes->Set_AdicionarBotao($botao_excluir->render);
     $painel_botoes->Executar();
     
     $modal_deletar = new \Spw\Componentes\UI\Admin\Modal();
     $modal_deletar->Set_Id('modal_01');
     $modal_deletar->Set_BotaoId('bot_deletar');
     $modal_deletar->Set_AdicionarConteudo('<h2>Deseja mesmo excluir?</h2>');
     $modal_deletar->Set_AdicionarConteudo( $painel_botao_confirmar->render );
     $modal_deletar->Executar();
     
     $pagina = new \Spw\Componentes\UI\Admin\Pagina();
     $pagina->Set_Titulo(SPW_TITULO);
     $pagina->Set_Subtitulo('Editando Post Type');
     $pagina->Set_Navegacao_Ativar(true);
     $pagina->Set_Navegacao_AdicionarLink(null, 'Home', \Spw\Componentes\Modulo\Link::AbrirPagina('post-type', 'pagina-inicial', null), false);
     $pagina->Set_Navegacao_AdicionarLink(null, 'Todos os registros', \Spw\Componentes\Modulo\Link::AbrirPagina('post-type', 'home', null), false);
     $pagina->Set_Navegacao_AdicionarLink(null, 'Editar', null, true);
     $pagina->Set_Form_Exibir(true);
     $pagina->Set_Form_Name('editar');
     $pagina->Set_Form_Method('post');
     $pagina->Set_Form_Action( \Spw\Componentes\Modulo\Link::ExecutarGatilho('post-type', 'atualizar-post-type', null) );
     $pagina->Set_AdicionarConteudo( $painel_mensagem->render );
     $pagina->Set_AdicionarConteudo( $painel_config->render );
     $pagina->Set_AdicionarConteudo( $painel_labels->render );
     $pagina->Set_AdicionarConteudo( $painel_supports->render );
     $pagina->Set_AdicionarConteudo( $painel_botoes->render );
     $pagina->Set_AdicionarConteudo( $modal_deletar->render );
     $pagina->Executar();

     \Spw\Componentes\Funcoes::Show($pagina->render);
     
  