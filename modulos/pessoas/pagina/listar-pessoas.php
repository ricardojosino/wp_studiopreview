<?php
     
     $pesquisar_nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
     $pesquisar_id_categoria = ( isset($_POST['id_categoria']) ) ? $_POST['id_categoria'] : null;
     
     $pagina = new Pessoas\Componentes\PaginaListarContatos();
     $pagina->Set_PesquisarPorNome( $pesquisar_nome );
     $pagina->Executar();
     
     echo $pagina->Get_Render();
