<?php

     class Spw_UI_Html_Table_Header extends SN_UI_Html_Table_Column
     
     {
          
     // ATRIBUTOS
          
          
          
     // METODOS DE CONFIGURACAO
          
          public function Set_Header($id, $class, $value)

          {
               $this->column[] = '<th ' . $this->Id($id) . $this->Classe($class) . '>' . $value . '</th>';
          }
          

     
     // METODOS DE PROCESSO
          
     

     // ALGORITIMO
          
        
          
          
     }