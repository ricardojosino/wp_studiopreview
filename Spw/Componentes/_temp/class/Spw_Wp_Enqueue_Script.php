<?php

	class Spw_Wp_Enqueue_Script

     {

          // ATRIBUTOS

			protected $name;
			protected $src;
			protected $versao;
			protected $in_footer;
			protected $dep;
			protected $tag;

          // METODOS DE CONFIGURACAO

			public function Set_Name($value)
			{
				$this->name = $value;
			}
			
			
			public function Set_Src($value)
			{
				$this->src = $value;
			}
			
			
			public function Set_Versao($value)
			{
				$this->versao = $value;
			}
			
			
			public function Set_InFooter($value)
			{
				$this->in_footer = $value;
			}
			
			
			public function Set_Dependencias($array)
			{
				$this->dep = $array;
			}
			
			
			public function Set_Tag_AdminEnqueueScripts()
			{
				$this->tag = 'admin_enqueue_scripts';
			}
			
			
			public function Set_Tag_WpEnqueueScripts()
					
			{
				$this->tag = 'wp_enqueue_scripts';
			}
			
			

          // METODOS DE PROCESSO
			
			public function Script()
			{
				
				wp_enqueue_script($this->name, $this->src, $this->dep, $this->versao, $this->in_footer);
				
			}
			
			
			public function Tag()
			{
				if (empty($this->tag)) :
					return 'wp_enqueue_scripts';
				
						else :
							return $this->tag;
				endif;
			}
			
			
		
			public function Action()
			{
				if (!empty($this->name) and !empty($this->src)) :
					add_action($this->Tag(), array( $this, 'Script' ));
				endif;
				
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->Action();

          }


      }
