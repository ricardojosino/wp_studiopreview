<?php

	class Spw_App_Link

	{

		// ATRIBUTOS



		// METODOS DE CONFIGURACAO



		// METODOS DE PROCESSO
		
		static function Action($action, $parametros)
		{
			
			(!empty($parametros)) ? $get_parametros = '&' . $parametros : $get_parametros = '';
			(!empty($action)) ? $get_action = '&actions=' . $action : $get_action = '';
			
			return get_bloginfo( 'url') . '/wp-admin/admin.php?page=' . $_GET['page'] . $get_action . $get_parametros;
			
		}
		
		
		static function View($view, $parametros)
		{

		   (!empty($parametros)) ? $get_parametros = '&' . $parametros : $get_parametros = '';
		   (!empty($view)) ? $get_pageview = '&view=' . $view : $get_pageview = '';
		   
		   return get_bloginfo( 'url') . '/wp-admin/admin.php?page=' . $_GET['page'] . $get_pageview . $get_parametros;
		}
		
		
		
		static function Pop($id, $view, $popview, $parametros)
		{

			(!empty($id)) ? $get_pop = '&pop=' . $id : $get_pop = null;
			(!empty($view)) ? $get_view = '&view=' . $view : $get_view = null;
			(!empty($popview)) ? $get_popview = '&popview=' . $popview : $get_popview = null;
			(!empty($parametros)) ? $get_parametros = '&' . $parametros : $get_parametros = null;
		   
			return get_bloginfo( 'url') . '/wp-admin/admin.php?page=' . $_GET['page'] . $get_pop . $get_view . $get_popview . $get_parametros;
		}
		
		
		




		// ALGORITIMO

		public function Executar()

		{



		}


	 }