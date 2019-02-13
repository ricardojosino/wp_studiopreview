<?php

    $registrar = new \Spw\Componentes\Wp\Widget_Registrar();
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_ListarImoveis');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_ValorDoImovel');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_ValorCondominio');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_InfoImoveis');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_MetragensDoImovel');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_IfraestruturaDoImovel');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_MaisInformacoesDoImovel');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_LocalizacaoDoImovel');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_MapaDoImovel');
    $registrar->Set_AdicionarWidget('Imoveis\Componentes\WidgetImoveis_Filtro');
    $registrar->Executar();
    
  