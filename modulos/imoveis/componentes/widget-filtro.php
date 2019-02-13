<?php

     namespace Imoveis\Componentes;
    

    
     class WidgetImoveis_Filtro extends \WP_Widget

     {


          public function __construct()

          {
               $id = 'spw-imoveis-filtro-imovel';
               $name = 'SPW IMÓVEIS - Filtro de pesquisa';
               $description = array('description' => 'Exibe um bloco com o filtro de pesquisa.');

               parent::__construct($id, $name, $description);
          }
          
          
          public function DefaultReferencia()
          {
               if (isset($_GET['referencia']) and !empty($_GET['referencia'])) :
                    return $_GET['referencia'];
               
               
                    elseif(isset($_SESSION['referencia']) AND !empty($_SESSION['referencia'])) :
                         return $_SESSION['referencia'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultNegocio()
          {
               if (isset($_GET['negocio'])) :
                    return $_GET['negocio'];
               
               
                    elseif(isset($_SESSION['negocio']) AND !empty($_SESSION['negocio'])) :
                         return $_SESSION['negocio'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultFinalidade()
          {
               if (isset($_GET['finalidade'])) :
                    return $_GET['finalidade'];
               
               
                    elseif(isset($_SESSION['finalidade']) AND !empty($_SESSION['finalidade'])) :
                         return $_SESSION['finalidade'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultCategoria()
          {
               if (isset($_GET['categoria'])) :
                    return $_GET['categoria'];
               
               
                    elseif(isset($_SESSION['categoria'])) :
                         return $_SESSION['categoria'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultCidade()
          {
               if (isset($_GET['cidade'])) :
                    return $_GET['cidade'];
               
               
                    elseif(isset($_SESSION['cidade'])) :
                         return $_SESSION['cidade'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultBairro()
          {
               if (isset($_GET['bairro'])) :
                    return $_GET['bairro'];
               
               
                    elseif(isset($_SESSION['bairro'])) :
                         return $_SESSION['bairro'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultDormitorio()
          {
               if (isset($_GET['dormitorio'])) :
                    return $_GET['dormitorio'];
               
               
                    elseif(isset($_SESSION['dormitorio'])) :
                         return $_SESSION['dormitorio'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultSuite()
          {
               if (isset($_GET['suite'])) :
                    return $_GET['suite'];
               
               
                    elseif(isset($_SESSION['suite'])) :
                         return $_SESSION['suite'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultBwc()
          {
               if (isset($_GET['bwc']) ) :
                    return $_GET['bwc'];
               
               
                    elseif(isset($_SESSION['bwc'])) :
                         return $_SESSION['bwc'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultGaragem()
          {
               if (isset($_GET['garagem']) ) :
                    return $_GET['garagem'];
               
               
                    elseif(isset($_SESSION['garagem']) ) :
                         return $_SESSION['garagem'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultArea()
          {
               if (isset($_GET['area']) ) :
                    return $_GET['area'];
               
               
                    elseif(isset($_SESSION['area']) ) :
                         return $_SESSION['area'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function DefaultValor()
          {
               if (isset($_GET['valor']) ) :
                    return $_GET['valor'];
               
               
                    elseif(isset($_SESSION['valor']) ) :
                         return $_SESSION['valor'];
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function CssAtivo($name)
          {
               if (isset($_GET[$name]) and !empty($_GET[$name])) :
                    return 'spw-placeholder-ativo';
               
               
                    elseif(isset($_SESSION[$name]) AND !empty($_SESSION[$name])) :
                         return 'spw-placeholder-ativo ';
               
                         else :
                              return null;
                    
               endif;
          }
          
          
          public function CampoReferencia()
          {
               $campo = new \Spw\Componentes\Html\Form_InputText();
               $campo->Set_Exibir(true);
               $campo->Set_Id('referencia');
               $campo->Set_Name('referencia');
               $campo->Set_Value($this->DefaultReferencia());
               $campo->Set_Placeholder('Referência');
               $campo->Set_ClassCss($this->CssAtivo('referencia'));
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoNegocio()
          {
               
               $args['taxonomy'] = 'spw-imoveis-negocio';
               $args['orderby'] = 'negocios';
               $args['order'] = 'asc';
               $dados = get_terms($args);
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('negocio');
               $campo->Set_Name('negocio');
               $campo->Set_ClassCss($this->CssAtivo('negocio'));
               $campo->Set_ValueDefault($this->DefaultNegocio());
               $campo->Set_AddOption('', 'Negócio');
               foreach($dados AS $item) :
                    $campo->Set_AddOption($item->term_id, $item->name);
               endforeach;
               
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoFinalidade()
          {
               
               $args['taxonomy'] = 'spw-imoveis-finalidade';
               $args['orderby'] = 'finalidade';
               $args['order'] = 'asc';
               $dados = get_terms($args);
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('finalidade');
               $campo->Set_Name('finalidade');
               $campo->Set_ClassCss($this->CssAtivo('finalidade'));
               $campo->Set_ValueDefault($this->DefaultFinalidade());
               $campo->Set_AddOption('', 'Finalidade');
               foreach($dados AS $item) :
                    $campo->Set_AddOption($item->term_id, $item->name);
               endforeach;
               
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoCategorias()
          {
               
               $args['taxonomy'] = 'spw-imoveis-categoria';
               $args['post_status'] = 'publish';
               $args['orderby'] = 'categoria';
               $args['order'] = 'asc';
               
               $dados = get_terms($args);
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('categoria');
               $campo->Set_Name('categoria');
               $campo->Set_ClassCss($this->CssAtivo('categoria'));
               $campo->Set_ValueDefault($this->DefaultCategoria());
               $campo->Set_AddOption('', 'Imóvel');
               foreach($dados AS $item) :
                    $campo->Set_AddOption($item->term_id, $item->name);
               endforeach;
               
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoCidade()
          {
               
               $args['post_type'] = 'spw-imoveis';
               $args['post_status'] = 'publish';
               $dados = get_posts($args);
               
               if (!empty($dados)) :
                    foreach ($dados AS $item) :
                         $result[] = get_field('cidade', $item->ID);
                    endforeach;
               endif;
               
               if (!empty($result)) :
                    $result = array_unique($result);
                    sort($result, SORT_STRING);
               endif;
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('cidade');
               $campo->Set_Name('cidade');
               $campo->Set_ClassCss($this->CssAtivo('cidade'));
               $campo->Set_ValueDefault($this->DefaultCidade());
               $campo->Set_AddOption('', 'Cidade');
               
               if (!empty($result)) :
                    foreach($result AS $row) :
                         $campo->Set_AddOption($row, $row);
                    endforeach;
               endif;
                    
               wp_reset_postdata();
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoBairro()
          {
               $args['post_type'] = 'spw-imoveis';
               $args['post_status'] = 'publish';
               $dados = get_posts($args);
               
               if (!empty($dados)) :
                    foreach ($dados AS $item) :
                         $result[] = get_field('bairro', $item->ID);
                    endforeach;
               endif;
               
               if (!empty($result)) :
                    $result = array_unique($result);
                    sort($result, SORT_STRING);
               endif;
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('bairro');
               $campo->Set_Name('bairro');
               $campo->Set_ClassCss($this->CssAtivo('bairro'));
               $campo->Set_ValueDefault($this->DefaultBairro());
               $campo->Set_AddOption('', 'Bairro');
               
               if (!empty($result)) :
                    foreach($result AS $row) :
                         $campo->Set_AddOption($row, $row);
                    endforeach;
               endif;
                    
               wp_reset_postdata();
               $campo->Executar();
               
               return $campo->render;
          }
          
          
          public function CampoDormitorios()
          {
               $args['post_type'] = 'spw-imoveis';
               $args['post_status'] = 'publish';
               $dados = get_posts($args);
               
               if (!empty($dados)) :
                    foreach ($dados AS $item) :
                         $result[] = get_field('quantidade_de_dormitorios', $item->ID);
                    endforeach;
               endif;
               
               if (!empty($result)) :
                    $result = array_unique($result);
                    sort($result, SORT_NUMERIC);
               endif;
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('dormitorio');
               $campo->Set_Name('dormitorio');
               $campo->Set_ClassCss($this->CssAtivo('dormitorio'));
               $campo->Set_ValueDefault($this->DefaultDormitorio());
               $campo->Set_AddOption('', 'Dormitório');
               
               if (!empty($result)) :
                    foreach($result AS $row) :
                         $campo->Set_AddOption($row, \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural($row, null, 'dormitório', 'dormitórios'));
                    endforeach;
               endif;
                    
               wp_reset_postdata();
               $campo->Executar();
               
               return $campo->render;
               
          }
          
          
          public function CampoSuites()
          {
               $args['post_type'] = 'spw-imoveis';
               $args['post_status'] = 'publish';
               $dados = get_posts($args);
               
               if (!empty($dados)) :
                    foreach ($dados AS $item) :
                         $result[] = get_field('quantidade_de_suites', $item->ID);
                    endforeach;
               endif;
               
               if (!empty($result)) :
                    $result = array_unique($result);
                    sort($result, SORT_NUMERIC);
               endif;
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('suite');
               $campo->Set_Name('suite');
               $campo->Set_ClassCss($this->CssAtivo('suite'));
               $campo->Set_ValueDefault($this->DefaultSuite());
               $campo->Set_AddOption('', 'Suite');
               
               if (!empty($result)) :
                    foreach($result AS $row) :
                         $campo->Set_AddOption($row, \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural($row, null, 'suíte', 'suítes'));
                    endforeach;
               endif;
                    
               wp_reset_postdata();
               $campo->Executar();
               
               return $campo->render;
               
          }
          
          
          public function CampoBWC()
          {
               $args['post_type'] = 'spw-imoveis';
               $args['post_status'] = 'publish';
               $dados = get_posts($args);
               
               if (!empty($dados)) :
                    foreach ($dados AS $item) :
                         $result[] = get_field('quantidade_de_bwc', $item->ID);
                    endforeach;
               endif;
               
               if (!empty($result)) :
                    $result = array_unique($result);
                    sort($result, SORT_NUMERIC);
               endif;
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('bwc');
               $campo->Set_Name('bwc');
               $campo->Set_ClassCss($this->CssAtivo('bwc'));
               $campo->Set_ValueDefault($this->DefaultBwc());
               $campo->Set_AddOption('', 'BWC');
               
               if (!empty($result)) :
                    foreach($result AS $row) :
                         $campo->Set_AddOption($row, \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural($row, null, 'banheiro', 'banheiros'));
                    endforeach;
               endif;
                    
               wp_reset_postdata();
               $campo->Executar();
               
               return $campo->render;
               
          }
          
          
          public function CampoGaragem()
          {
               $args['post_type'] = 'spw-imoveis';
               $args['post_status'] = 'publish';
               $dados = get_posts($args);
               
               if (!empty($dados)) :
                    foreach ($dados AS $item) :
                         $result[] = get_field('quantidade_de_garagens', $item->ID);
                    endforeach;
               endif;
               
               if (!empty($result)) :
                    $result = array_unique($result);
                    sort($result, SORT_NUMERIC);
               endif;
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('garagem');
               $campo->Set_Name('garagem');
               $campo->Set_ClassCss($this->CssAtivo('garagem'));
               $campo->Set_ValueDefault($this->DefaultGaragem());
               $campo->Set_AddOption('', 'Garagem');
               
               if (!empty($result)) :
                    foreach($result AS $row) :
                         $campo->Set_AddOption($row, \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural($row, null, 'garagem', 'garagens'));
                    endforeach;
               endif;
                    
               wp_reset_postdata();
               $campo->Executar();
               
               return $campo->render;
               
          }
          
          
          public function CampoArea()
          {
               $args['post_type'] = 'spw-imoveis';
               $args['post_status'] = 'publish';
               $dados = get_posts($args);
               
               if (!empty($dados)) :
                    foreach ($dados AS $item) :
                         $result[] = get_field('area', $item->ID);
                    endforeach;
               endif;
               
               if (!empty($result)) :
                    $result = array_unique($result);
                    sort($result, SORT_NUMERIC);
               endif;
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('area');
               $campo->Set_Name('area');
               $campo->Set_ClassCss($this->CssAtivo('area'));
               $campo->Set_ValueDefault($this->DefaultArea());
               $campo->Set_AddOption('', 'Área');
               
               if (!empty($result)) :
                    foreach($result AS $row) :
                         $campo->Set_AddOption($row, 'Até ' .  \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural( $row, null, 'm&sup2', 'm&sup2'));
                    endforeach;
               endif;
                    
               wp_reset_postdata();
               $campo->Executar();
               
               return $campo->render;
               
          }
          
          
          public function CampoValor()
          {
               $args['post_type'] = 'spw-imoveis';
               $args['post_status'] = 'publish';
               $args['orderby'] = array('valor' => 'ASC');
               $dados = get_posts($args);
               
               if (!empty($dados)) :
                    foreach ($dados AS $item) :
                         $result[] = get_field('valor_do_imovel', $item->ID);
                    endforeach;
               endif;
               
               if (!empty($result)) :
                    $result = array_unique($result);
                    sort($result, SORT_NUMERIC);
               endif;
               
               $campo = new \Spw\Componentes\Html\Form_Select();
               $campo->Set_Exibir(true);
               $campo->Set_Id('valor');
               $campo->Set_Name('valor');
               $campo->Set_ClassCss($this->CssAtivo('valor'));
               $campo->Set_ValueDefault($this->DefaultValor());
               $campo->Set_AddOption('', 'Valor');
               
               if (!empty($result)) :
                    foreach($result AS $row) :
                         $campo->Set_AddOption($row, 'Até ' .  \Spw\Componentes\Ferramentas\Pacote::Texto_SingularOuPlural( \Spw\Componentes\Ferramentas\Pacote::Moeda_Formatar($row) , null, 'real', 'reais'));
                    endforeach;
               endif;
                    
               wp_reset_postdata();
               $campo->Executar();
               
               return $campo->render;
               
          }
          
          
          public function BotaoSubmit()
          {
               $botao = new \Spw\Componentes\Html\Form_InputSubmit();
               $botao->Set_Exibir(true);
               $botao->Set_Id('submit');
               $botao->Set_Name('submit');
               $botao->Set_Value('Buscar');
               $botao->Executar();
               
               return $botao->render;
               
          }
          
          
          public function BotaoLimpar()
          {
               $botao = new \Spw\Componentes\Html\Form_InputButton();
               $botao->Set_Exibir(true);
               $botao->Set_Id('limpar');
               $botao->Set_Name('limpar');
               $botao->Set_Value('Limpar');
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          
          public function Item($campo)
          {
               return \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-filtro-item'), $campo);
          }
          
          
          public function Botoes()
          {
               $array[] = '<div class="spw-imoveis-botoes">';
               $array[] = $this->BotaoLimpar();
               $array[] = $this->BotaoSubmit();
               $array[] = '</div>';
               
               return join('', $array);
          }
          
          
          public function Script($instance)
          {
               
               $botao_reset = file_get_contents( \Spw\Componentes\Modulo\Path::PathJs('imoveis', 'botao-reset') );
               $botao_reset = str_replace( array('{link}'), \Spw\Componentes\Ferramentas\Pacote::Url_JuntarComParametros( $instance['link_filtro'] , 'limpar=Y') , $botao_reset);
               
               return \Spw\Componentes\Html\Funcoes::Tag('script', null, $botao_reset);
               
          }
          
          
          public function SalvarSessao()
          {
               (isset($_GET['referencia'])) ? $_SESSION['referencia'] = $_GET['referencia'] : null;
               (isset($_GET['negocio'])) ? $_SESSION['negocio'] = $_GET['negocio'] : null;
               (isset($_GET['finalidade'])) ? $_SESSION['finalidade'] = $_GET['finalidade'] : null;
               (isset($_GET['categoria'])) ? $_SESSION['categoria'] = $_GET['categoria'] : null;
               (isset($_GET['cidade'])) ? $_SESSION['cidade'] = $_GET['cidade'] : null;
               (isset($_GET['bairro'])) ? $_SESSION['bairro'] = $_GET['bairro'] : null;
               (isset($_GET['dormitorio'])) ? $_SESSION['dormitorio'] = $_GET['dormitorio'] : null;
               (isset($_GET['suite'])) ? $_SESSION['suite'] = $_GET['suite'] : null;
               (isset($_GET['bwc'])) ? $_SESSION['bwc'] = $_GET['bwc'] : null;
               (isset($_GET['garagem'])) ? $_SESSION['garagem'] = $_GET['garagem'] : null;
               (isset($_GET['area'])) ? $_SESSION['area'] = $_GET['area'] : null;
               (isset($_GET['valor'])) ? $_SESSION['valor'] = $_GET['valor'] : null;
               
          }
          
          
          public function LimparSessao()
          {
               if (isset($_GET['limpar']) and $_GET['limpar'] == 'Y') :
                    
                    unset($_SESSION['referencia']);
                    unset($_SESSION['negocio']);
                    unset($_SESSION['finalidade']);
                    unset($_SESSION['categoria']);
                    unset($_SESSION['cidade']);
                    unset($_SESSION['bairro']);
                    unset($_SESSION['dormitorio']);
                    unset($_SESSION['suite']);
                    unset($_SESSION['bwc']);
                    unset($_SESSION['garagem']);
                    unset($_SESSION['area']);
                    unset($_SESSION['valor']);
                    
               endif;
          }
          
          
          public function BloquearUsoDaSessao($instance)
          {
               
               if ($instance['sessao'] == 'N') :
               
                    unset($_SESSION['referencia']);
                    unset($_SESSION['negocio']);
                    unset($_SESSION['finalidade']);
                    unset($_SESSION['categoria']);
                    unset($_SESSION['cidade']);
                    unset($_SESSION['bairro']);
                    unset($_SESSION['dormitorio']);
                    unset($_SESSION['suite']);
                    unset($_SESSION['bwc']);
                    unset($_SESSION['garagem']);
                    unset($_SESSION['area']);
                    unset($_SESSION['valor']);
               
               endif;
          }


          public function widget($arqs, $instance)

          {
               
               $this->LimparSessao();
               $this->BloquearUsoDaSessao($instance);
               
               $array[] = '<div class="spw-imoveis-filtro">';
               $array[] = '<form action="' . $instance['link_filtro'] . '" method="get">';
               $array[] = '<div class="spw-imoveis-filtro-campos">';
               $array[] = $this->Item($this->CampoReferencia());
               $array[] = $this->Item($this->CampoNegocio());
               $array[] = $this->Item($this->CampoFinalidade());
               $array[] = $this->Item($this->CampoCategorias());
               $array[] = $this->Item($this->CampoCidade());
               $array[] = $this->Item($this->CampoBairro());
               $array[] = $this->Item($this->CampoDormitorios());
               $array[] = $this->Item($this->CampoSuites());
               $array[] = $this->Item($this->CampoBWC());
               $array[] = $this->Item($this->CampoGaragem());
               $array[] = $this->Item($this->CampoArea());
               $array[] = $this->Item($this->CampoValor());
               $array[] = '</div>';
               $array[] = $this->Botoes();
               $array[] = '</form>';
               $array[] = '</div>';
               
               $array[] = $this->Script($instance);
               
               echo join('', $array);
               
               $this->SalvarSessao();

          }



          public function form($instance)

          {
               // ID
               $id['id'] = $this->get_field_id('id');
               $id['class'] = $this->get_field_id('class');
               $id['link_filtro'] = $this->get_field_id('link_filtro');
               $id['sessao'] = $this->get_field_id('sessao');

               // NAME
               $name['id'] = $this->get_field_name('id');
               $name['class'] = $this->get_field_name('class');
               $name['link_filtro'] = $this->get_field_name('link_filtro');
               $name['sessao'] = $this->get_field_name('sessao');

               // VALUE
               $value['id'] = (isset($instance['id'])) ? $instance['id'] : '';
               $value['class'] = (isset($instance['class'])) ? $instance['class'] : '';
               $value['link_filtro'] = (isset($instance['link_filtro'])) ? $instance['link_filtro'] : '';
               $value['sessao'] = (isset($instance['sessao'])) ? $instance['sessao'] : '';

               // CARREGA FORMULARIO
               $campo_id = new \Spw\Componentes\Html\Form_InputText();
               $campo_id->Set_Exibir(true);
               $campo_id->Set_Id($id['id']);
               $campo_id->Set_Name($name['id']);
               $campo_id->Set_Value($value['id']);
               $campo_id->Set_Label('ID');
               $campo_id->Executar();

               $campo_class = new \Spw\Componentes\Html\Form_InputText();
               $campo_class->Set_Exibir(true);
               $campo_class->Set_Id($id['class']);
               $campo_class->Set_Name($name['class']);
               $campo_class->Set_Value($value['class']);
               $campo_class->Set_Label('Classe CSS');
               $campo_class->Executar();

               $campo_link_filtro = new \Spw\Componentes\Html\Form_InputText();
               $campo_link_filtro->Set_Exibir(true);
               $campo_link_filtro->Set_Id($id['link_filtro']);
               $campo_link_filtro->Set_Name($name['link_filtro']);
               $campo_link_filtro->Set_Value($value['link_filtro']);
               $campo_link_filtro->Set_Label('Link do filtro (action)');
               $campo_link_filtro->Executar();

               $campo_sessao_off = new \Spw\Componentes\Html\Form_Select();
               $campo_sessao_off->Set_Exibir(true);
               $campo_sessao_off->Set_Id($id['sessao']);
               $campo_sessao_off->Set_Name($name['sessao']);
               $campo_sessao_off->Set_ValueDefault($value['sessao']);
               $campo_sessao_off->Set_Label('Memória de consulta');
               $campo_sessao_off->Set_AddOption('Y', 'Usar memória de consulta');
               $campo_sessao_off->Set_AddOption('N', 'Não usar memória de consulta');
               $campo_sessao_off->Executar();
               

               // CONTAINER
               $margin_top = '10px';
               $margin_bottom = '10px';
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_Wrap(true);
               $container->Set_AdicionarConteudo(null, $campo_id->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_class->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_link_filtro->render, $margin_top, $margin_bottom);
               $container->Set_AdicionarConteudo(null, $campo_sessao_off->render, $margin_top, $margin_bottom);
               $container->Executar();

               \Spw\Componentes\Funcoes::Show($container->render);


          }



          function update($dados, $dados_antigo)

          {
               $save['id'] = $dados['id'];
               $save['class'] = $dados['class'];
               $save['link_filtro'] = $dados['link_filtro'];
               $save['sessao'] = $dados['sessao'];

               return $save;
          }


     }    
