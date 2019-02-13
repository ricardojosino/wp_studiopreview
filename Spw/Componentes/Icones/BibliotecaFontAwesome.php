<?php

     namespace Spw\Componentes\Icones;
     
     
     class BibliotecaFontAwesome
     {
          
          
          static function ToggleOn($id, $cor, $tamanho, $link, $componente)
          {
               $array[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $id), \Spw\Componentes\Html\Funcoes::Tag('a', array('href' => $link), \Spw\Componentes\Html\Funcoes::Tag('i', array('class' => 'icone botao fas fa-toggle-on', 'style' => array('color' => $cor, 'font-size' => $tamanho)), null) ) );
               $array[] = $componente;
               
               return join('', $array);
          }
          
          
          static function ToggleOff($id, $cor, $tamanho, $link, $componente)
          {
               $array[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $id), \Spw\Componentes\Html\Funcoes::Tag('a', array('href' => $link), \Spw\Componentes\Html\Funcoes::Tag('i', array('class' => 'icone botao fas fa-toggle-off', 'style' => array('color' => $cor, 'font-size' => $tamanho)), null) ) );
               $array[] = $componente;
               
               return join('', $array);
          }
          
          
          
     }