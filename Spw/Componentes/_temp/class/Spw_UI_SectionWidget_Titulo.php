<?php

	class Spw_UI_SectionWidget_Titulo

	{

		static function Titulo($id, $style_array, $value)
		{
               if (!empty($value)) :
                    return Spw_Html::Tag('h1', array( 'id' => $id, 'class' => 'spw-ui-widget-titulo-1', 'style' => Spw_Html::AttributesValue($style_array) ), $value . '<div class="spw-barra"></div>');
               endif;
		}


	}