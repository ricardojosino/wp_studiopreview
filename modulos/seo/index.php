<?php

     // CONTANTES
     define('SPW_SEO_PATH', plugin_dir_path(__FILE__));
     define('SPW_SEO_URL', plugin_dir_url(__FILE__));
     
     // INCLUDES
     \Spw\Componentes\Modulo\IncluirArquivo::Componente('seo', 'meta-box-campos-seo');
     
     // ACTIONS
     \Seo\Componentes\MetaBoxCamposSeo::Executar();