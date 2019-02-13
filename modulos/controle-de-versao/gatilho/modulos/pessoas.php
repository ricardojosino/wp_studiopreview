<?php

     $tabela_pessoas = new \Spw\Componentes\Mysql\CriarTabela();
     $tabela_pessoas->Set_NomeDaTabela('spw_pessoas');
     $tabela_pessoas->Set_ChavePrimaria('id_pessoa');
     $tabela_pessoas->Set_AdicionarColuna("id_pessoa int(11) not null auto_increment");
     $tabela_pessoas->Set_AdicionarColuna("time timestamp not null default current_timestamp");
     $tabela_pessoas->Set_AdicionarColuna("lixeira char(1) null default 'Y'");
     $tabela_pessoas->Set_AdicionarColuna("nome_completo varchar(300) null");
     $tabela_pessoas->Set_AdicionarColuna("id_tipo int(11) null");
     $tabela_pessoas->Set_AdicionarColuna("telefone_principal varchar(50) null");
     $tabela_pessoas->Set_AdicionarColuna("telefone_alternativo varchar(50) null");
     $tabela_pessoas->Set_AdicionarColuna("email_principal varchar(200) null");
     $tabela_pessoas->Set_AdicionarColuna("email_alternativo varchar(200) null");
     $tabela_pessoas->Set_AdicionarColuna("endereco varchar(500) null");
     $tabela_pessoas->Set_AdicionarColuna("numero varchar(50) null");
     $tabela_pessoas->Set_AdicionarColuna("complemento varchar(200) null");
     $tabela_pessoas->Set_AdicionarColuna("bairro varchar(200) null");
     $tabela_pessoas->Set_AdicionarColuna("cidade varchar(200) null");
     $tabela_pessoas->Set_AdicionarColuna("estado varchar(200) null");
     $tabela_pessoas->Set_AdicionarColuna("pais varchar(200) null");
     $tabela_pessoas->Executar();
     
     $tabela_categorias = new \Spw\Componentes\Mysql\CriarTabela();
     $tabela_categorias->Set_NomeDaTabela("spw_pessoas_categorias");
     $tabela_categorias->Set_ChavePrimaria("id_categoria");
     $tabela_categorias->Set_AdicionarColuna("id_categoria int(11) not null auto_increment");
     $tabela_categorias->Set_AdicionarColuna("time timestamp not null default current_timestamp");
     $tabela_categorias->Set_AdicionarColuna("lixeira char(11) not null default 'Y' ");
     $tabela_categorias->Set_AdicionarColuna("categoria varchar(200) null ");
     $tabela_categorias->Executar();
     
     $tabela_grupos = new \Spw\Componentes\Mysql\CriarTabela();
     $tabela_grupos->Set_NomeDaTabela("spw_pessoas_grupos");
     $tabela_grupos->Set_ChavePrimaria('id_grupo');
     $tabela_grupos->Set_AdicionarColuna('id_grupo int(11) not null auto_increment');
     $tabela_grupos->Set_AdicionarColuna('id_pessoa int(11) null');
     $tabela_grupos->Set_AdicionarColuna('id_categoria int(11) null');
     $tabela_grupos->Executar();