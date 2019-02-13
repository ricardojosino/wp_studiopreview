<?php

	class Spw_App_Url

	{

		// METODOS DE PROCESSO
		
		static function App($app)
		{
			return get_template_directory_uri() . '/spw/' . $app;
		}
		
		
		
		static function Action($app, $name)
		{
			return get_template_directory_uri() . '/spw/' . $app . '/actions/' . $name . '.php';
		}
		
		
		static function ClassObject($app, $name)
		{
			return get_template_directory_uri() . '/spw/' . $app . '/class/' . $name . '.php';
		}
		
		
		static function Css($app, $name)
		{
			return get_template_directory_uri() . '/spw/' . $app . '/css/' . $name . '.css';
		}
		
		
		static function Img($app, $filename)
		{
			return get_template_directory_uri() . '/spw/' . $app . '/img/' . $filename;
		}
		
		
		static function javaScript($app, $name)
		{
			return get_template_directory_uri() . '/spw/' . $app . '/js/' . $name . '.js';
		}
		
		
		static function View($app, $name)
		{
			return get_template_directory_uri() . '/spw/' . $app . '/view/' . $name . '.php';
		}
		


	 }