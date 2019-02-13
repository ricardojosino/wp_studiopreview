<?php
     
     $modulo = 'imoveis';
     
     // INCLUDES
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'ui-imovel');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'ui-listar-imoveis');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-lista-imoveis');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-valor-imovel');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-valor-condominio');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-info-imoveis');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-metragens-imoveis');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-infra-imoveis');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-mais-info-imoveis');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-localizacao-imovel');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-mapa-imovel');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'widget-filtro');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'gerar-xml');
     \Spw\Componentes\Modulo\IncluirArquivo::Componente($modulo, 'pagina-config');
     

     // GATILHOS
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'registrar-estilo');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'post-types');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'taxonomias');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'pagina-config');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'registrar-widgets');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-categorias');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-dados-do-imovel');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-enderecos');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-negocios');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-finalidades');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-metragem');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-destaques');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-infraestrutura');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-info-uteis');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-localizacao');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'acf-galeria');
     \Spw\Componentes\Modulo\Executar::Gatilho($modulo, 'gerar-xml');
     
     
     function custom_rewrite_basic()
     {
          add_rewrite_rule('^xml/([0-9]+)/?', 'index.php?xml=$matches[1]', 'top');
     }
     
     add_action( "init",  "custom_rewrite_basic" );
     
     
     function rewrite_xml_imoveis()
     {
          add_rewrite_rule('^xml/([0-9]+)/?', 'wp-content/plugins/studiopreview/modulos/imoveis/pagina/xml.php?xml=$matches[1]', 'bottom');
     }
     
     add_action( 'init',  'rewrite_xml_imoveis' );
     
     
  
     
     
     
     
   