<?php

	class Spw_Lib_Diretorio

	{

		

		// METODOS DE PROCESSO
		static function Css($name)
		{
			return get_template_directory() . '/spw/_library/css/' . $name . '.css';
		}
		
		
		static function Img($filename)
		{
			return get_template_directory() . '/spw/_library/img/' . $filename;
		}
		
		
		static function javaScript($name)
		{
			return get_template_directory() . '/spw/_library/js/' . $name . '.js';
		}
		
		
		static function View($name)
		{
			return get_template_directory() . '/spw/_library/view/' . $name . '.php';
		}
		

	 }