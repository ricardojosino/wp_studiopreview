<?php
     
     namespace Spw\Componentes\UI\Admin;

	class Painel_Imagem
     
     {
          
     // ATRIBUTOS
		
		protected $arquivo_nome;
		protected $upload_path;
		protected $titulo;
		protected $action_excluir;
		protected $action_excluir_parametros;
		protected $contents;
		
		protected $form_file_exibir;
		protected $form_file_name;
		protected $form_file_id;
		protected $form_file_label;
		protected $form_max_file_size;
		
		protected $texto;
		
		protected $requisitos;
		protected $requisitos_descricao;
		
		protected $view;
		public $render;
          
          
          
     // METODOS DE CONFIGURACAO
		
		public function Set_Path_PastaDosArquivos($value)
		{
			$this->upload_path = $value;
		}
		
		
		public function Set_Titulo($value)
		{
			$this->titulo = $value;
		}
		
		
		public function Set_Excluir_Gatilho($value)
		{
			$this->action_excluir = $value;
		}
		
		
		public function Set_Excluir_GatilhoParametros($value)
		{
			$this->action_excluir_parametros = $value;
		}
		
		
		public function Set_Formulario_CampoFile_Exibir($value)
		{
			$this->form_file_exibir = $value;
		}
		
		
		public function Set_Formulario_CampoFile_Name($value)
		{
			$this->form_file_name = $value;
		}
		
		
		public function Set_Formulario_CampoFile_Id($value)
		{
			$this->form_file_id = $value;
		}
		
		
		public function Set_Formulario_CampoFile_Label($value)
		{
			$this->form_file_label = $value;
		}
		
		
		public function Set_Formulario_CampoFile_Value($value)
		{
			$this->arquivo_nome = $value;
		}
		
		
		public function Set_Formulario_CampoFile_MaxFileSize($value_kb)
		{
			(!empty($value_kb)) ? $this->form_max_file_size = $this->ConverterDados($value_kb) : $this->form_max_file_size = $this->ConverterDados(500);
		}
		
		
		public function Set_Texto($value)
		{
			$this->texto[] = $value;
		}
		
		
		public function Set_Requisitos_AdicionarRotulo($label, $value)
		{
			$this->requisitos[] = array('label' => $label, 'value' => $value);
		}
		
		
		public function Set_Requisitos_Descricao($value)
		{
			$this->requisitos_descricao = $value;
		}
		
		
		public function Set_AdicionarConteudo($value)
		{
			$this->contents[] = $value;
		}
          

     
     // METODOS DE PROCESSO
		
		
		protected function ConverterDados($value_kb)
		{
			return $value_kb * 1024;
		}
		
		
		protected function Src()
		{
			return $this->upload_path . '/' . $this->arquivo_nome;
		}
		
		
		protected function Imagem()
		{
			if (!empty($this->upload_path)) :
				return \Spw\Componentes\Html\Funcoes::Tag('div', null, Spw_Html::TagImg('', 'spw-imagem-300', $this->Src()) ) ;
			endif;
		}
		
		
		protected function BotaoExcluir()
		{
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Link(null, 'Excluir imagem', \Spw\Componentes\Modulo\Link::ExecutarGatilho($this->action_excluir, $this->action_excluir_parametros), null);
               $botao->Executar();
               
               return $botao->render;
		}
		
		
		protected function Menus()
		{
			if (!empty($this->arquivo_nome)) :
			
                    $painel = new \Spw\Componentes\UI\Admin\Bloco_Botoes();
                    $painel->Set_Separador(' | ');
                    $painel->Set_AddBotao(null, $this->BotaoExcluir());
                    $painel->Executar();
                    
                    return $painel->render;
			
			endif;
		}
		
		
		protected function CampoFile()
		{
			$campo_file = new \Spw\Componentes\Html\Form_InputFile();
			$campo_file->Set_Exibir($this->form_file_exibir);
			$campo_file->Set_Id($this->form_file_id);
			$campo_file->Set_Name($this->form_file_name);
			$campo_file->Set_Label($this->form_file_label);
			$campo_file->Set_Limit_Size($this->form_max_file_size);
			$campo_file->Executar();
			
			return $campo_file->render;
		}
		
		
		protected function ConteudosExtras()
		{
			if (!empty($this->contents)) :
				return join('', $this->contents);
			endif;
		}
		
		
		
		protected function Content()
		{
			if (empty($this->arquivo_nome)) :
				return $this->CampoFile() . $this->ConteudosExtras();
			
					else :
						return $this->Imagem() . $this->ConteudosExtras();
			endif;
		}
		
		
		protected function Texto()
		{
			if (!empty($this->texto)) :
				return \Spw\Componentes\Html\Funcoes::Tag('p', null, join('', $this->texto));
			endif;
		}
		
		
		
		protected function Requisitos()
		{
			
			if (!empty($this->requisitos) and empty($this->arquivo_nome)) :
			
				$alert = new \Spw\Componentes\UI\Admin\Alert();
				$alert->Set_AdicionarTitulo('Requisitos');
				$alert->Set_AdicionarDescricao($this->requisitos_descricao);
				$alert->Set_Cor_Amarelo();
				
				foreach($this->requisitos AS $item) :
					$alert->Set_AdicionarRotulo($item['label'], $item['value']);
				endforeach;
				
				$alert->Executar();
				
				return $alert->render;
			
			endif;
			
			
			
		}
		
		
		
		protected function Panel()
		{
			$panel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
			$panel->Set_Titulo($this->titulo);
			$panel->Set_AdicionarConteudo($this->Texto());
			$panel->Set_AdicionarConteudo($this->Requisitos());
			$panel->Set_AdicionarConteudo($this->Content());
			$panel->Set_AdicionarConteudo($this->Menus());
			$panel->Executar();
			
			$this->view[] = $panel->render;
		}
		
		
		
		protected function Render()
		{
			$this->render = \Spw\Componentes\Funcoes::Render($this->view);
		}
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->Panel();
               $this->Render();
               
          }
          
          
     }