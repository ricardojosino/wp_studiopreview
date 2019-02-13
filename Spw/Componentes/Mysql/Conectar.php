<?php 

     namespace Spw\Componentes\Mysql;

     class Conectar
     {
     
     
          static function Executar()
          {
               $conectar = mysqli_connect($host = DB_HOST, $user = DB_USER, $pass = DB_PASSWORD, $db = DB_NAME) or die('Erro na conexão com o banco de dados');
               return $conectar;
          }
     
     
        
     }