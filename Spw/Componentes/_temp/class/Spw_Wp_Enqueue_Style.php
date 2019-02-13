<?php

	class Spw_Wp_Enqueue_Style

     {

          // ATRIBUTOS

			protected $name;
			protected $src;
			protected $dependencias;
			protected $versao;
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
			
			
			public function Set_Dependencia($value)
			{
				$this->dependencias = $value;
			}
			
			
			public function Set_Versao($value)
			{
				$this->versao = $value;
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
				
				wp_enqueue_style($this->name, $this->src, $this->dependencias, $this->versao);
				
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
					add_action($this->Tag(), array($this, 'Script'));
				endif;	
			}



          // ALGORITIMO

          public function Executar()

          {
			  $this->Action();


          }


      }
