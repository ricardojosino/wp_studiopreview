<?php

    namespace Spw\Componentes\UI\Admin;
    
    class Lista_AdicionarColunas
    {
         
         //01
         
         protected $colunas;
         protected $altura = '50px';
         protected $wrap;
         protected $view;
         public $render;
         
         //02
         public function Set_AdicionarColuna($exibir, $id, $largura, $alinhamento, $conteudo, $link, $componente)
         {
               if($exibir) :

                    $this->colunas[] = array(

                         'id' => $id,
                         'largura' => $largura,
                         'alinhamento' => $alinhamento,
                         'conteudo' => $conteudo,
                         'link' => $link,
                         'componente' => $componente

                    );

               endif;
         }
         
         
         public function Set_AlturaDaColuna($value)
         {
              $this->altura = $value;
         }
         
         
         public function Set_AtivarWrap($value)
         {
              $this->wrap = '10px';
         }
         
         
         //03
         protected function Conteudo()
         {
              if (!empty($this->colunas)) :

                   $this->view[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-list-view-colunas'), $this->Colunas());
                   
              endif;
         }
         
         
         protected function Link($link)
         {
              if (!empty($link)) :
                   return \Spw\Componentes\Html\Funcoes::Tag('a', array('href' => $link, 'class' => 'link'), null);
              endif;
         }
         
         
         protected function Colunas()
         {
               if (!empty($this->colunas)) :
                   
                    foreach($this->colunas AS $coluna) :

                         $array[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $coluna['id'], 'class' => 'spw-item', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('width' => $coluna['largura'], 'height' => $this->altura, 'padding' => $this->wrap, 'align-items' => $this->Alinhamento($coluna['alinhamento']) )  ) ), $this->Link($coluna['link']) . $coluna['conteudo'] . $coluna['componente']);

                    endforeach;
                    
                    if (!empty($array)) :
                         return join('', $array);
                    endif;
                   
              endif;
         }
         
         
         protected function Alinhamento($align)
         {
              switch($align) :
                   
                   case 'left' :
                   case 'esquerda' :
                        return 'flex-start';
                        break;
                   
                   case 'center' :
                   case 'centro' :
                   case 'centralizado' :
                        return 'center';
                        break;
                   
                   case 'right' :
                   case 'direita' :
                        return 'flex-end';
                        break;
                   
                   default :
                        return 'left';
                   
              endswitch;
              
              
         }
         
         
         protected function Render()
         {
              $this->render = \Spw\Componentes\Funcoes::Render($this->view);
         }
         
         //04
         public function Executar()
         {
              $this->Conteudo();
              $this->Render();
         }
         
         
    }