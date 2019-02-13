<?php
     
     // CATEGORIAS DOS APLICATIVOS
     // 1 - Plugin (Carrega como um plugin, com link no dashboard do Wordpress ou oculto)
     // 2 - Ferramentas (Carrega dentro do plugin Studio Preview)


     // TABELA DE APLICATIVOS
     $spw_aplicativos = new \Spw\Componentes\Mysql\CriarTabela();
     $spw_aplicativos->Set_NomeDaTabela('spw_aplicativos');
     $spw_aplicativos->Set_AdicionarColuna('id_aplicativo int(11) NOT NULL AUTO_INCREMENT');
     $spw_aplicativos->Set_AdicionarColuna('time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
     $spw_aplicativos->Set_AdicionarColuna("lixeira CHAR(1) NULL DEFAULT 'Y' ");
     $spw_aplicativos->Set_AdicionarColuna("nome VARCHAR(45) NULL");
     $spw_aplicativos->Set_AdicionarColuna("titulo VARCHAR(200) NULL");
     $spw_aplicativos->Set_AdicionarColuna("descricao VARCHAR(600) NULL");
     $spw_aplicativos->Set_AdicionarColuna("modulo VARCHAR(100) NULL");
     $spw_aplicativos->Set_AdicionarColuna("pagina VARCHAR(100) NULL");
     $spw_aplicativos->Set_AdicionarColuna("id_categoria INT(11) NULL");
     $spw_aplicativos->Set_ChavePrimaria('id_aplicativo');
     $spw_aplicativos->Executar();
     
     // TABELA DE APPS INSTALADOS
     $spw_aplicativos_instalados = new \Spw\Componentes\Mysql\CriarTabela();
     $spw_aplicativos_instalados->Set_NomeDaTabela('spw_aplicativos_instalados');
     $spw_aplicativos_instalados->Set_AdicionarColuna("id_instalacao INT(11) NOT NULL AUTO_INCREMENT");
     $spw_aplicativos_instalados->Set_AdicionarColuna("time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
     $spw_aplicativos_instalados->Set_AdicionarColuna("id_aplicativo INT(11) NULL");
     $spw_aplicativos_instalados->Set_ChavePrimaria('id_instalacao');
     $spw_aplicativos_instalados->Executar();
     
     $cadastrar_aplicativos = new \Aplicativos\Componentes\RegistrarAplicativosNoBancoDeDados();
     $cadastrar_aplicativos->Set_Inserir('spw-seo', 'Seo', 'Habilita campos para a personalização de informações para SEO', 'seo', 'home', 1);
     $cadastrar_aplicativos->Set_Inserir('spw-post-type', 'Post Type', 'Ferramenta para criar post type no Wordpress', 'post-type', 'home', 2);
     $cadastrar_aplicativos->Set_Inserir('spw-imoveis', 'Imóveis', 'Organize imóveis no site.', 'imoveis', 'home', 1);
     $cadastrar_aplicativos->Set_Inserir('spw-produtos', 'Catálogo de Produtos', 'Organize produtos no site.', 'catalogo-de-produtos', 'home', 1);
     $cadastrar_aplicativos->Set_Inserir('spw-widget-categorias', 'Categorias Sidebar', 'Exibe categorias na barra lateral do site filtrando por taxonomias.', 'categorias-sidebar', 'home', 1);
     $cadastrar_aplicativos->Set_Inserir('spw-pessoas', 'Pessoas', 'Organize contatos', 'pessoas', 'home', 1);
     $cadastrar_aplicativos->Set_Inserir('spw-empreendimentos', 'Empreendimentos', 'Organize empreendimentos em seu site', 'empreendimentos', 'home', 1);
     $cadastrar_aplicativos->Set_Inserir('spw-taxonomy', 'Taxonomy', 'Crie novas taxonomias para seus post types.', 'taxonomy', 'home', 2);
     $cadastrar_aplicativos->Set_Inserir('spw-redirecionamento', 'Redirecionamento', 'Insira redirecionamentos em páginas usando widget.', 'redirecionamento', 'home', 1);
     $cadastrar_aplicativos->Executar();
     
     