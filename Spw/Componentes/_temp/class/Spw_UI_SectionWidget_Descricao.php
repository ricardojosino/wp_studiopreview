<?php

	class Spw_UI_SectionWidget_Descricao

	{

		static function Descricao($id, $style_array, $value)
		{
               if (!empty($value)) :
                    return Spw_Html::Tag('div', array('id' => $id, 'class' => 'spw-ui-widget-descricao', 'style' => Spw_Html::AttributesValue($style_array) ), Spw_Wp::Shortcode($value) );
               endif;
		}



	}
