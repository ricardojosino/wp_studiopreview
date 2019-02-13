<?php

	// FUNCAO PARA CARREGAR CLASSE AUTOMATICAMENTE
     function AutoLoad($ClassName)

     {
		 if (file_exists(get_template_directory() . '/spw/_library/class/' . $ClassName . ".php")) :
			include get_template_directory() . '/spw/_library/class/' . $ClassName . ".php";
				
				else :
					return false;
		 endif;
     }
	 
	 
	 
	 // ACTIONS
	 add_action('admin_head', 'spw_admin_css_link', 10);
	 add_action('wp_head', 'spw_css_ui_components', 1);
	 
	 
	 function spw_admin_css_link()
	 {
		 echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/spw/_library/css/admin.css"></link>';
	 }
	 
	 
	 function spw_css_ui_components()
	 {
		 echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/spw/_library/css/ui_components.css"></link>';
	 }
	 
	 
	 
	 function spw_install($module)
	 
	 {
		 if (!empty($module) and file_exists( get_template_directory() . '/spw/' . $module . '/index.php' )) :
			 
			 include get_template_directory() . '/spw/' . $module . '/index.php';
			 
		 endif;
	 }
	 
	 
	 function spw_upload_patch()
	 {
		 return ABSPATH . 'wp-content/uploads';
	 }
	 
	 
	 function spw_upload_url()
	 {
		 return get_bloginfo('url') . '/wp-content/uploads';
	 }
	 
	 
	 
	 
	 
	 function spw_header($module, $view)
	 
	 {
		 if (file_exists( get_template_directory() . '/spw/' . $module . '/view/' . $view )) :
			 include get_template_directory() . '/spw/' . $module . '/view/' . $view;
		 
				else :
					include get_template_directory() . '/header.php';
			 
		 endif;
	 }
	 
	 
	 
	 function spw_footer($module, $view)
	 
	 {
		 if (file_exists( get_template_directory() . '/spw/' . $module . '/view/' . $view )) :
			 include get_template_directory() . '/spw/' . $module . '/view/' . $view;
		 
				else :
					include get_template_directory() . '/footer.php';
			 
		 endif;
	 }



	 function spw_app_url($app)
	 {
		return get_template_directory_uri() . '/spw/' . $app;
	 }



	 function spw_app_path($app)
	 {
		return get_template_directory() . '/spw/' . $app;
	 }



	 function spw_app_img_url($app, $nome_arquivo)
	 {
		return get_template_directory_uri() . '/spw/' . $app . '/img/' . $nome_arquivo;
	 }


	 function spw_app_img_path($app, $nome_arquivo)
	 {
		return get_template_directory() . '/spw/' . $app . '/img/' . $nome_arquivo;
	 }


	 function spw_app_view_url($app, $nome_arquivo)
	 {
		return get_template_directory_uri() . '/spw/' . $app . '/view/' . $nome_arquivo . '.php';
	 }


	 function spw_app_view_path($app, $nome_arquivo)
	 {
		return get_template_directory() . '/spw/' . $app . '/view/' . $nome_arquivo . '.php';
	 }


	 function spw_app_include_view($app)
	 {
		 
		 if (file_exists(spw_app_view_path($app, $_GET['view']))) :
		 
			include spw_app_view_path($app, $_GET['view']);

				else :
					echo '<h1>Não achamos o arquivo ' . $_GET['view'] . '.php' . ' na pasta VIEW para incluir.</h1>';
		 
		 endif;
	 }
	 
	 
	 function spw_app_include_class($app, $class)
	 {
		 
		 $path = spw_app_path($app) . '/class/' . $class . '.php'; 
		 
		 if (file_exists($path)) :
			 include $path;
		 endif;
		 
	 }
	 


	 function spw_app_url_view($view, $parametros)
	 {

		(!empty($parametros)) ? $get_parametros = '&' . $parametros : $get_parametros = '';
		(!empty($view)) ? $get_pageview = '&view=' . $view : $get_pageview = '';
		return get_bloginfo( 'url') . '/wp-admin/admin.php?page=' . $_GET['page'] . $get_pageview . $get_parametros;
	 }


	 function spw_app_url_action($action, $parametros)
	 {

		(!empty($parametros)) ? $get_parametros = '&' . $parametros : $get_parametros = null;
		(!empty($action)) ? $get_action = '&actions=' . $action : $get_action = null;
		return get_bloginfo( 'url') . '/wp-admin/admin.php?page=' . $_GET['page'] . $get_action . $get_parametros;
	 }
	 
	 
	 
	 function spw_module_img_url($module, $filename)
	 
	 {
		 return get_template_directory_uri() . '/spw/' . $module . '/img/' . $filename;
	 }
	 
	 
	 
	 function spw_view($value)
	 
	 {
		 if (!empty($value)) :
			 return join('', $value);
		 endif;
	 }
	 
	 
	 
	 function spw_action_form()
	 {
		 return spw_montar_link(basename($_SERVER['SCRIPT_FILENAME']), $_SERVER['QUERY_STRING']);
	 }
	 
	 
	 
	 function spw_montar_link($link, $parametros)

     {
          
          if (!empty($link)) :
               
               

               // DEFINE ANCORA
               $verifica_ancora = strpos($link,"#");

               if ($verifica_ancora === FALSE) :

                    $ancora = "";
                    $link_atualizado = $link;

                         else : 

                         $divide = explode("#",$link);
                         $ancora = "#" . $divide['1'];
                         $link_atualizado = $divide['0'];
               endif;


               if (!empty($parametros)) :

                    // VERIFICA SE EXISTE O PONTO DE INTERROGACAO
                    $verifica = strpos($link_atualizado, "?");

                         // SE NAO TIVER, INSERIR ?
                         if ($verifica === FALSE) :

                              $novo_link = $link_atualizado . "?" . $parametros . $ancora;

                                   // SE TIVER, INSERIR &
                                   else :
                                        $novo_link = $link_atualizado . "&" . $parametros . $ancora;
                         endif;



                    return $novo_link;

                    else :
                         return $link_atualizado;

               endif;

          
          
          endif;
     }
	 
	 
	 
	 function spw_charset()

     {

          header("Content-type: text/html; charset=utf-8");

     }
	 
	 

	 
	 // TOOLS
	 function spw_tools_date()

     {

          return  date('Y-m-d');

     }
	 
	 
	 
	 function spw_tools_date_time()
	 
	 {
		 return date('Y-m-d H:i:s');
	 }
	 
	 
	 
	 function spw_tools_time()
	 
	 {
		 return date('H:i:s');
	 }
	 
	 
	 
	 function spw_tools_format_date($data)

	{

	  if (!empty($data)) :

		   $Ano = substr($data,0,4);
		   $Mes = substr($data,5,2);
		   $Dia = substr($data,8,2);


		   $ExibirData = $Dia."-".$Mes."-".$Ano;
		   return ($ExibirData);

		   else : 
				return '';

	 endif;
	}
	
	
	
	function spw_tools_limit_text($texto, $limite)
			
	{
		if (!empty($texto)) :
		
			$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
			return $texto;
		
		endif;
	}
	
	
	function spw_tools_criar_diretorio($pathname)
	{
		
		if (!file_exists($pathname)) :
			mkdir($pathname, 0777);
		endif;
		
	}
	
	
	
	function spw_tools_user_id()

	{
		return get_current_user_id();
	}
	
	
	
	function spw_tools_user_login($user_id)
	
	{
		return get_the_author_meta('user_login', $user_id);
	}
	
	
	
	function spw_tools_user_pass($user_id)
	
	{
		return get_the_author_meta('user_pass', $user_id);
		
	}
	
	
	
	function spw_tools_user_nicename($user_id)
	
	{
		return get_the_author_meta('user_nicename', $user_id);
	}
	
	
	
	function spw_tools_user_email($user_id)
	
	{
		return get_the_author_meta('user_email', $user_id);
	}
	
	
	
	function spw_tools_user_url($user_id)
	
	{
		return get_the_author_meta('user_url', $user_id);
	}
	
	
	
	function spw_tools_user_status($user_id)
	
	{
		return get_the_author_meta('user_status', $user_id);
	}
	
	
	
	function spw_tools_user_name($user_id)
	
	{
		return get_the_author_meta('display_name', $user_id);
	}
	
	
	function spw_tools_codigo_alfanumerico_32()
	{
		return date('dmYHis').str_shuffle('2a3s4d2cg53r7s5f3s');
	}
	
	
	
	
	 
	 