<?php

     $criar_tabela = new \Spw\Componentes\Mysql\CriarTabela();
     $criar_tabela->Set_NomeDaTabela('spw_notificacao');
     $criar_tabela->Set_AdicionarColuna('id_notificacao INT(11) NOT NULL AUTO_INCREMENT');
     $criar_tabela->Set_AdicionarColuna('time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
     $criar_tabela->Set_AdicionarColuna('id_usuario INT(11) NULL');
     $criar_tabela->Set_AdicionarColuna('mensagem LONGTEXT NULL');
     $criar_tabela->Set_AdicionarColuna('page VARCHAR(100) NULL');
     $criar_tabela->Set_AdicionarColuna('visto CHAR(1) NULL');
     $criar_tabela->Set_ChavePrimaria('id_notificacao');
     $criar_tabela->Executar();