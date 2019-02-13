<?php

     namespace Aplicativos\Componentes;
     
     class RegistrarAplicativosNoBancoDeDados
     {
          
          //01
          protected $dados;
          
          //02
          public function Set_Inserir($nome, $titulo, $descricao, $modulo, $pagina, $id_categoria)
          {
               if ($this->Check($nome) === false) :
               
                    $this->dados[] = array(

                         'nome' => $nome,
                         'titulo' => $titulo,
                         'descricao' => $descricao,
                         'modulo' => $modulo,
                         'pagina' => $pagina,
                         'id_categoria' => $id_categoria

                    );
               
               endif;
          }
          
          //03
          protected function Inserir($nome, $titulo, $descricao, $modulo, $pagina, $id_categoria)
          {
               $registrar = new \Spw\Componentes\Mysql\InserirRegistro();
               $registrar->Set_Conectar();
               $registrar->Set_Start('VALUE', 1);
               $registrar->Set_NomeDaTabela('spw_aplicativos');
               $registrar->Set_AdicionarRegistro(true, 'lixeira', 'string', 'value', 'N');
               $registrar->Set_AdicionarRegistro(true, 'nome', 'string', 'value', $nome);
               $registrar->Set_AdicionarRegistro(true, 'titulo', 'string', 'value', $titulo);
               $registrar->Set_AdicionarRegistro(true, 'descricao', 'string', 'value', $descricao);
               $registrar->Set_AdicionarRegistro(true, 'modulo', 'string', 'value', $modulo);
               $registrar->Set_AdicionarRegistro(true, 'pagina', 'string', 'value', $pagina);
               $registrar->Set_AdicionarRegistro(true, 'id_categoria', 'int', 'value', $id_categoria);
               $registrar->Executar();
          }
          
          
          protected function Check($nome)
          {
               $check = new \Spw\Componentes\Mysql\Selecionar();
               $check->Set_Conectar();
               $check->Set_Start('VALUE', 1);
               $check->Set_AdicionarQuery("SELECT id_aplicativo");
               $check->Set_AdicionarQuery("FROM spw_aplicativos a");
               $check->Set_AdicionarQuery("WHERE a.nome = '$nome'");
               $check->Set_AdicionarQuery("LIMIT 1");
               $check->Executar();
               
               if (!empty($check->rows)) :
                    return true;
               
                         else :
                              return false;
               endif;
               
          }
          
          
          protected function Registrar()
          {
               if (!empty($this->dados)) :
                    
                    foreach($this->dados AS $dados) :
                    
                         $this->Inserir($dados['nome'], $dados['titulo'], $dados['descricao'], $dados['modulo'], $dados['pagina'], $dados['id_categoria']);
                    
                    endforeach;
                    
               endif;
          }
          
          
          //04
          public function Executar()
          {
               $this->Registrar();
          }
          
          
     }