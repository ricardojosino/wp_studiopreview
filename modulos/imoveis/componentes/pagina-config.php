<?php

     
     namespace Imoveis\Componentes;
     
     class PaginaConfig
     {
          
          //01
          public $view;
          public $render;
          
          
          //02
          
          
          //03
          
          
          public function PainelConteudo()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
               $painel->Set_Titulo('Informações de contato');
               $painel->Set_AdicionarConteudo($this->CampoNome());
               $painel->Set_AdicionarConteudo($this->CampoEmail());
               $painel->Set_AdicionarConteudo($this->CampoSite());
               $painel->Set_AdicionarConteudo($this->CampoLogo());
               $painel->Set_AdicionarConteudo($this->CampoTelefone());
               $painel->Set_AdicionarConteudo($this->CampoPais());
               $painel->Set_AdicionarConteudo($this->CampoEstado());
               $painel->Set_AdicionarConteudo($this->CampoCidade());
               $painel->Set_AdicionarConteudo($this->CampoBairro());
               $painel->Set_AdicionarConteudo($this->CampoEndereco());
               $painel->Executar();
               
               return $painel->render;
          }
          
          public function PainelBotoes()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Botoes();
               $painel->Set_AdicionarBotao( $this->BotaoSalvar() );
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          public function PainelMensagem()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          public function CampoNome()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_nome');
               $campo->Set_Name('spw_imoveis_config_nome');
               $campo->Set_Label('Nome da empresa');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_nome') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoEmail()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_email');
               $campo->Set_Name('spw_imoveis_config_email');
               $campo->Set_Label('E-mail');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_email') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoSite()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_site');
               $campo->Set_Name('spw_imoveis_config_site');
               $campo->Set_Label('Url Website');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_site') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoLogo()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_logo');
               $campo->Set_Name('spw_imoveis_config_logo');
               $campo->Set_Label('Url da logo');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_logo') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoTelefone()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_telefone');
               $campo->Set_Name('spw_imoveis_config_telefone');
               $campo->Set_Label('Telefone');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_telefone') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoPais()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_pais');
               $campo->Set_Name('spw_imoveis_config_pais');
               $campo->Set_Label('Pais');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_pais') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoEstado()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_estado');
               $campo->Set_Name('spw_imoveis_config_estado');
               $campo->Set_Label('Estado');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_estado') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoCidade()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_cidade');
               $campo->Set_Name('spw_imoveis_config_cidade');
               $campo->Set_Label('Cidade');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_cidade') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoBairro()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_bairro');
               $campo->Set_Name('spw_imoveis_config_bairro');
               $campo->Set_Label('Bairro');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_bairro') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoEndereco()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('spw_imoveis_config_endereco');
               $campo->Set_Name('spw_imoveis_config_endereco');
               $campo->Set_Label('Endereço');
               $campo->Set_Value( \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_endereco') );
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function BotaoSalvar()
          {
               $botao = new \Spw\Componentes\Html\Form_InputSubmit();
               $botao->Set_Exibir(true);
               $botao->Set_Id('submit');
               $botao->Set_Name('submit');
               $botao->Set_Value('Salvar');
               $botao->Executar();
               
               return $botao->render;
          }
          
          public function Pagina()
          {
               $pagina = new \Spw\Componentes\UI\Admin\Pagina();
               $pagina->Set_Titulo('Imóveis');
               $pagina->Set_Subtitulo('Configuração');
               $pagina->Set_Form_Exibir(true);
               $pagina->Set_Form_Id('form-pagina-config');
               $pagina->Set_Form_Name('form-pagina-config');
               $pagina->Set_Form_Method('POST');
               $pagina->Set_Form_Action( \Spw\Componentes\Modulo\Link::ExecutarGatilho('imoveis', 'atualizar-config', null) );
               $pagina->Set_AdicionarConteudo($this->PainelMensagem(), 'mensagem');
               $pagina->Set_AdicionarConteudo($this->PainelConteudo(), 'pagina-config');
               $pagina->Set_AdicionarConteudo($this->PainelBotoes());
               $pagina->Executar();
               
               $this->view[] = $pagina->render;
          }
          
     
          public function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //04
          public function Executar()
          {
               $this->Pagina();
               $this->Render();
          }
          
          
          
     }