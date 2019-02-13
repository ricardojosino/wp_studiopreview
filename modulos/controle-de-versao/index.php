<?php
     
     // COMPONENTES
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('controle-de-versao', 'criar-tabelas-no-banco-de-dados');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('controle-de-versao', 'verificar-versao-do-banco-de-dados');

     // GATILHOS
     \Spw\Componentes\Modulo\Executar::Gatilho('controle-de-versao', 'criar-tabelas');