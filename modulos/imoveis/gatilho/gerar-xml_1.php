<?php
     
     if ( isset($_GET['xml']) and $_GET['xml'] == 'imoveis' ) :
          
          $arqs['post_type'] = 'spw-imoveis';
          //$arqs['showposts'] = -1;
     
          $dados = new \WP_Query($arqs);
          
          if ( $dados->have_posts() ) :
               
          
               $anuncios = new \Spw\Componentes\Xml\Elemento();
               $imoveis = new \Spw\Componentes\Xml\Elemento();

               while( $dados->have_posts() ) : $dados->the_post();
                    
                    $imoveis->Set_AddElemento('Imovel', 'Imovel 01');
                    $imoveis->Set_AddSubElemento('codigo_cliente', 123);
                    $imoveis->Set_AddSubElemento('Venda', 'sim');
                    $imoveis->Set_AddSubElemento('Locacao', 'nao');
                    
               endwhile;
                    
               $imoveis->Executar();

               $anuncios->Set_AddElemento('Anuncios', $imoveis->render);
               $anuncios->Executar();

               $container = new \Spw\Componentes\Xml\Container();
               $container->Set_AddItem($anuncios->render);
               $container->Executar();

               echo $container->render;
               
               wp_reset_postdata();
          
          endif;

          exit();
          
               elseif( isset($_GET['xml']) and empty($_GET['xml']) ) :
                    echo '<p>O Arquivo xml não pode ser gerado.</p>';
                    exit();

                    elseif( isset($_GET['xml']) and $_GET['xml'] != 'imoveis' ) :
                         echo '<p>O Arquivo xml não pode ser gerado 2.</p>';
                         exit();
          
     
     endif;