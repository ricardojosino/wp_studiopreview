<?php
     
     
     $listar_imoveis_xml = new \Imoveis\Componentes\GerarXmlDosImoveis();
     $listar_imoveis_xml->Executar();
     
     echo $listar_imoveis_xml->render;