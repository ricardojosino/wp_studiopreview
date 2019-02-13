<?php

     namespace Taxonomy\Componentes;
     
     class ListarTaxonomias
     
     {
          
          // 01
          
          protected $result;
          protected $row;
          
          protected $view;
          public $render;
          
          
          // 02
          
          
          
          //03
          
          protected function Dados()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('value', 1);
               $dados->Set_AdicionarQuery("select *");
               $dados->Set_AdicionarQuery("from spw_taxonomy as t");
               $dados->Set_AdicionarQuery("where t.lixeira = 'N'");
               $dados->Set_AdicionarQuery("order by t.post_type");
               $dados->Executar();
               
               $this->result = $dados->result;
               $this->row = $dados->rows;
          }
          
          
          protected function Colunas($titulo, $link, $componente)
          {
               if (!empty($titulo)) :
               
                    $coluna = new \Spw\Componentes\UI\Admin\Lista_AdicionarColunas();
                    $coluna->Set_AlturaDaColuna('50px');
                    $coluna->Set_AtivarWrap(true);
                    $coluna->Set_AdicionarColuna(true, null, '100%', 'left', $titulo, $link, $componente);
                    $coluna->Executar();

                    return $coluna->render;
               
               endif;
          }
          
          
          protected function Lista()
          {
               
               if (!empty($this->row)) :
               
                    $lista = new \Spw\Componentes\UI\Admin\Lista();

                    do {
                         $lista->Set_AdicionarItem(true, 'row_' . $this->row['id_taxonomy'], $this->Colunas( $this->row['post_type'] , \Spw\Componentes\Modulo\Link::AbrirPagina('taxonomy', 'editar-taxonomy', 'id_taxonomy=' . $this->row['id_taxonomy']), null));
                    } while($this->row = mysqli_fetch_assoc($this->result));

                    $lista->Executar();
                    
                    return $lista->render;
                    
                         else :
                              return '...';
               
               endif;
               
          }
          
          
          protected function Painel()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
               $painel->Set_Titulo('Taxonomias registradas');
               $painel->Set_AdicionarConteudo($this->Lista());
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function PainelMensagem()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function Template()
          {
               $this->view[] = $this->PainelMensagem();
               $this->view[] = $this->Painel();
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //04
          public function Executar()
          {
               $this->Dados();
               $this->Template();
               $this->Render();
          }
          
          
          
     }