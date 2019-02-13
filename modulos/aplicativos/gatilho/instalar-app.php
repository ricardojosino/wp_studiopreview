<?php

     $instalar = new \Spw\Componentes\Mysql\InserirRegistro();
     $instalar->Set_Start('POST', 'start');
     $instalar->Set_Conectar();
     $instalar->Set_NomeDaTabela('spw_aplicativos_instalados');
     $instalar->Set_AdicionarRegistro(true, 'id_aplicativo', 'int', 'post', 'id_aplicativo');
     $instalar->Set_Mensagem('Instalado com sucesso! ' . \Spw\Componentes\Html\Funcoes::Tag('a', array('href' => 'admin.php?page=studiopreview&modulo=aplicativos&pagina=instalacao'), 'Atualizar Dashboard'));
     $instalar->Executar();
     
     