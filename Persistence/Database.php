<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors',1);

class Database{

  public static $conn;

  public static function open(){

    if (!isset(self::$conn)){
   try{
self::$conn= new PDO("mysql:host=127.0.0.1:3306;dbname=bdrel", "root","coti");
self::$conn->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_OBJ);

    }catch(PDOException $e){
     echo  $e->getMessage();
   }
 }
 return self::$conn;
}


public static function prepare($sql){
   return self::open()->prepare($sql);
}

}


  ?>


