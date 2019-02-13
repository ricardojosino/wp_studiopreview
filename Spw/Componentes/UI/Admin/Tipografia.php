<?php

     namespace Spw\Componentes\UI\Admin;
     
     class Tipografia
     {
          
          static function Titulo_01($value)
          {
               if (!empty($value)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('h1', array('class' => 'spw-ui-titulo'), $value);
               endif;
          }
          
          
          static function Titulo_02($value)
          {
               if (!empty($value)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('h2', array('class' => 'spw-ui-titulo'), $value);
               endif;
          }
          
          
          static function Titulo_03($value)
          {
               if (!empty($value)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('h3', array('class' => 'spw-ui-titulo'), $value);
               endif;
          }
          
          
          static function Descricao_01($value)
          {
               if (!empty($value)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('p', array('class' => 'spw-ui-descricao'), $value);
               endif;
          }
          
          
          static function Texto($value)
          {
               if (!empty($value)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('p', array('class' => 'spw-ui-texto'), $value);
               endif;
          }
          
          
          
          static function Legenda($value)
          {
               if (!empty($value)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-ui-legenda'), $value);
               endif;
          }
          
     }