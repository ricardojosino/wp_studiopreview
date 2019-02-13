<?php

	class Spw_Template

	{

		static function Header()
		{
			ob_start();
			include get_template_directory() . '/header.php';
			return ob_get_clean();
			
		}
		
		
		static function Head()
		{
			ob_start();
			wp_head();
			return '<head>' . ob_get_clean() . '</head>';
		}
		
		
		static function Footer()
		{
			ob_start();
			include get_template_directory() . '/footer.php';
			return ob_get_clean();
		}
		
		
		static function ContentPage($value)
		{
			if (!empty($value)) :
				return Spw_Html::Tag('section', array('class' => 'spw-ui-page'), $value . '<div style="clear:both"></div>');
			endif;
		}
		
		
		static function Content($value)
		{
			if (!empty($value)) :
				return Spw_Html::Tag('section', null, $value . '<div style="clear:both"></div>');
			endif;
		}
		
		
		



	}
