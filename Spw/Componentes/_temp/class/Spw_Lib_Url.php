<?php

	class Spw_Lib_Url

	{

		// METODOS DE PROCESSO
		static function Css($name)
		{
			return get_template_directory_uri() . '/spw/_library/css/' . $name . '.css';
		}
		
		
		static function Img($filename)
		{
			return get_template_directory_uri() . '/spw/_library/img/' . $filename;
		}
		
		
		static function javaScript($name)
		{
			return get_template_directory_uri() . '/spw/_library/js/' . $name . '.js';
		}
		
		
		static function View($name)
		{
			return get_template_directory_uri() . '/spw/_library/view/' . $name . '.php';
		}
		

	 }