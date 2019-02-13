<?php

     $post_type = new \Spw\Componentes\Wp\PostType();
     $post_type->Set_post_type('spw-empreendimentos');
     $post_type->Set_public('Y');
     $post_type->Set_publicly_queryable('Y');
     $post_type->Set_rewrite('Y');
     $post_type->Set_rewrite_slug('empreendimentos');
     $post_type->Set_show_ui('Y');
     $post_type->Set_show_in_menu('Y');
     $post_type->Set_show_in_nav_menus('Y');
     $post_type->Set_show_in_admin_bar('Y');
     $post_type->Set_has_archive('Y');
     $post_type->Set_hierarchical(false);
     $post_type->Set_capability_type('post');
     $post_type->Set_menu_position(5);
     $post_type->Set_supports_title('Y');
     $post_type->Set_supports_editor('Y');
     $post_type->Set_supports_excerpt('N');
     $post_type->Set_supports_thumbnail('Y');
     $post_type->Set_labels_name('Empreendimentos');
     $post_type->Set_labels_singular_name('Empreendimentos');
     $post_type->Set_labels_menu_name('Empreendimentos');
     $post_type->Set_labels_name_admin_bar('Empreendimentos');
     $post_type->Set_labels_add_new('Inserir novo');
     $post_type->Set_labels_featured_image('Imagem de capa');
     $post_type->Set_labels_remove_featured_image('Remover imagem');
     $post_type->Set_labels_use_featured_image('Definir capa');
     $post_type->Executar();