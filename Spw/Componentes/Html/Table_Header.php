<?php
     
     namespace Spw\Componentes\Html;

     class Table_Header extends \Spw\Components\Html\Table_Column
     
     {
          
     // ATRIBUTOS
          
          
          
     // METODOS DE CONFIGURACAO
          
          public function Set_AdicionarHeader($id, $class, $value)

          {
               $this->column[] = '<th ' . $this->Id($id) . $this->Classe($class) . '>' . $value . '</th>';
          }
          

     
     // METODOS DE PROCESSO
          
     

     // ALGORITIMO
          
        
          
          
     }