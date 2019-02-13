<?php


	class Spw_Html
     
     {
          
     
     // METODOS DE PROCESSO
		
		static function IsNumber($value)
		{
			return is_numeric($value) ? $value . 'px' : $value;
		}
		
		
		static function Tag($tag, $attributes_array, $value)
		{

			 if ( !empty($tag) ) :
				  return '<' . $tag . Spw_Html::Attributes($attributes_array) . '>' . $value . '</' . $tag . '>' ;
			 endif;

		}
          
          
          
		static function Attributes($array)
		{
			 if ( !empty($array) and is_array($array) ) :

				  foreach ($array as $key => $value) :

				  if (!empty($value)) :

					   $attibutes[] = $key . '=' . '"' . Spw_Html::AttributesValue($value) . '"'; 

				  endif;

				  endforeach;

				  if (!empty($attibutes)) :
					   return ' ' . join(' ', $attibutes);
				  endif;

			 endif;
		}
          
          
          
		static function AttributesValue($value)
		{
			 if ( !empty($value) and is_array($value) ) :


				  foreach($value as $key => $value) :

					   if (!empty($value)) :
							$property[] = $key . ':' . self::IsNumber($value); 
					   endif;

				  endforeach;


				  if (!empty($property)) :
					   return '' . join('; ', $property);
				  endif;

					   else :
							return $value;

			 endif;
		}
          
		
		static function Style($atributos)
		{
			if (!empty($atributos)) :

				( !empty($atributos['padding-top']) or @$atributos['padding-top'] == '0' ) ? $style[] = 'padding-top:' .  self::IsNumber($atributos['padding-top'])  : '';
				( !empty($atributos['padding-bottom']) or @$atributos['padding-bottom'] == '0' ) ? $style[] = 'padding-bottom:' . self::IsNumber($atributos['padding-bottom'])  : '';
				( !empty($atributos['background-color']) ) ? $style[] = 'background-color:' . $atributos['background-color'] : '';
				( !empty($atributos['background-image']) ) ? $style[] = 'background-image: url(' . $atributos['background-image'] . ')' : '';
				( !empty($atributos['background-position']) ) ? $style[] = 'background-position:' . $atributos['background-position'] : '';
				( !empty($atributos['background-repeat']) ) ? $style[] = 'background-repeat:' . $atributos['background-repeat'] : '';
				( !empty($atributos['background-attachment']) ) ? $style[] = 'background-attachment:' . $atributos['background-attachment'] : '';
				( !empty($atributos['background-size']) ) ? $style[] = 'background-size:' . $atributos['background-size'] : '';
				( !empty($atributos['color']) ) ? $style[] = 'color:' . $atributos['color'] : '';
				( !empty($atributos['text-align']) ) ? $style[] = 'text-align:' . $atributos['text-align'] : '';
				( !empty($atributos['width']) or @$atributos['width'] == '0' ) ? $style[] = 'width:' . self::IsNumber($atributos['width']) : '';
				( !empty($atributos['height']) or @$atributos['height'] == '0' ) ? $style[] = 'height:' . self::IsNumber($atributos['height']) : '';
				( !empty($atributos['max-width']) or @$atributos['max-width'] == '0' ) ? $style[] = 'max-width:' . self::IsNumber($atributos['max-width']) : '';
				( !empty($atributos['min-width']) or @$atributos['min-width'] == '0' ) ? $style[] = 'min-width:' . self::IsNumber($atributos['min-width']) : '';
				( !empty($atributos['min-height']) or @$atributos['min-height'] == '0' ) ? $style[] = 'min-height:' . self::IsNumber($atributos['min-height']) : '';
				( !empty($atributos['max-height']) or @$atributos['max-height'] == '0' ) ? $style[] = 'max-height:' . self::IsNumber($atributos['max-height']) : '';
				// MARGIN
				( !empty($atributos['margin-left']) ) ? $style[] = 'margin-left:' . self::IsNumber($atributos['margin-left']) : '';
				( !empty($atributos['margin-top']) ) ? $style[] = 'margin-top:' . self::IsNumber($atributos['margin-top']) : '';
				( !empty($atributos['margin-right']) ) ? $style[] = 'margin-right:' . self::IsNumber($atributos['margin-right']) : '';
				( !empty($atributos['margin-bottom']) ) ? $style[] = 'margin-bottom:' . self::IsNumber($atributos['margin-bottom']) : '';
			
			endif;
			
			if (!empty($style)) :
				
				return ' style="' . join(';', $style) . '" ';
				
			endif;
		}
		
		
		static function ClassCss($value)
		{
			if (!empty($value)) :
				return ' class="' . $value . '" ';
			endif;
		}
		
		
		static function Id($value)
		{
			if (!empty($value)) :
				return ' id="' . $value . '" ';
			endif;
		}
		
		
		static function Href($value)
		{
			if (!empty($value)) :
				return ' href="' . $value . '" ';
			endif;
		}
		
		
		static function Src($value)
		{
			if (!empty($value)) :
				return ' src="' . $value . '" ';
			endif;
		}
		
		
		static function Rel($value)
		{
			if (!empty($value)) :
				return ' rel="' . $value . '" ';
			endif;
		}
		
		
		static function Type($value)
		{
			if (!empty($value)) :
				return ' type="' . $value . '" ';
			endif;
			
		}
		
		
		static function Url($value)
		{
			if (!empty($value)) :
				return 'url('. $value .')';
			endif;
			
		}
		
		
		static function TagA($id, $class, $value, $link)
		{
			if (!empty($value)) :
				
				if (!empty($link)) :
				
					return '<a ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Href($link) . '>' . $value . '</a>';
				
						else :
							return '<span ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Href($link) . '>' . $value . '</span>';
				
				endif;
				
			endif;
		}
		
		
		static function TagImg($id, $class, $src)
		{
			if (!empty($src)) :
				return '<img ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . ' src="' . $src . '">';
			endif;
		}
		
		
		static function TagScript($src)
		{
			if (!empty($src)) :
				return '<script src="' . $src . '"></script>';
			endif;
		}
		
		
		static function TagLink($rel, $type, $href)
		{
			if (!empty($href)) :
				return '<link ' . Spw_Html::Rel($rel) . Spw_Html::Type($type) . Spw_Html::Href($href) . '"></link>';
			endif;
		}
		
		
		static function TagLinkCss($href)
		{
			if (!empty($href)) :
				return '<link rel="stylesheet" type="text/css" ' . Spw_Html::Href($href) .' "></link>';
			endif;
		}
		
		
		static function TagH1($id, $class, $value, $style)
		{
			if (!empty($value)) :
				return '<h1 ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Style($style) . '>' . $value . '</h1>';
			endif;
		}
		
		
		static function TagH2($id, $class, $value, $style)
		{
			if (!empty($value)) :
				return '<h2 ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Style($style) . '>' . $value . '</h2>';
			endif;
		}
		
		
		static function TagH3($id, $class, $value, $style)
		{
			if (!empty($value)) :
				return '<h3 ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Style($style) . '>' . $value . '</h3>';
			endif;
		}
		
		
		static function TagH4($id, $class, $value, $style)
		{
			if (!empty($value)) :
				return '<h4 ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Style($style) . '>' . $value . '</h4>';
			endif;
		}
		
		
		static function TagHr($id, $class, $style)
		{
			return '<hr ' . Spw_Html:: Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Style($style) . '>';
		}
		
		
		static function TagP($id, $class, $style, $value)
		{
			return '<p ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Style($style) . '>' . $value . '</p>';
		}
		
		
		static function TagDiv($id, $class, $style, $value)
		{
			return '<div ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . Spw_Html::Style($style) . '>' . $value . '</div>';
		}

          
          
     }