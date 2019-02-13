<?php

    namespace Spw\Componentes\Modulo;
    
    
    class Instalar
    {
         
         
         static function Modulo($nome)
         {
              
              \Spw\Componentes\Modulo\IncluirArquivo::Index($nome);
              
         }
         
       
         
    }