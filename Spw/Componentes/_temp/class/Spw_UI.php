<?php

	class Spw_UI

     {

          static function Bootstrap_Container($value)
		  {
               if (!empty($value)) :
               
				$container = new Spw_UI_Bootstrap_Grid_Container();
				$container->Set_Type_Container(true);
				$container->Set_AddRow(null, Spw_UI_Bootstrap_Grid_Col::Set_Col_LG(true, 12, $value));
				$container->Executar();
				
				return $container->render;
                    
               endif;
		  }
		  
		  
		  static function Bootstrap_Container_2Cols($col_1_tamanho, $col_1_value, $col_2_tamanho, $col_2_value)
		  {
                 if (!empty($col_1_value) and !empty($col_2_value)) :
                 
				$container = new Spw_UI_Bootstrap_Grid_Container();
				$container->Set_Type_Container(true);
				$container->Set_AddRow(null, Spw_UI_Bootstrap_Grid_Col::Set_Col_LG(true, $col_1_tamanho, $col_1_value) . Spw_UI_Bootstrap_Grid_Col::Set_Col_LG(true, $col_2_tamanho, $col_2_value) );
				$container->Executar();
				
				return $container->render;
                    
               endif;
		  }
		  
		  
		  static function Bootstrap_ContainerFluid($value)
		  {
                 if (!empty($value)) :
                 
				$container = new Spw_UI_Bootstrap_Grid_Container();
				$container->Set_Type_Fluid(true);
				$container->Set_AddRow(null, Spw_UI_Bootstrap_Grid_Col::Set_Col_LG(true, 12, $value));
				$container->Executar();
				
				return $container->render;
                    
               endif;
		  }
		  
		  
		  static function Container( $wrap, $id, $content, $margin_top, $margin_bottom )
		  {
			  $container = new Spw_UI_Container();
			  $container->Set_Wrap($wrap);
			  $container->Set_AddContent($id, $content, $margin_top, $margin_bottom);
			  $container->Executar();
			  
			  return $container->render;
		  }


      }