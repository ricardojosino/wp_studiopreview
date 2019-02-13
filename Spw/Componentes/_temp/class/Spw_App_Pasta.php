<?php

	class Spw_App_Pasta

	{

		

		// METODOS DE PROCESSO
		
		static function App($app)
		{
			return get_template_directory() . '/spw/' . $app;
		}
		
		
		static function Action($app)
		{
			return get_template_directory() . '/spw/' . $app . '/actions';
		}
		
		
		static function ClassObject($app)
		{
			return get_template_directory() . '/spw/' . $app . '/class';
		}
		
		
		static function Css($app)
		{
			return get_template_directory() . '/spw/' . $app . '/css';
		}
		
		
		static function Img($app)
		{
			return get_template_directory() . '/spw/' . $app . '/img';
		}
		
		
		static function javaScript($app)
		{
			return get_template_directory() . '/spw/' . $app . '/js';
		}
		
		
		static function View($app)
		{
			return get_template_directory() . '/spw/' . $app . '/view';
		}
		

	 }