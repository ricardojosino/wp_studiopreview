<?php

     namespace Imoveis\Componentes;
     
     class GerarXmlDosImoveis
     
     {
          
          //01
          public $dados;
          public $view;
          public $render;
          
          
          //02
          
          
          
          //03
          
          public function Template()
          {
               
               if ( isset($_GET['xml']) and $_GET['xml'] == 'viva_real' ) :
          

                    $xml = new \Spw\Componentes\Xml\CriarElemento();
                    $xml->Set_Cabecalho_Version('1.0');
                    $xml->Set_Cabecalho_Encoding('UTF-8');
                    $xml->Set_Elementos( \Spw\Componentes\Xml\Elemento::Criar('ListingDataFeed', $this->ListingDataFeed(), array( 'xmlns' => 'http://www.vivareal.com/schemas/1.0/VRSync', 'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance', 'xsi:schemaLocation' => 'http://www.vivareal.com/schemas/1.0/VRSync  http://xml.vivareal.com/vrsync.xsd' )) );
                    $xml->Executar();

                    echo $xml->render;
                    exit();
               

                    elseif( isset($_GET['xml']) and empty($_GET['xml']) ) :
                         echo '<p>O Arquivo xml não pode ser gerado.</p>';
                         exit();

                         elseif( isset($_GET['xml']) and $_GET['xml'] != 'imoveis' ) :
                              echo '<p>O Arquivo xml não pode ser gerado 2.</p>';
                              exit();

                       
               endif;

          }
          
          public function ListingDataFeed()
          {
               
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Header', $this->Header(), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Listings', $this->Listings(), null);
               
               return $array;
               
          }
          
          
          public function Header()
          {
               
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Provider', 'Studio Preview', null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Email', 'atendimento@studiopreview.com.br', null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('ContactName', 'Ricardo Josino', null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('PublishDate', date('c'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Telephone', '47 9 9993 8241', null);
               
               return $array;
               
          }
          
          
          
          public function Listings()
          {
               
               $arqs['post_type'] = 'spw-imoveis';
               $arqs['post_status'] = 'publish';
               $arqs['showposts'] = -1;

               $dados =  get_posts($arqs);
               
                if (!empty($dados)) :
                    
                    
                    foreach($dados AS $item) :

                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('ListingID', $item->ID, null);
                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('Title', $item->post_title, null);
                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('TransactionType', $this->TransactionType($item->ID), null);
                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('Featured', $this->Featured($item->ID), null);
                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('LastUpdateDate', date('c'), null);
                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('Details', $this->Details($item), null);
                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('Media', $this->Media($item), null);
                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('Location', $this->Location($item), null);
                         $array[] = \Spw\Componentes\Xml\Elemento::Criar('ContactInfo', $this->ContactInfo($item), null);
                         
                         $elemento[] = \Spw\Componentes\Xml\Elemento::Criar('Listing', $array, null);
                         $array = null;

                    endforeach;
                    
                         //wp_reset_postdata();
                         
                         return $elemento;
                         
                    
               endif;
          }
          
          
          public function NomeTermo($term_id)
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('value', 1);
               $dados->Set_AdicionarQuery("SELECT *");
               $dados->Set_AdicionarQuery("FROM wp_terms as t");
               $dados->Set_AdicionarQuery("WHERE t.term_id = $term_id");
               $dados->Executar();
               
               return utf8_encode($dados->rows['name']);
          }
          
          
          public function TransactionType($id_post)
          {
               if (!empty($id_post)) :
               
                    $id_termos = get_field('negocios',$id_post);

                    if (!empty($id_termos)) :
               
                         if( count($id_termos) == 1 ) :
                              return $this->TransactionNormal( strtolower($this->NomeTermo($id_termos[0])) );

                              elseif( count($id_termos) > 1 ) :
                                   return $this->TransactionMult($id_termos);


                         endif;
                    
                    endif;
               
               endif;
               
          }
          
          
          public function TransactionNormal($termo)
          {
               
               if (!empty($termo)) :
                    
                    switch( $termo )
                    {

                         case 'venda' :
                              return 'For Sale';
                              break;

                         case 'vendas' :
                              return 'For Sale';
                              break;

                         case 'aluguel' :
                              return 'For Rent';
                              break;

                         case 'locação' :
                              return 'For Rent';
                              break;
                         
                         default :
                              return ucwords($termo);
                              break;

                    }
               
               endif;
          }
          
          
          public function TransactionMult($id_termos)
          {
               
               if (!empty($id_termos)) :
                    
                    foreach($id_termos as $id_termo) :
                    
                         $termos_encontrados[] = strtolower($this->NomeTermo($id_termo)) ;
                    
                    endforeach;
                    
                    if (!empty($termos_encontrados)) :
                         
                         if ( in_array( 'vendas', $termos_encontrados) and in_array('aluguel', $termos_encontrados) ) :
                              return 'Sale/Rent';
                         
                              elseif( in_array( 'venda' , $termos_encontrados) and in_array('aluguel', $termos_encontrados) ) :
                                   return 'Sale/Rent';
                              
                              elseif( in_array( 'vendas' , $termos_encontrados) and in_array('locação', $termos_encontrados) ) :
                                   return 'Sale/Rent';
                              
                              elseif( in_array( 'venda' , $termos_encontrados) and in_array('locação', $termos_encontrados) ) :
                                   return 'Sale/Rent';
                              
                              elseif( in_array('venda', $termos_encontrados) ) :
                              return 'For Sale';
                         
                              elseif( in_array('vendas', $termos_encontrados) ) :
                                   return 'For Sale';
                              
                              elseif( in_array('aluguel', $termos_encontrados) ) :
                                   return 'For Rent';
                              
                              elseif( in_array('locação', $termos_encontrados) ) :
                                   return 'For Rent';
                              
                         endif;
                         
                         
                    endif;
                    
                    
               endif;
               
          }
          
          
          public function Featured($id_post)
          {
               $id_termos = get_field('destaques', $id_post);
               
               if (!empty($id_termos)) :
                    
                    foreach($id_termos as $id_termo) :
                    $termos_achados[] = strtolower($this->NomeTermo($id_termo));
                    endforeach;
                    
               endif;
               
               if(!empty($termos_achados)) :
                    
                    if( in_array('destaque', $termos_achados) ) :
                         return 'true';
                    
                         elseif( in_array('destaques', $termos_achados) ) :
                              return 'true';
                         
                         else :
                              return 'false';
                         
                         
                    endif;
                    
               endif;
               
          }
          
          
          public function Media($item)
          {
               
               if ($item) :
               
                    $imagens = get_field('galeria', $item->ID);

                    if($imagens) :

                         foreach($imagens as $imagem) :
                              $array[] = \Spw\Componentes\Xml\Elemento::Criar('Item', wp_get_attachment_url($imagem), null);
                         endforeach;

                         return $array;

                    endif;
               
               endif;

                   
          }
          
          
          public function Details($item)
          {
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('dt_cadastro', $item->post_date, null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('insc_imobil', get_field('inscricao_imobiliaria', $item->ID), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Description', '<![CDATA[ ' . $item->post_content . ']]>', null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('PropertyType', $this->PropertyType($item->ID), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('ListPrice', $this->Preco(get_field('valor_do_imovel', $item->ID)), array( 'currency' => 'BRL' ));
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('RentalPrice', $this->Preco( get_field('valor_do_aluguel', $item->ID)), array('currency' => 'BRL', 'period' => get_field('detalhes_recorrencia', $item->ID) ) );
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('LotArea', $this->Area( get_field('area', $item->ID) ), array( 'unit' => 'square metres' ));
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('LivingArea', $this->Area( get_field('area_util', $item->ID) ), array( 'unit' => 'square metres' ));
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Bedrooms', get_field('quantidade_de_dormitorios', $item->ID), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Suites', get_field('quantidade_de_suites', $item->ID), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Bathrooms', get_field( 'quantidade_de_bwc', $item->ID ), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Garage', get_field('quantidade_de_garagens', $item->ID), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Features', $this->Features($item->ID), null);
               
               return $array;
          }
          
          
          protected function PropertyType($id_post)
          {
               if ($id_post) :
                    
                    $id_categoria = get_field('categoria', $id_post);
               
                    return ($id_categoria) ? $this->Traducao( $this->NomeTermo($id_categoria) ) : null;
                    
               endif;
          }
          
          
          protected function Traducao($value)
          {
               switch( strtolower($value) ) :
                    
                    case 'apartamento' :
                         return 'Residential / Apartment';
                         break;
                    
                    case 'casa' :
                         return 'Residential / Home';
                         break;
                    
                    case 'casa de condomínio' :
                         return 'Residential / Condo';
                         break;
                    
                    case 'chácara' :
                         return 'Residential / Farm Ranch';
                         break;
                    
                    case 'cobertra' :
                         return 'Residential / Penthouse';
                         break;
                    
                    case 'cobertura' :
                         return 'Residential / Penthouse';
                         break;
                    
                    case 'flat' :
                         return 'Residential / Flat';
                         break;
                    
                    case 'kitnet' :
                         return 'Residential / Kitnet';
                         break;
                    
                    case 'lote/terreno' :
                         return 'Residential / Land Lot';
                         break;
                    
                    case 'sobrado' :
                         return 'Residential / Sobrado';
                         break;
                    
                    case 'consultório' :
                         return 'Commercial / Consultorio';
                         break;
                    
                    case 'edifício residencial' :
                         return 'Commercial / Edificio Residencial';
                         break;
                    
                    case 'fazenda/sítio' :
                         return 'Commercial / Agricultural';
                         break;
                    
                    case 'glapão/depósito/armazém' :
                         return 'Commercial / Industrial';
                         break;
                    
                    case 'imóvel comercial' :
                         return 'Commercial / Building';
                         break;
                    
                    case 'loja' :
                         return 'Commercial / Loja';
                         break;
                    
                    case 'lote/terreno' :
                         return 'Commercial / Land Lot';
                         break;
                    
                    case 'ponto comercial' :
                         return 'Commercial / Business';
                         break;
                    
                    case 'Sala Comercial' :
                         return 'Commercial / Office';
                         break;
                    
                    default :
                         return ucwords($value);
                    
               endswitch;
          }
          
          
          protected function Preco($valor)
          {
               if (!empty($valor)) :
               
                    $moeda = explode('.', $valor);
                    $moeda = $moeda[0];
                    $moeda = str_replace(array(',', '.'), '', $moeda);

                    return $moeda;
               
               endif;
               
          }
          
          
          protected function Area($value)
          {
               if (!empty($value)) :
                    
                    $area = explode('.', $value);
                    $area = $area[0];
                    $area = str_replace( array(',', '.') , '', $area);
                    
                    return $area;
                    
               endif;
          }
          
          
          public function Features($id_post)
          {
               
               if (!empty($id_post)) :
               
                    $quant = get_post_meta($id_post, 'infraestrutura', true);

                    if ($quant > 0) :

                         for( $i = 0; $i <= $quant; $i++ ):
                              
                              $conteudo = get_post_meta($id_post, 'infraestrutura_' . $i . '_titulo', true);
                              $array[] = \Spw\Componentes\Xml\Elemento::Criar('Feature',  $this->Cdata($conteudo), null);

                         endfor;

                         return $array;

                    endif;
               
               endif;
               
          }
          
          public function Location($item)
          {
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Country', $this->Cdata( get_field('pais', $item->ID) ), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('State', $this->Cdata( get_field('estado', $item->ID) ), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('City', $this->Cdata( get_field('cidade', $item->ID) ), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Neighborhood', $this->Cdata( get_field('bairro', $item->ID) ), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Address', $this->Cdata( get_field('rua', $item->ID) ), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('StreetNumber', $this->Cdata( get_field('numero', $item->ID) ), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Latitude', get_field('latitude', $item->ID), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Longitude', get_field('longitude', $item->ID), null);
               
               return $array;
          }
          
          
          protected function Cdata($value)
          {
               if (!empty($value)) :
                    
                    return '<![CDATA[' . $value . ']]>';
                    
               endif;
          }
          
          
          public function ContactInfo($item)
          {
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Name', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_nome'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Email', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_email'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Website', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_site'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Logo', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_logo'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Telephone', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_telefone'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Location', $this->ContactInfoLocation($item), null);
               
               return $array;
          }
          
          
          public function ContactInfoLocation($item)
          {
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Country', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_pais'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('State', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_estado'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('City', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_cidade'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Neighborhood', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_bairro'), null);
               $array[] = \Spw\Componentes\Xml\Elemento::Criar('Address', \Spw\Componentes\Dados\Exibir::MostrarValor('spw_imoveis_config_endereco'), null);
               
               return $array;
          }
          
          
          
          
          public function Executar()
          {
               $this->Template();
          }
          
          
          
     }
