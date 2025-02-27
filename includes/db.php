<?php 

     // konekcija so PDO - (PHP Data Object)

     $host = 'localhost';
     $db = 'example_crud';
     $user = 'root';
     $pass = '';
     $charset = 'utf8mb4';
     // DSN data sorse name
     $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

     $options = [
        PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
        PDO:: ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
        PDO:: ATTR_EMULATE_PREPARES => false
     ];

     try{
        $pdo = new PDO($dsn,$user,$pass,$options);
        // echo"Conection successful !";
     }
     catch(\PDOException $e){
         throw new \PDOException($e->getMessage(),$e->getCode());
     }
