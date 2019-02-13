<?php 


     class Spw_Mysql_Conectar
     {
     
     // ATRIBUTOS
     
     
     
     // METODOS DE CONFIGURACAO
     
     
     
     // METODOS DE PROCESSO

          static function Conectar()
          {
               $conectar = mysqli_connect($host = DB_HOST, $user = DB_USER, $pass = DB_PASSWORD, $db = DB_NAME) or die('Erro na conexão com o banco de dados');

               return $conectar;
          }
     
     
     
     // ALGORITIMO
     
        
     }