<?php

     namespace Spw\Componentes\Upload;
     
     class Mensagem
     
     {
          
          
          static function FileUploadErrorMessage($codigo)
          {

          switch($codigo) :

               case 0 :
                    return 'Upload foi bem sucedido';
                    break;

               case 1 :
                    return 'Arquivo enviado excede o limite definido na diretiva do php.ini no servidor.';
                    break;

               case 2 :
                    return 'Este arquivo possui um tamanho maior que o permitido.';
                    break;

               case 3 :
                    return 'O upload do arquivo foi feito parcialmente.';
                    break;

               case 4 :
                    return 'Nenhum arquivo foi enviado.';
                    break;

               case 6 :
                    return 'Pasta temporária ausênte no servidor.';
                    break;

               case 7 :
                    return 'Falha em escrever o arquivo em disco.';
                    break;

               case 8 :
                    return 'Uma extensão do PHP interrompeu o upload do arquivo.';
                    break;


          endswitch;

          }

          
          
     }