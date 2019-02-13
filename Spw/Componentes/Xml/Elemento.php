<?php

     namespace Spw\Componentes\Xml;
     
     class Elemento
     {
          
          static function Criar($elemento, $conteudo, $parametros_array)
          {
               if (!empty($elemento) and !empty($conteudo)) :
                    return '<' . $elemento . \Spw\Componentes\Html\Funcoes::Atributos($parametros_array) . '>' . self::Conteudo($conteudo) . '</' . $elemento . '>';
               endif;
          }
          
          
          static function Conteudo($elemento)
          {
               if (!empty($elemento)) :
                    
                    if (is_array($elemento)) :
                         
                              return join('', $elemento);
                         
                         else :
                              return $elemento;
                         
                    endif;
                    
                    
               endif;
          }
          
     }