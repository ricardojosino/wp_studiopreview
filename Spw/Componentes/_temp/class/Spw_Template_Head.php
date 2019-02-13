<?php

	class Spw_Template_Head

     {

          // ATRIBUTOS
			
			protected $title;
			protected $description;
			protected $author;
			protected $charset;
			protected $keyword;
			protected $viewport;
			protected $image;
			
			protected $facebook_type;
			protected $facebook_title;
			protected $facebook_description;
			protected $facebook_url;
			protected $facebook_image;
			protected $facebook_site_name;
			
			protected $twitter_url;
			protected $twitter_title;
			protected $twitter_description;
			protected $twitter_image;
			
			protected $view;
			public $render;


          // METODOS DE CONFIGURACAO
			
			public function Set_Title($value)
			{
				$this->title = $value;
			}
			
			
			public function Set_Description($value)
			{
				$this->description = $value;
			}
			
			
			public function Set_Image($value)
			{
				$this->image = $value;
			}
			
			public function Set_Facebook_Type($value)
			{
				$this->facebook_type = $value;
			}
			
			
			public function Set_Facebook_Title($value)
			{
				$this->facebook_title = $value;
			}
			
			
			public function Set_Facebook_Description($value)
			{
				$this->facebook_description = $value;
			}
			
			
			public function Set_Facebook_Url($value)
			{
				$this->facebook_url = $value;
			}
			
			
			public function Set_Facebook_Image($value)
			{
				$this->facebook_image = $value;
			}
			
			
			public function Set_Facebook_SiteName($value)
			{
				$this->facebook_site_name = $value;
			}
			
			
			public function Set_Twitter_Url($value)
			{
				$this->twitter_url = $value;
			}
			
			
			public function Set_Twitter_Title($value)
			{
				$this->twitter_title = $value;
			}
			
			
			public function Set_Twitter_Description($value)
			{
				$this->twitter_description = $value;
			}
			
			
			public function Set_Twitter_Image($value)
			{
				$this->twitter_image = $value;
			}
			


          // METODOS DE PROCESSO

			protected function WpHead()
			{
				ob_start();
				wp_head();
				return ob_get_clean();
			}
			
			
			protected function Title()
			{
				if (!empty($this->title)) :
					return Spw_Html::Tag('title', null, $this->title);
				
						else :
							
							return Spw_Html::Tag('title', null, get_bloginfo('name'));
					
				endif;
			}
			
			
			protected function MetaDescription()
			{
				if (!empty($this->description)) :
					return Spw_Html::Tag('meta', array('name' => 'description', 'content' => $this->description ), null);
				endif;
			}
			
			
			protected function MetaAuthor()
			{
				if (!empty($this->author)) :
					return Spw_Html::Tag('meta', array('name' => 'author', 'content' => $this->author ), null);
				endif;
			}
			
			
			protected function MetaCharSet()
			{
				if (!empty($this->charset)) :
					return Spw_Html::Tag('meta', array('name' => 'charset', 'content' => $this->charset), null);
				
						else :
							return Spw_Html::Tag('meta', array('name' => 'charset', 'content' => 'UTF-8'), null);
				endif;
			}
			
			
			protected function MetaKeyWord()
			{
				if (!empty($this->keyword)) :
					return Spw_Html::Tag('meta', array('name' => 'keywords', 'content' => $this->keyword), null);
				endif;
			}
			
			
			protected function MetaViewPort()
			{
				if (!empty($this->viewport)) :
					return Spw_Html::Tag('meta', array('name' => 'viewport', 'content' => $this->viewport), null);
				
						else :
							return Spw_Html::Tag('meta', array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'), null);
				endif;
			}
			
			
			protected function FacebookType()
			{
				if (!empty($this->facebook_type)) :
					return Spw_Html::Tag('meta', array('property' => 'og:type', 'content' => $this->facebook_type), null);
				endif;
			}
			
			
			protected function FacebookTitle()
			{
				if (!empty($this->facebook_title)) :
					return Spw_Html::Tag('meta', array('property' => 'og:title', 'content' => $this->facebook_title), null);
				endif;
			}
			
			
			protected function FacebookDescription()
			{
				if (!empty($this->facebook_description)) :
					return Spw_Html::Tag('meta', array('property' => 'og:description', 'content' => $this->facebook_description), null);
				endif;
			}
			
			
			protected function FacebookUrl()
			{
				if (!empty($this->facebook_url)) :
					return Spw_Html::Tag('meta', array('property' => 'og:url', 'content' => $this->facebook_url), null);
				endif;
			}
			
			
			protected function FacebookImage()
			{
				if (!empty($this->facebook_image)) :
					return Spw_Html::Tag('meta', array('property' => 'og:image', 'content' => $this->facebook_image), null);
				endif;
			}
			
			
			protected function FacebookSiteName()
			{
				if (!empty($this->facebook_site_name)) :
					return Spw_Html::Tag('meta', array('property' => 'og:site_name', 'content' => $this->facebook_site_name), null);
				endif;
			}
			
			
			protected function TwitterUrl()
			{
				if (!empty($this->twitter_url)) :
					return Spw_Html::Tag('meta', array('name' => 'twitter:url', 'content' => $this->twitter_url), null);
				endif;
			}
			
			
			protected function TwitterTitle()
			{
				if (!empty($this->twitter_title)) :
					return Spw_Html::Tag('meta', array('name' => 'twitter:title', 'content' => $this->twitter_title), null);
				endif;
			}
			
			
			protected function TwitterDescription()
			{
				if (!empty($this->twitter_description)) :
					return Spw_Html::Tag('meta', array('name' => 'twitter:description', 'content' => $this->twitter_description), null);
				endif;
			}
			
			
			protected function TwitterImage()
			{
				if (!empty($this->twitter_image)) :
					return Spw_Html::Tag('meta', array('name' => 'twitter:image', 'content' => $this->twitter_image), null);
				endif;
			}
			
			
			protected function CSS()
			{
				$style = new Spw_Wp_Enqueue_Style();
				$style->Set_Name('style_default');
				$style->Set_Tag_WpEnqueueScripts();
				$style->Set_Src(get_template_directory_uri() . '/style.css');
				$style->Executar();
				
			}
			
			
			protected function Fonts()
			{
				Spw_Lib::Load('fonts');
			}
			
			
			protected function Bootstrap()
			{
				Spw_Lib::Load('bootstrap-3.3.7');
			}
			
			
			protected function Jquery()
			{
				Spw_Lib::Load('jquery-3.1.1');
			}
			
			
			protected function MagnificPopup()
			{
				Spw_Lib::Load('magnific-popup');
			}
			
			
			protected function FontAwesome()
			{
				Spw_Lib::Load('font-awesome');
			}
			
			
			public function Add()
			{
				
				Spw::Show($this->MetaCharSet());
				Spw::Show($this->MetaViewPort());
				Spw::Show($this->MetaKeyWord());
				Spw::Show($this->MetaAuthor());
				Spw::Show($this->MetaDescription());
				Spw::Show($this->Title());
				Spw::Show($this->FacebookType());
				Spw::Show($this->FacebookTitle());
				Spw::Show($this->FacebookDescription());
				Spw::Show($this->FacebookUrl());
				Spw::Show($this->FacebookImage());
				Spw::Show($this->FacebookSiteName());
				Spw::Show($this->TwitterUrl());
				Spw::Show($this->TwitterTitle());
				Spw::Show($this->TwitterDescription());
				Spw::Show($this->TwitterImage());
				Spw::Show($this->Fonts());
				Spw::Show($this->FontAwesome());
				Spw::Show($this->Jquery());
				Spw::Show($this->MagnificPopup());
				Spw::Show($this->Bootstrap());
				Spw::Show($this->CSS());
				
			}
			
			
			public function AddAction()
			{
				add_action('wp_head', array($this, 'Add'), 0 );
			}
			
			
			
			protected function Template()
			{
				
				$this->render = Spw_Html::Tag('head', null, $this->WpHead() );
				
			}
			
			

          // ALGORITIMO

          public function Executar()

          {

			  $this->AddAction();
			  $this->Template();

          }


      }
