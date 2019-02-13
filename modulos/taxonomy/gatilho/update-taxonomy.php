<?php

     
     $update = new \Spw\Componentes\Mysql\AtualizarRegistro();
     $update->Set_Conectar();
     $update->Set_Start('POST', 'id_taxonomy');
     $update->Set_NomeDaTabela('spw_taxonomy');
     $update->Set_ChavePrimaria('id_taxonomy', $_POST['id_taxonomy']);
     $update->Set_AdicionarCampo(true, 'lixeira', 'string', 'value', 'N');
     $update->Set_AdicionarCampo(true, 'post_type', 'string', 'post', 'post_type');
     $update->Set_AdicionarCampo(true, 'taxonomy', 'string', 'post', 'taxonomy');
     $update->Set_AdicionarCampo(true, 'hierarchical', 'string', 'post', 'hierarchical');
     $update->Set_AdicionarCampo(true, 'show_ui', 'string', 'post', 'show_ui');
     $update->Set_AdicionarCampo(true, 'show_in_tag_cloud', 'string', 'post', 'show_in_tag_cloud');
     $update->Set_AdicionarCampo(true, 'show_tag_cloud', 'string', 'post', 'show_tag_cloud');
     $update->Set_AdicionarCampo(true, 'show_in_nav_menus', 'string', 'post', 'show_in_nav_menus');
     $update->Set_AdicionarCampo(true, 'show_admin_column', 'string', 'post', 'show_admin_column');
     $update->Set_AdicionarCampo(true, 'query_var', 'string', 'post', 'query_var');
     $update->Set_AdicionarCampo(true, 'rewrite', 'string', 'post', 'rewrite');
     $update->Set_AdicionarCampo(true, 'slug', 'string', 'post', 'slug');
     $update->Set_AdicionarCampo(true, 'meta_box_cb', 'string', 'post', 'meta_box_cb');
     $update->Set_AdicionarCampo(true, 'labels_name', 'string', 'post', 'labels_name');
     $update->Set_AdicionarCampo(true, 'labels_menu_name', 'string', 'post', 'labels_menu_name');
     $update->Set_AdicionarCampo(true, 'labels_update_item', 'string', 'post', 'labels_update_item');
     $update->Set_AdicionarCampo(true, 'labels_add_new_item', 'string', 'post', 'labels_add_new_item');
     $update->Set_AdicionarCampo(true, 'labels_singular_name', 'string', 'post', 'labels_singular_name');
     $update->Set_AdicionarCampo(true, 'labels_add_new', 'string', 'post', 'labels_add_new');
     $update->Set_AdicionarCampo(true, 'labels_edit_item', 'string', 'post', 'labels_edit_item');
     $update->Set_AdicionarCampo(true, 'labels_new_item', 'string', 'post', 'labels_new_item');
     $update->Set_AdicionarCampo(true, 'labels_view_item', 'string', 'post', 'labels_view_item');
     $update->Set_AdicionarCampo(true, 'labels_search_items', 'string', 'post', 'labels_search_items');
     $update->Set_AdicionarCampo(true, 'labels_not_found', 'string', 'post', 'labels_not_found');
     $update->Set_Mensagem('Taxonomia salva com sucesso!');
     $update->Set_RetornarParaPagina('studiopreview', 'taxonomy', 'editar-taxonomy', 'id_taxonomy=' . $_POST['id_taxonomy']);
     $update->Executar();
     
