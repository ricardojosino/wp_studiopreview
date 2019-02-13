<?php

     
     namespace Aplicativos\Componentes;
     
     class CarregarAplicativosInstalados
     
     {
          
          
          //01
          
          protected $result;
          protected $rows;
          
          
          //02
          
          
          
          
          
          //03
          
          protected function Dados()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('VALUE', 1);
               $dados->Set_AdicionarQuery("SELECT i.id_instalacao, i.id_aplicativo, a.nome, a.titulo, a.modulo, a.pagina");
               $dados->Set_AdicionarQuery("FROM spw_aplicativos_instalados AS i, spw_aplicativos AS a");
               $dados->Set_AdicionarQuery("WHERE i.id_aplicativo = a.id_aplicativo AND a.lixeira = 'N'");
               $dados->Executar();
               
               $this->result = $dados->result;
               $this->rows = $dados->rows;
               
          }
          
          
          protected function CarregarApps()
          {
               if (!empty($this->rows)) :
                    
                    do {
                    
                         \Spw\Componentes\Modulo\Instalar::Modulo($this->rows['modulo']);
                         
                    } while($this->rows = mysqli_fetch_assoc($this->result));
                    
               endif;
               
          }
          
         
          
          
          
          //04
          
          
          public function Executar()
          {
               $this->Dados();
               $this->CarregarApps();
               
               
          }
          
          
          
          
     }