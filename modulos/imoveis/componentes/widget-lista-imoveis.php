<?php

     namespace Imoveis\Componentes;
     

     
     class WidgetImoveis_ListarImoveis extends \WP_Widget

     {
          
          public $instance;


          public function __construct()

          {
               $id = 'spw-imoveis-listar';
               $name = 'SPW IMÓVEIS - Listar imóveis.';
               $description = array('description' => 'Exibe uma lista de imóveis.');

               parent::__construct($id, $name, $description);
               
          }
     
         
          public function widget($arqs, $instance)

          {
               
               $lista = new \Imoveis\Componentes\ListarImoveis();
               $lista->Set_Instance($instance);
               $lista->Set_Style_FontFamily($instance['style_font_family']);
               $lista->Set_Style_BorderColor($instance['style_border_color']);
               $lista->Set_Style_BorderRadius($instance['style_border_radius']);
               $lista->Set_Style_BackgroundColor($instance['style_background_color']);
               $lista->Set_Style_BoxShadow($instance['style_box_shadow']);
               $lista->Set_Style_TextoReferencia_Color($instance['style_texto_referencia_color']);
               $lista->Set_Style_TextoReferencia_FontSize($instance['style_texto_referencia_font_size']);
               $lista->Set_Style_TextoReferencia_FontWeight($instance['style_texto_referencia_font_weight']);
               $lista->Set_Style_TextoReferencia_TextTransform($instance['style_texto_referencia_text_transform']);
               $lista->Set_Style_TextoTitulo_Color($instance['style_texto_titulo_color']);
               $lista->Set_Style_TextoTitulo_FontSize($instance['style_texto_titulo_font_size']);
               $lista->Set_Style_TextoTitulo_FontWeight($instance['style_texto_titulo_font_weight']);
               $lista->Set_Style_TextoTitulo_TextTransform($instance['style_texto_titulo_text_transform']);
               $lista->Set_Style_TextoEndereco_Color($instance['style_texto_endereco_color']);
               $lista->Set_Style_TextoEndereco_FontSize($instance['style_texto_endereco_font_size']);
               $lista->Set_Style_TextoEndereco_FontWeight($instance['style_texto_endereco_font_weight']);
               $lista->Set_Style_TextoEndereco_TextTransform($instance['style_texto_endereco_text_transform']);
               $lista->Set_Style_TextoItens_Color($instance['style_texto_itens_color']);
               $lista->Set_Style_TextoItens_FontSize($instance['style_texto_itens_font_size']);
               $lista->Set_Style_TextoItens_FontWeight($instance['style_texto_itens_font_weight']);
               $lista->Set_Style_TextoItens_TextTransform($instance['style_texto_itens_text_transform']);
               $lista->Executar();
               
               
               
               echo $lista->render;
          }
          
          
          public function DadosCategorias()
          {
               return get_terms( array('taxonomy' => 'spw-imoveis-categoria') );
          }
          
          
          public function DadosNegocios()
          {
               return get_terms( array('taxonomy' => 'spw-imoveis-negocio') );
          }
          
          
          public function DadosFinalidade()
          {
               return get_terms( array('taxonomy' => 'spw-imoveis-finalidade') );
          }
          
          public function DadosDestaque()
          {
               return get_terms( array('taxonomy' => 'spw-imoveis-destaque') );
          }
          

          public function form($instance)

          {
               
               

               // ID
               $id['filtro_categorias'] = $this->get_field_id('filtro_categorias');
               $id['filtro_negocios'] = $this->get_field_id('filtro_negocios');
               $id['filtro_finalidade'] = $this->get_field_id('filtro_finalidade');
               $id['filtro_classificacao'] = $this->get_field_id('filtro_classificacao');
               $id['filtro_ordem'] = $this->get_field_id('filtro_ordem');
               $id['filtro_showposts'] = $this->get_field_id('filtro_showposts');
               $id['filtro_destaque'] = $this->get_field_id('filtro_destaque');
               $id['exibir_paginacao'] = $this->get_field_id('exibir_paginacao');
               $id['style_font_family'] = $this->get_field_id('style_font_family');
               $id['style_border_color'] = $this->get_field_id('style_border_color');
               $id['style_border_radius'] = $this->get_field_id('style_border_radius');
               $id['style_background_color'] = $this->get_field_id('style_background_color');
               $id['style_box_shadow'] = $this->get_field_id('style_box_shadow');
               $id['style_texto_referencia_color'] = $this->get_field_id('style_texto_referencia_color');
               $id['style_texto_referencia_font_size'] = $this->get_field_id('style_texto_referencia_font_size');
               $id['style_texto_referencia_font_weight'] = $this->get_field_id('style_texto_referencia_font_weight');
               $id['style_texto_referencia_text_transform'] = $this->get_field_id('style_texto_referencia_text_transform');
               $id['style_texto_titulo_color'] = $this->get_field_id('style_texto_titulo_color');
               $id['style_texto_titulo_font_size'] = $this->get_field_id('style_texto_titulo_font_size');
               $id['style_texto_titulo_font_weight'] = $this->get_field_id('style_texto_titulo_font_weight');
               $id['style_texto_titulo_text_transform'] = $this->get_field_id('style_texto_titulo_text_transform');
               $id['style_texto_endereco_color'] = $this->get_field_id('style_texto_endereco_color');
               $id['style_texto_endereco_font_size'] = $this->get_field_id('style_texto_endereco_font_size');
               $id['style_texto_endereco_font_weight'] = $this->get_field_id('style_texto_endereco_font_weight');
               $id['style_texto_endereco_text_transform'] = $this->get_field_id('style_texto_endereco_text_transform');
               $id['style_texto_itens_color'] = $this->get_field_id('style_texto_itens_color');
               $id['style_texto_itens_font_size'] = $this->get_field_id('style_texto_itens_font_size');
               $id['style_texto_itens_font_weight'] = $this->get_field_id('style_texto_itens_font_weight');
               $id['style_texto_itens_text_transform'] = $this->get_field_id('style_texto_itens_text_transform');

               // NAME
               $name['filtro_categorias'] = $this->get_field_name('filtro_categorias');
               $name['filtro_negocios'] = $this->get_field_name('filtro_negocios');
               $name['filtro_finalidade'] = $this->get_field_name('filtro_finalidade');
               $name['filtro_classificacao'] = $this->get_field_name('filtro_classificacao');
               $name['filtro_ordem'] = $this->get_field_name('filtro_ordem');
               $name['filtro_showposts'] = $this->get_field_name('filtro_showposts');
               $name['filtro_destaque'] = $this->get_field_name('filtro_destaque');
               $name['exibir_paginacao'] = $this->get_field_name('exibir_paginacao');
               $name['style_font_family'] = $this->get_field_name('style_font_family');
               $name['style_border_color'] = $this->get_field_name('style_border_color');
               $name['style_border_radius'] = $this->get_field_name('style_border_radius');
               $name['style_background_color'] = $this->get_field_name('style_background_color');
               $name['style_box_shadow'] = $this->get_field_name('style_box_shadow');
               $name['style_texto_referencia_color'] = $this->get_field_name('style_texto_referencia_color');
               $name['style_texto_referencia_font_size'] = $this->get_field_name('style_texto_referencia_font_size');
               $name['style_texto_referencia_font_weight'] = $this->get_field_name('style_texto_referencia_font_weight');
               $name['style_texto_referencia_text_transform'] = $this->get_field_name('style_texto_referencia_text_transform');
               $name['style_texto_titulo_color'] = $this->get_field_name('style_texto_titulo_color');
               $name['style_texto_titulo_font_size'] = $this->get_field_name('style_texto_titulo_font_size');
               $name['style_texto_titulo_font_weight'] = $this->get_field_name('style_texto_titulo_font_weight');
               $name['style_texto_titulo_text_transform'] = $this->get_field_name('style_texto_titulo_text_transform');
               $name['style_texto_endereco_color'] = $this->get_field_name('style_texto_endereco_color');
               $name['style_texto_endereco_font_size'] = $this->get_field_name('style_texto_endereco_font_size');
               $name['style_texto_endereco_font_weight'] = $this->get_field_name('style_texto_endereco_font_weight');
               $name['style_texto_endereco_text_transform'] = $this->get_field_name('style_texto_endereco_text_transform');
               $name['style_texto_itens_color'] = $this->get_field_name('style_texto_itens_color');
               $name['style_texto_itens_font_size'] = $this->get_field_name('style_texto_itens_font_size');
               $name['style_texto_itens_font_weight'] = $this->get_field_name('style_texto_itens_font_weight');
               $name['style_texto_itens_text_transform'] = $this->get_field_name('style_texto_itens_text_transform');

               // VALUE
               $value['filtro_categorias'] = (isset($instance['filtro_categorias'])) ? $instance['filtro_categorias'] : '';
               $value['filtro_negocios'] = (isset($instance['filtro_negocios'])) ? $instance['filtro_negocios'] : '';
               $value['filtro_finalidade'] = (isset($instance['filtro_finalidade'])) ? $instance['filtro_finalidade'] : '';
               $value['filtro_classificacao'] = (isset($instance['filtro_classificacao'])) ? $instance['filtro_classificacao'] : '';
               $value['filtro_ordem'] = (isset($instance['filtro_ordem'])) ? $instance['filtro_ordem'] : '';
               $value['filtro_showposts'] = (isset($instance['filtro_showposts'])) ? $instance['filtro_showposts'] : '';
               $value['filtro_destaque'] = (isset($instance['filtro_destaque'])) ? $instance['filtro_destaque'] : '';
               $value['exibir_paginacao'] = (isset($instance['exibir_paginacao'])) ? $instance['exibir_paginacao'] : '';
               $value['style_font_family'] = (isset($instance['style_font_family'])) ? $instance['style_font_family'] : '';
               $value['style_border_color'] = (isset($instance['style_border_color'])) ? $instance['style_border_color'] : '';
               $value['style_border_radius'] = (isset($instance['style_border_radius'])) ? $instance['style_border_radius'] : '';
               $value['style_background_color'] = (isset($instance['style_background_color'])) ? $instance['style_background_color'] : '';
               $value['style_box_shadow'] = (isset($instance['style_box_shadow'])) ? $instance['style_box_shadow'] : '';
               $value['style_texto_referencia_font_size'] = (isset($instance['style_texto_referencia_font_size'])) ? $instance['style_texto_referencia_font_size'] : '';
               $value['style_texto_referencia_font_weight'] = (isset($instance['style_texto_referencia_font_weight'])) ? $instance['style_texto_referencia_font_weight'] : '';
               $value['style_texto_referencia_text_transform'] = (isset($instance['style_texto_referencia_text_transform'])) ? $instance['style_texto_referencia_text_transform'] : '';
               $value['style_texto_titulo_color'] = (isset($instance['style_texto_titulo_color'])) ? $instance['style_texto_titulo_color'] : '';
               $value['style_texto_titulo_font_size'] = (isset($instance['style_texto_titulo_font_size'])) ? $instance['style_texto_titulo_font_size'] : '';
               $value['style_texto_titulo_font_weight'] = (isset($instance['style_texto_titulo_font_weight'])) ? $instance['style_texto_titulo_font_weight'] : '';
               $value['style_texto_titulo_text_transform'] = (isset($instance['style_texto_titulo_text_transform'])) ? $instance['style_texto_titulo_text_transform'] : '';
               $value['style_texto_endereco_color'] = (isset($instance['style_texto_endereco_color'])) ? $instance['style_texto_endereco_color'] : '';
               $value['style_texto_endereco_font_size'] = (isset($instance['style_texto_endereco_font_size'])) ? $instance['style_texto_endereco_font_size'] : '';
               $value['style_texto_endereco_font_weight'] = (isset($instance['style_texto_endereco_font_weight'])) ? $instance['style_texto_endereco_font_weight'] : '';
               $value['style_texto_endereco_text_transform'] = (isset($instance['style_texto_endereco_text_transform'])) ? $instance['style_texto_endereco_text_transform'] : '';
               $value['style_texto_itens_color'] = (isset($instance['style_texto_itens_color'])) ? $instance['style_texto_itens_color'] : '';
               $value['style_texto_itens_font_size'] = (isset($instance['style_texto_itens_font_size'])) ? $instance['style_texto_itens_font_size'] : '';
               $value['style_texto_itens_font_weight'] = (isset($instance['style_texto_itens_font_weight'])) ? $instance['style_texto_itens_font_weight'] : '';
               $value['style_texto_itens_text_transform'] = (isset($instance['style_texto_itens_text_transform'])) ? $instance['style_texto_itens_text_transform'] : '';

               // CARREGA FORMULARIO
               
               $dados_categorias = $this->DadosCategorias();
               $campo_filtro_categorias = new \Spw\Componentes\Html\Form_Select();
               $campo_filtro_categorias->Set_Exibir(true);
               $campo_filtro_categorias->Set_Id($id['filtro_categorias']);
               $campo_filtro_categorias->Set_Name($name['filtro_categorias']);
               $campo_filtro_categorias->Set_ValueDefault($value['filtro_categorias']);
               $campo_filtro_categorias->Set_Label('Categoria');
               $campo_filtro_categorias->Set_AddOption('', 'Vazio');
               
               foreach($dados_categorias AS $categoria) :
                    $campo_filtro_categorias->Set_AddOption($categoria->term_id, $categoria->name);
               endforeach;
               
               $campo_filtro_categorias->Executar();
               
               
               $dados_negocios = $this->DadosNegocios();
               $campo_filtro_negocios = new \Spw\Componentes\Html\Form_Select();
               $campo_filtro_negocios->Set_Exibir(true);
               $campo_filtro_negocios->Set_Id($id['filtro_negocios']);
               $campo_filtro_negocios->Set_Name($name['filtro_negocios']);
               $campo_filtro_negocios->Set_ValueDefault($value['filtro_negocios']);
               $campo_filtro_negocios->Set_Label('Negócio');
               $campo_filtro_negocios->Set_AddOption('', 'Vazio');
               
               foreach($dados_negocios AS $negocio) :
                    $campo_filtro_negocios->Set_AddOption($negocio->term_id, $negocio->name);
               endforeach;
               
               $campo_filtro_negocios->Executar();
               
               $dados_finalidade = $this->DadosFinalidade();
               $campo_filtro_finalidade = new \Spw\Componentes\Html\Form_Select();
               $campo_filtro_finalidade->Set_Exibir(true);
               $campo_filtro_finalidade->Set_Id($id['filtro_finalidade']);
               $campo_filtro_finalidade->Set_Name($name['filtro_finalidade']);
               $campo_filtro_finalidade->Set_ValueDefault($value['filtro_finalidade']);
               $campo_filtro_finalidade->Set_Label('Finalidade');
               $campo_filtro_finalidade->Set_AddOption('', 'Vazio');
               
               foreach($dados_finalidade AS $finalidade) :
                    $campo_filtro_finalidade->Set_AddOption($finalidade->term_id, $finalidade->name);
               endforeach;
               
               $campo_filtro_finalidade->Executar();
               
               $dados_destaque = $this->DadosDestaque();
               $campo_filtro_destaque = new \Spw\Componentes\Html\Form_Select();
               $campo_filtro_destaque->Set_Exibir(true);
               $campo_filtro_destaque->Set_Id($id['filtro_destaque']);
               $campo_filtro_destaque->Set_Name($name['filtro_destaque']);
               $campo_filtro_destaque->Set_ValueDefault($value['filtro_destaque']);
               $campo_filtro_destaque->Set_Label('Destaque');
               $campo_filtro_destaque->Set_AddOption('', 'Vazio');
               
               foreach($dados_destaque AS $destaque) :
                    $campo_filtro_destaque->Set_AddOption($destaque->term_id, $destaque->name);
               endforeach;
               
               $campo_filtro_destaque->Executar();
               
               
               $campo_filtro_classificacao = new \Spw\Componentes\Html\Form_Select();
               $campo_filtro_classificacao->Set_Exibir(true);
               $campo_filtro_classificacao->Set_Id($id['filtro_classificacao']);
               $campo_filtro_classificacao->Set_Name($name['filtro_classificacao']);
               $campo_filtro_classificacao->Set_ValueDefault($value['filtro_classificacao']);
               $campo_filtro_classificacao->Set_Label('Classificar');
               $campo_filtro_classificacao->Set_AddOption('', 'Vazio');
               $campo_filtro_classificacao->Set_AddOption('title', 'Por Título');
               $campo_filtro_classificacao->Set_AddOption('date', 'Por Data');
               $campo_filtro_classificacao->Set_AddOption('rand', 'Aleatório');
               $campo_filtro_classificacao->Executar();
               
               $campo_filtro_ordem = new \Spw\Componentes\Html\Form_Select();
               $campo_filtro_ordem->Set_Exibir(true);
               $campo_filtro_ordem->Set_Id($id['filtro_ordem']);
               $campo_filtro_ordem->Set_Name($name['filtro_ordem']);
               $campo_filtro_ordem->Set_ValueDefault($value['filtro_ordem']);
               $campo_filtro_ordem->Set_Label('Ordem');
               $campo_filtro_ordem->Set_AddOption('ASC', 'Crescente');
               $campo_filtro_ordem->Set_AddOption('DESC', 'Decrescente');
               $campo_filtro_ordem->Executar();
               
               $campo_filtro_showposts = new \Spw\Componentes\Html\Form_InputNumber();
               $campo_filtro_showposts->Set_Exibir(true);
               $campo_filtro_showposts->Set_Id($id['filtro_showposts']);
               $campo_filtro_showposts->Set_Name($name['filtro_showposts']);
               $campo_filtro_showposts->Set_Placeholder('Todas');
               $campo_filtro_showposts->Set_Value($value['filtro_showposts']);
               $campo_filtro_showposts->Set_Label('Número de postagens');
               $campo_filtro_showposts->Set_Min(1);
               $campo_filtro_showposts->Executar();
               
               $campo_exibir_paginacao = new \Spw\Componentes\Html\Form_Select();
               $campo_exibir_paginacao->Set_Exibir(true);
               $campo_exibir_paginacao->Set_Id($id['exibir_paginacao']);
               $campo_exibir_paginacao->Set_Name($name['exibir_paginacao']);
               $campo_exibir_paginacao->Set_ValueDefault($value['exibir_paginacao']);
               $campo_exibir_paginacao->Set_Label('Exibir paginação');
               $campo_exibir_paginacao->Set_AddOption('N', 'Não exibir');
               $campo_exibir_paginacao->Set_AddOption('Y', 'Exibir');
               $campo_exibir_paginacao->Executar();
               
               $campo_style_font_family = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_font_family->Set_Exibir(true);
               $campo_style_font_family->Set_Id($id['style_font_family']);
               $campo_style_font_family->Set_Name($name['style_font_family']);
               $campo_style_font_family->Set_Value($value['style_font_family']);
               $campo_style_font_family->Set_Label('font-family');
               $campo_style_font_family->Set_Placeholder('Padrão');
               $campo_style_font_family->Executar();
               
               $campo_style_border_color = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_border_color->Set_Exibir(true);
               $campo_style_border_color->Set_Id($id['style_border_color']);
               $campo_style_border_color->Set_Name($name['style_border_color']);
               $campo_style_border_color->Set_Value($value['style_border_color']);
               $campo_style_border_color->Set_Label('border_color');
               $campo_style_border_color->Set_Placeholder('Padrão');
               $campo_style_border_color->Executar();
               
               $campo_style_border_radius = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_border_radius->Set_Exibir(true);
               $campo_style_border_radius->Set_Id($id['style_border_radius']);
               $campo_style_border_radius->Set_Name($name['style_border_radius']);
               $campo_style_border_radius->Set_Value($value['style_border_radius']);
               $campo_style_border_radius->Set_Label('border-radius');
               $campo_style_border_radius->Set_Placeholder('Padrão');
               $campo_style_border_radius->Executar();
               
               $campo_style_background_color = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_background_color->Set_Exibir(true);
               $campo_style_background_color->Set_Id($id['style_background_color']);
               $campo_style_background_color->Set_Name($name['style_background_color']);
               $campo_style_background_color->Set_Value($value['style_background_color']);
               $campo_style_background_color->Set_Label('background-color');
               $campo_style_background_color->Set_Placeholder('Padrão');
               $campo_style_background_color->Executar();
               
               $campo_style_box_shadow = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_box_shadow->Set_Exibir(true);
               $campo_style_box_shadow->Set_Id($id['style_box_shadow']);
               $campo_style_box_shadow->Set_Name($name['style_box_shadow']);
               $campo_style_box_shadow->Set_Value($value['style_box_shadow']);
               $campo_style_box_shadow->Set_Label('box-shadow');
               $campo_style_box_shadow->Set_Placeholder('Padrão');
               $campo_style_box_shadow->Executar();
               
               $campo_style_texto_referencia_color = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_referencia_color->Set_Exibir(true);
               $campo_style_texto_referencia_color->Set_Id($id['style_texto_referencia_color']);
               $campo_style_texto_referencia_color->Set_Name($name['style_texto_referencia_color']);
               $campo_style_texto_referencia_color->Set_Value($value['style_texto_referencia_color']);
               $campo_style_texto_referencia_color->Set_Label('color');
               $campo_style_texto_referencia_color->Set_Placeholder('Padrão');
               $campo_style_texto_referencia_color->Executar();
               
               $campo_style_texto_referencia_font_size = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_referencia_font_size->Set_Exibir(true);
               $campo_style_texto_referencia_font_size->Set_Id($id['style_texto_referencia_font_size']);
               $campo_style_texto_referencia_font_size->Set_Name($name['style_texto_referencia_font_size']);
               $campo_style_texto_referencia_font_size->Set_Value($value['style_texto_referencia_font_size']);
               $campo_style_texto_referencia_font_size->Set_Label('font-size');
               $campo_style_texto_referencia_font_size->Set_Placeholder('Padrão');
               $campo_style_texto_referencia_font_size->Executar();
               
               $campo_style_texto_referencia_font_weight = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_referencia_font_weight->Set_Exibir(true);
               $campo_style_texto_referencia_font_weight->Set_Id($id['style_texto_referencia_font_weight']);
               $campo_style_texto_referencia_font_weight->Set_Name($name['style_texto_referencia_font_weight']);
               $campo_style_texto_referencia_font_weight->Set_Value($value['style_texto_referencia_font_weight']);
               $campo_style_texto_referencia_font_weight->Set_Label('font-weight');
               $campo_style_texto_referencia_font_weight->Set_Placeholder('Padrão');
               $campo_style_texto_referencia_font_weight->Executar();
               
               $campo_style_texto_referencia_text_transform = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_referencia_text_transform->Set_Exibir(true);
               $campo_style_texto_referencia_text_transform->Set_Id($id['style_texto_referencia_text_transform']);
               $campo_style_texto_referencia_text_transform->Set_Name($name['style_texto_referencia_text_transform']);
               $campo_style_texto_referencia_text_transform->Set_Value($value['style_texto_referencia_text_transform']);
               $campo_style_texto_referencia_text_transform->Set_Label('text-transform');
               $campo_style_texto_referencia_text_transform->Set_Placeholder('Padrão');
               $campo_style_texto_referencia_text_transform->Executar();
               
               $campo_style_texto_titulo_color = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_titulo_color->Set_Exibir(true);
               $campo_style_texto_titulo_color->Set_Id($id['style_texto_titulo_color']);
               $campo_style_texto_titulo_color->Set_Name($name['style_texto_titulo_color']);
               $campo_style_texto_titulo_color->Set_Value($value['style_texto_titulo_color']);
               $campo_style_texto_titulo_color->Set_Label('color');
               $campo_style_texto_titulo_color->Set_Placeholder('Padrão');
               $campo_style_texto_titulo_color->Executar();
               
               $campo_style_texto_titulo_font_size = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_titulo_font_size->Set_Exibir(true);
               $campo_style_texto_titulo_font_size->Set_Id($id['style_texto_titulo_font_size']);
               $campo_style_texto_titulo_font_size->Set_Name($name['style_texto_titulo_font_size']);
               $campo_style_texto_titulo_font_size->Set_Value($value['style_texto_titulo_font_size']);
               $campo_style_texto_titulo_font_size->Set_Label('font-size');
               $campo_style_texto_titulo_font_size->Set_Placeholder('Padrão');
               $campo_style_texto_titulo_font_size->Executar();
               
               $campo_style_texto_titulo_font_weight = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_titulo_font_weight->Set_Exibir(true);
               $campo_style_texto_titulo_font_weight->Set_Id($id['style_texto_titulo_font_weight']);
               $campo_style_texto_titulo_font_weight->Set_Name($name['style_texto_titulo_font_weight']);
               $campo_style_texto_titulo_font_weight->Set_Value($value['style_texto_titulo_font_weight']);
               $campo_style_texto_titulo_font_weight->Set_Label('font-weight');
               $campo_style_texto_titulo_font_weight->Set_Placeholder('Padrão');
               $campo_style_texto_titulo_font_weight->Executar();
               
               $campo_style_texto_titulo_text_transform = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_titulo_text_transform->Set_Exibir(true);
               $campo_style_texto_titulo_text_transform->Set_Id($id['style_texto_titulo_text_transform']);
               $campo_style_texto_titulo_text_transform->Set_Name($name['style_texto_titulo_text_transform']);
               $campo_style_texto_titulo_text_transform->Set_Value($value['style_texto_titulo_text_transform']);
               $campo_style_texto_titulo_text_transform->Set_Label('text-transform');
               $campo_style_texto_titulo_text_transform->Set_Placeholder('Padrão');
               $campo_style_texto_titulo_text_transform->Executar();
               
               $campo_style_texto_endereco_color = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_endereco_color->Set_Exibir(true);
               $campo_style_texto_endereco_color->Set_Id($id['style_texto_endereco_color']);
               $campo_style_texto_endereco_color->Set_Name($name['style_texto_endereco_color']);
               $campo_style_texto_endereco_color->Set_Value($value['style_texto_endereco_color']);
               $campo_style_texto_endereco_color->Set_Label('color');
               $campo_style_texto_endereco_color->Set_Placeholder('Padrão');
               $campo_style_texto_endereco_color->Executar();
               
               $campo_style_texto_endereco_font_size = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_endereco_font_size->Set_Exibir(true);
               $campo_style_texto_endereco_font_size->Set_Id($id['style_texto_endereco_font_size']);
               $campo_style_texto_endereco_font_size->Set_Name($name['style_texto_endereco_font_size']);
               $campo_style_texto_endereco_font_size->Set_Value($value['style_texto_endereco_font_size']);
               $campo_style_texto_endereco_font_size->Set_Label('font-size');
               $campo_style_texto_endereco_font_size->Set_Placeholder('Padrão');
               $campo_style_texto_endereco_font_size->Executar();
               
               $campo_style_texto_endereco_font_weight = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_endereco_font_weight->Set_Exibir(true);
               $campo_style_texto_endereco_font_weight->Set_Id($id['style_texto_endereco_font_weight']);
               $campo_style_texto_endereco_font_weight->Set_Name($name['style_texto_endereco_font_weight']);
               $campo_style_texto_endereco_font_weight->Set_Value($value['style_texto_endereco_font_weight']);
               $campo_style_texto_endereco_font_weight->Set_Label('font-weight');
               $campo_style_texto_endereco_font_weight->Set_Placeholder('Padrão');
               $campo_style_texto_endereco_font_weight->Executar();
               
               $campo_style_texto_endereco_text_transform = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_endereco_text_transform->Set_Exibir(true);
               $campo_style_texto_endereco_text_transform->Set_Id($id['style_texto_endereco_text_transform']);
               $campo_style_texto_endereco_text_transform->Set_Name($name['style_texto_endereco_text_transform']);
               $campo_style_texto_endereco_text_transform->Set_Value($value['style_texto_endereco_text_transform']);
               $campo_style_texto_endereco_text_transform->Set_Label('text-transform');
               $campo_style_texto_endereco_text_transform->Set_Placeholder('Padrão');
               $campo_style_texto_endereco_text_transform->Executar();
               
               $campo_style_texto_itens_color = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_itens_color->Set_Exibir(true);
               $campo_style_texto_itens_color->Set_Id($id['style_texto_itens_color']);
               $campo_style_texto_itens_color->Set_Name($name['style_texto_itens_color']);
               $campo_style_texto_itens_color->Set_Value($value['style_texto_itens_color']);
               $campo_style_texto_itens_color->Set_Label('color');
               $campo_style_texto_itens_color->Set_Placeholder('Padrão');
               $campo_style_texto_itens_color->Executar();
               
               $campo_style_texto_itens_font_size = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_itens_font_size->Set_Exibir(true);
               $campo_style_texto_itens_font_size->Set_Id($id['style_texto_itens_font_size']);
               $campo_style_texto_itens_font_size->Set_Name($name['style_texto_itens_font_size']);
               $campo_style_texto_itens_font_size->Set_Value($value['style_texto_itens_font_size']);
               $campo_style_texto_itens_font_size->Set_Label('font-size');
               $campo_style_texto_itens_font_size->Set_Placeholder('Padrão');
               $campo_style_texto_itens_font_size->Executar();
               
               $campo_style_texto_itens_font_weight = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_itens_font_weight->Set_Exibir(true);
               $campo_style_texto_itens_font_weight->Set_Id($id['style_texto_itens_font_weight']);
               $campo_style_texto_itens_font_weight->Set_Name($name['style_texto_itens_font_weight']);
               $campo_style_texto_itens_font_weight->Set_Value($value['style_texto_itens_font_weight']);
               $campo_style_texto_itens_font_weight->Set_Label('font-weight');
               $campo_style_texto_itens_font_weight->Set_Placeholder('Padrão');
               $campo_style_texto_itens_font_weight->Executar();
               
               $campo_style_texto_itens_text_transform = new \Spw\Componentes\Html\Form_InputText();
               $campo_style_texto_itens_text_transform->Set_Exibir(true);
               $campo_style_texto_itens_text_transform->Set_Id($id['style_texto_itens_text_transform']);
               $campo_style_texto_itens_text_transform->Set_Name($name['style_texto_itens_text_transform']);
               $campo_style_texto_itens_text_transform->Set_Value($value['style_texto_itens_text_transform']);
               $campo_style_texto_itens_text_transform->Set_Label('text-transform');
               $campo_style_texto_itens_text_transform->Set_Placeholder('Padrão');
               $campo_style_texto_itens_text_transform->Executar();
               
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_AdicionarConteudo(null, '<h1>DADOS</h1>', '15px', '15px');
               $container->Set_AdicionarConteudo(null, $campo_filtro_categorias->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_filtro_negocios->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_filtro_finalidade->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_filtro_destaque->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_filtro_classificacao->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_filtro_ordem->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_filtro_showposts->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_exibir_paginacao->render, null, null);
               $container->Set_AdicionarConteudo(null, '<h1>ESTILO CSS</h1>', '15px', '15px');
               $container->Set_AdicionarConteudo(null, '<h1>Estilo do card</h1>', '15px', '15px');
               $container->Set_AdicionarConteudo(null, $campo_style_font_family->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_border_color->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_border_radius->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_background_color->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_box_shadow->render, null, null);
               $container->Set_AdicionarConteudo(null, '<h1>Estilo da referência</h1>', '15px', '15px');
               $container->Set_AdicionarConteudo(null, $campo_style_texto_referencia_color->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_referencia_font_size->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_referencia_font_weight->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_referencia_text_transform->render, null, null);
               $container->Set_AdicionarConteudo(null, '<h1>Estilo do título</h1>', '15px', '15px');
               $container->Set_AdicionarConteudo(null, $campo_style_texto_titulo_color->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_titulo_font_size->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_titulo_font_weight->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_titulo_text_transform->render, null, null);
               $container->Set_AdicionarConteudo(null, '<h1>Estilo do endereço</h1>', '15px', '15px');
               $container->Set_AdicionarConteudo(null, $campo_style_texto_endereco_color->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_endereco_font_size->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_endereco_font_weight->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_endereco_text_transform->render, null, null);
               $container->Set_AdicionarConteudo(null, '<h1>Estilo dos itens</h1>', '15px', '15px');
               $container->Set_AdicionarConteudo(null, $campo_style_texto_itens_color->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_itens_font_size->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_itens_font_weight->render, null, null);
               $container->Set_AdicionarConteudo(null, $campo_style_texto_itens_text_transform->render, null, null);
               $container->Set_Wrap(true);
               $container->Executar();
               
               echo $container->render;

           
          }



          function update($dados, $dados_antigo)

          {
                                             
               $save['filtro_categorias'] = $dados['filtro_categorias'];
               $save['filtro_negocios'] = $dados['filtro_negocios'];
               $save['filtro_finalidade'] = $dados['filtro_finalidade'];
               $save['filtro_classificacao'] = $dados['filtro_classificacao'];
               $save['filtro_ordem'] = $dados['filtro_ordem'];
               $save['filtro_showposts'] = $dados['filtro_showposts'];
               $save['filtro_destaque'] = $dados['filtro_destaque'];
               $save['exibir_paginacao'] = $dados['exibir_paginacao'];
               $save['style_font_family'] = $dados['style_font_family'];
               $save['style_border_color'] = $dados['style_border_color'];
               $save['style_border_radius'] = $dados['style_border_radius'];
               $save['style_background_color'] = $dados['style_background_color'];
               $save['style_box_shadow'] = $dados['style_box_shadow'];
               $save['style_texto_referencia_color'] = $dados['style_texto_referencia_color'];
               $save['style_texto_referencia_font_size'] = $dados['style_texto_referencia_font_size'];
               $save['style_texto_referencia_font_weight'] = $dados['style_texto_referencia_font_weight'];
               $save['style_texto_referencia_text_transform'] = $dados['style_texto_referencia_text_transform'];
               $save['style_texto_titulo_color'] = $dados['style_texto_titulo_color'];
               $save['style_texto_titulo_font_size'] = $dados['style_texto_titulo_font_size'];
               $save['style_texto_titulo_font_weight'] = $dados['style_texto_titulo_font_weight'];
               $save['style_texto_titulo_text_transform'] = $dados['style_texto_titulo_text_transform'];
               $save['style_texto_endereco_color'] = $dados['style_texto_endereco_color'];
               $save['style_texto_endereco_font_size'] = $dados['style_texto_endereco_font_size'];
               $save['style_texto_endereco_font_weight'] = $dados['style_texto_endereco_font_weight'];
               $save['style_texto_endereco_text_transform'] = $dados['style_texto_endereco_text_transform'];
               $save['style_texto_itens_color'] = $dados['style_texto_itens_color'];
               $save['style_texto_itens_font_size'] = $dados['style_texto_itens_font_size'];
               $save['style_texto_itens_font_weight'] = $dados['style_texto_itens_font_weight'];
               $save['style_texto_itens_text_transform'] = $dados['style_texto_itens_text_transform'];

               return $save;
          }


     }    
